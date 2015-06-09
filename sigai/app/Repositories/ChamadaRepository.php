<?php namespace App\Repositories;

use App\Models\Chamada;

use App\Repositories\TurmaRepository;
use App\Repositories\AulaRepository;
use App\Repositories\AlunoRepository;

use App\Repositories\Results\ChamadaPerDayResult;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;

use Carbon\Carbon;

class ChamadaRepository extends Repository
{
    public static function findByAulaAndAluno($aulaId, $alunoId)
    {
        $chamada = Chamada::where('aula_id', $aulaId)
                          ->where('aluno_id', $alunoId)
                          ->first();
                     
        if ($chamada == null) {
	        throw new NotFoundError(Lang::get('chamadas.not_found'));
	    }

	    return $chamada;
    }
    
    public static function insertOrUpdateAll(array $chamadas, $ucId, $turmaId, $data)
    {
        $aula = AulaRepository::findByData($data, $turmaId, $ucId);
        $results = [];
        
        foreach ($chamadas as $chamada) {
            $results[] = self::insertOrUpdate($chamada['matricula'], $chamada['periods'], $aula);
        }
        
        return $results;
    }
    
    public static function insertOrUpdate($matricula, array $periods, $aula)
    {
        if (sizeof($periods) != 4) {
            throw new ValidationError(['periods' => [Lang::get('chamadas.period_size')]]);
        }
        
        $aluno = AlunoRepository::findByMatricula($matricula);
        
        try {
            $chamada = self::findByAulaAndAluno($aula->id, $aluno->id);
        } catch (NotFoundError $e) {
            $chamada = new Chamada;
            $chamada->aluno()->associate($aluno);
            $chamada->aula()->associate($aula);
        }
        
        $chamada->p1 = $periods[0];
        $chamada->p2 = $periods[1];
        $chamada->p3 = $periods[2];
        $chamada->p4 = $periods[3];
        
        if (!$chamada->save()) {
            throw new ServerError(Lang::get('chamadas.create_error'));
        }
        
        return $chamada;
    }
    
    
    ////////////////////////////////////////////////////////////////////////////
    // Encontra as faltas dos alunos de uma turma por mês
    ////////////////////////////////////////////////////////////////////////////
    
    public static function findFaltasByTurma($turmaId)
    {
        $rows = DB::table('aulas as au')
            ->selectRaw('u.matricula, u.nome, YEAR(au.data) as year, MONTH(au.data) as month, atu.status,'.
                '( SUM(IF(c.p1 = 0, 1, 0)) + SUM(IF(c.p2 = 0, 1, 0)) + '.
                'SUM(IF(c.p3 = 0, 1, 0)) + SUM(IF(c.p4 = 0, 1, 0)) ) AS total_faltas,'.
                "(select count(*) * 4 from aulas where turma_id = $turmaId) as total_periodos"
            )
            ->join('alunos_turmas AS atu', 'atu.turma_id', '=', 'au.turma_id')
            ->join('alunos as a', 'a.id', '=', 'atu.aluno_id')
            ->join('usuarios as u', 'u.id', '=', 'a.id')
            
            ->leftJoin('chamadas as c', function($join) {
                $join->on('c.aluno_id', '=', 'a.id')
                     ->on('c.aula_id', '=', 'au.id');
            })

            ->where('au.turma_id', $turmaId)
            ->groupBy(DB::raw('u.matricula, YEAR(au.data), MONTH(au.data)'))
            ->orderBy(DB::raw('u.nome, year, month'))
            ->get();
            
        $faltas = self::parseFaltaRows($rows);
        $months = self::parsePeriods($faltas);
        
        return ['faltas' => $faltas, 'periods' => $months];
    }

    protected static function parseFaltaRows($rows)
    {
        $faltas = [];

        foreach ($rows as $row) {
            if (!isset($faltas[$row->matricula])) {
                $obj = $faltas[$row->matricula] = new \stdClass;
                
                $obj->nome           = $row->nome;
                $obj->matricula      = $row->matricula;
                $obj->status         = $row->status;
                $obj->total_periodos = 0;
                $obj->total_faltas   = 0;
                $obj->total_periodos = $row->total_periodos;
                $obj->faltas         = [];
            }
            
            $date = $row->year . '-' . $row->month;
            
            $obj->faltas[$date]               = new \stdClass;
            $obj->faltas[$date]->year         = $row->year;
            $obj->faltas[$date]->month        = $row->month;
            $obj->faltas[$date]->total_faltas = $row->total_faltas;

            $obj->total_faltas   += $row->total_faltas;
        }
        
        foreach ($faltas as $f) {
            if ($f->total_periodos == 0) {
                $f->pFaltas = 0;
            } else {
                $f->pFaltas = ($f->total_faltas * 100)/$f->total_periodos;
            }
        }

        return $faltas;
    }
    
    protected static function parsePeriods($faltas)
    {
        $months = [];
        
        if (sizeof($faltas) == 0) return $months;

        foreach (array_values($faltas)[0]->faltas as $data => $v) {
            $months[] = [
                'key'   => $v->year . '-' . $v->month,
                'year'  => $v->year,
                'month' => $v->month
            ];
        }

        $months = array_values(array_sort($months, function($value) {
            return $value['year'].$value['month'];
        }));
        
        return $months;
    }
    
    
    
    ////////////////////////////////////////////////////////////////////////////
    // Encontra as faltas dos alunos de uma turma por dia
    ////////////////////////////////////////////////////////////////////////////
    
    public static function findFaltasByTurmaPerPeriod($turmaId, $month = null)
    {
        $query = DB::table('aulas as au')
            ->selectRaw(
                'u.matricula, u.nome, YEAR(au.data) AS year, MONTH(au.data) AS month, '.
                'DAY(au.data) AS day, atu.status, c.p1, c.p2, c.p3, c.p4,'.
                
                '( SUM(IF(c.p1 = 0, 1, 0)) + SUM(IF(c.p2 = 0, 1, 0)) + '.
                'SUM(IF(c.p3 = 0, 1, 0)) + SUM(IF(c.p4 = 0, 1, 0)) ) AS total_faltas,'.
                
                'cr.id as curso_id, cr.nome as curso_nome, cr.sigla as curso_sigla, '.
                'cr.coordenador_id as curso_coordenador_id'
            )
            ->join('alunos_turmas AS atu', 'atu.turma_id', '=', 'au.turma_id')
            ->join('alunos as a', 'a.id', '=', 'atu.aluno_id')
            ->join('usuarios as u', 'u.id', '=', 'a.id')
            ->join('cursos as cr', 'cr.id', '=', 'atu.curso_origem_id')
            
            ->join('chamadas as c', function($join) {
                $join->on('c.aluno_id', '=', 'a.id')
                     ->on('c.aula_id', '=', 'au.id');
            })

            ->where('au.turma_id', $turmaId);
            
        if ($month != null) {
            $query->having('month', "=", $month);
        }
            
        $rows = $query->groupBy(DB::raw('u.matricula, YEAR(au.data), MONTH(au.data), DAY(au.data)'))
            ->orderBy(DB::raw('u.nome, year, month'))
            ->get();

        $result = new ChamadaPerDayResult;
        $result->addRows($rows);
        
        return $result;
    }
}
