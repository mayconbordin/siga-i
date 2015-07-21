<?php namespace App\Repositories\Eloquent;

use App\Models\Ambiente;
use App\Models\Aula;
use App\Models\Professor;
use App\Models\Turma;

use App\Repositories\Contracts\AulaRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Log;

use Carbon\Carbon;

class AulaRepository extends BaseRepository implements AulaRepositoryContract
{
    public function findByTurmaBetweenDates($turmaId, Carbon $start = null, Carbon $end = null)
    {
        $query = Aula::with('turma', 'turma.ambienteDefault')->where('turma_id', $turmaId);
        
        if ($start != null) {
            $query->where('data', '>=', $start->format('Y-m-d'));
        }
        
        if ($end != null) {
            $query->where('data', '<=', $end->format('Y-m-d'));
        }
        
        return $query->get();
    }
    
    public function findByTurmaInMonth($turmaId, $month)
    {
        $query = Aula::with('professor', 'professor.usuario')->where('turma_id', $turmaId)
                     ->whereRaw("MONTH(data) = $month")
                     ->orderBy(DB::raw('MONTH(data)'));
                     
        return $query->get();
    }
    
    public function findById($id, $turmaId, $unidadeCurricularId)
    {
        $aula  = Aula::where('id', $id)->where('turma_id', $turmaId)
                     ->with('turma')->first();
                     
        if ($aula == null) {
	        throw new NotFoundError(Lang::get('aulas.not_found'));
	    }
	    
	    if ($aula->turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $aula;
    }
    
    public function findByData(Carbon $data, $turmaId, $unidadeCurricularId)
    {
        $aula = Aula::where('data', $data->format('Y-m-d'))->where('turma_id', $turmaId)
	                ->with('turma', 'turma.unidadeCurricular')->first();
	    
	    if ($aula == null) {
	        throw new NotFoundError(Lang::get('aulas.not_found'));
	    }
	    
	    if ($aula->turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $aula;
    }
    
    public function findByDataWithAll(Carbon $data, $turmaId, $unidadeCurricularId)
    {
        $aula = Aula::where('data', $data->format('Y-m-d'))->where('turma_id', $turmaId)
	                ->with('turma', 'turma.unidadeCurricular', 'turma.professores', 'chamadas',
	                       'chamadas.aluno', 'chamadas.aluno.usuario', 'professor')->first();
	    
	    if ($aula == null) {
	        throw new NotFoundError(Lang::get('aulas.not_found'));
	    }
	    
	    if ($aula->turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $aula;
    }

    public function findNextByProfessor($professorId, Carbon $now = null, $limit = 5)
    {
        if ($now == null) {
            $now = Carbon::now();
        }

        $aulas = Aula::with('turma', 'turma.professores')
                     ->join('turmas AS t', 't.id', '=', 'aulas.turma_id')
                     ->join('professores_turmas AS pt', 'pt.turma_id', '=', 't.id')
                     ->join('professores AS p', 'p.id', '=', 'pt.professor_id')
                     
                     ->where("data", ">=", $now->format('Y-m-d'))
                     ->where('p.id', $professorId)
                     ->orderBy('data')
                     ->take($limit)
	                 ->get();

	    return $aulas;
    }

    public function findAllByProfessorAndMonth($professorId = null, $month = null, $year = null)
    {
        $query = Aula::with('turma', 'turma.professores')
            ->join('turmas AS t', 't.id', '=', 'aulas.turma_id')
            ->join('professores_turmas AS pt', 'pt.turma_id', '=', 't.id')
            ->join('professores AS p', 'p.id', '=', 'pt.professor_id');

        if ($month != null)
            $query->where(DB::raw("MONTH(data)"), "=", $month);

        if ($year != null)
            $query->where(DB::raw("YEAR(data)"), "=", $year);

        if ($professorId != null)
            $query->where('p.id', $professorId);

        $aulas = $query->orderBy('data')->get();

        return $aulas;
    }
    
    public function deleteByData(Carbon $data, $turmaId, $unidadeCurricularId)
    {
        $aula = self::findByData($data, $turmaId, $unidadeCurricularId);
        
        DB::beginTransaction();
	    
	    try {
	        $aula->chamadas()->delete();
	        $aula->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
	        throw new ServerError(Lang::get('aulas.remove_error'));
	    }
	    
	    DB::commit();
    }
    
    public function insert(array $data, Turma $turma)
    {
        $date       = array_get($data, 'data');
        $horaInicio = array_get($data, 'horario_inicio');
        $horaFim    = array_get($data, 'horario_fim');

        if (!($date instanceof Carbon)) {
            throw new \InvalidArgumentException("A data deve ser do tipo Carbon");
        }

        if (!($horaInicio instanceof Carbon) || !($horaFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Horários devem ser do tipo Carbon");
        }

        if (self::exists($turma->id, $date)) {
            throw new ValidationError([
                'data' => [Lang::get('aulas.already_exists')]
            ]);
        }

        $aula                     = new Aula;
        $aula->data               = $date;
        $aula->horario_inicio     = $horaInicio;
        $aula->horario_fim        = $horaFim;
        $aula->status             = array_get($data, 'status', 0);
        $aula->conteudo           = array_get($data, 'conteudo', '');
        $aula->obs                = array_get($data, 'obs', '');
        $aula->ensino_a_distancia = array_get($data, 'ensino_a_distancia', false);
        
        if (!$aula->data->between($turma->data_inicio, $turma->data_fim)) {
            throw new ValidationError([
                'data' => [Lang::get('validation.between.date', [
                    'attribute' => 'data',
                    'min' => $turma->data_inicio->format('d/m/Y'),
                    'max' => $turma->data_fim->format('d/m/Y')
                ])]
            ]);
        }

        if (isset($data['ambiente']) && $data['ambiente'] instanceof Ambiente) {
            $aula->ambiente()->associate($data['ambiente']);
        }

        if (isset($data['professor']) && $data['professor'] instanceof Professor) {
            $aula->professor()->associate($data['professor']);
        }
        
        $aula->turma()->associate($turma);
        
	    if (!$aula->save()) {
            throw new ServerError(Lang::get('aulas.create_error'));
        }
        
        return $aula;
    }
    
    public function update(array $data, $ucId, $turmaId, Carbon $date)
    {
        $aula = self::findByData($date, $turmaId, $ucId);

        $dataAula   = array_get($data, 'data', $aula->data);
        $horaInicio = array_get($data, 'horario_inicio', $aula->horario_inicio);
        $horaFim    = array_get($data, 'horario_fim', $aula->horario_inicio);

        if (!($dataAula instanceof Carbon)) {
            throw new \InvalidArgumentException("A data deve ser do tipo Carbon");
        }

        if (!($horaInicio instanceof Carbon) || !($horaFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Horários devem ser do tipo Carbon");
        }

	    $aula->data               = $dataAula;
        $aula->horario_inicio     = $horaInicio;
        $aula->horario_fim        = $horaFim;
        $aula->status             = array_get($data, 'status', $aula->status);
        $aula->conteudo           = array_get($data, 'conteudo', $aula->conteudo);
        $aula->obs                = array_get($data, 'obs', $aula->obs);
        $aula->ensino_a_distancia = array_get($data, 'ensino_a_distancia', $aula->ensino_a_distancia);
        
        if (!$aula->data->between($aula->turma->data_inicio, $aula->turma->data_fim)) {
            throw new ValidationError([
                'data' => [Lang::get('validation.between.date', [
                    'attribute' => 'data',
                    'min' => $aula->turma->data_inicio->format('d/m/Y'),
                    'max' => $aula->turma->data_fim->format('d/m/Y')
                ])]
            ]);
        }

        if (isset($data['ambiente']) && $data['ambiente'] instanceof Ambiente) {
            $aula->ambiente()->associate($data['ambiente']);
        }

        if (isset($data['professor']) && $data['professor'] instanceof Professor) {
            $aula->professor()->associate($data['professor']);
        }
        
        if (!$aula->save()) {
            throw new ServerError(Lang::get('aulas.save_error'));
        }
        
        return $aula;
    }
    
    public function updateData($ucId, $turmaId, $id, Carbon $newData)
    {
        $aula = self::findById($id, $turmaId, $ucId);

        if ($newData->format('Y-m-d') == $aula->data->format('Y-m-d')) {
            return $aula;
        }

        if (self::exists($turmaId, $newData)) {
            throw new ValidationError([
                'data' => [Lang::get('aulas.already_exists')]
            ]);
        }

        $aula->data = $newData;

        if (!$aula->data->between($aula->turma->data_inicio, $aula->turma->data_fim)) {
            throw new ValidationError([
                'data' => [Lang::get('validation.between.date', [
                    'attribute' => 'data',
                    'min' => $aula->turma->data_inicio->format('d/m/Y'),
                    'max' => $aula->turma->data_fim->format('d/m/Y')
                ])]
            ]);
        }
        
	    if (!$aula->save()) {
	        throw new ServerError(Lang::get('aulas.save_error'));
        }
        
        return $aula;
    }
    
    public function exists($turmaId, Carbon $date)
    {
        return !is_null(
            DB::table('aulas')
              ->where('data', $date->format('Y-m-d'))
              ->where('turma_id', $turmaId)
              ->first()
        );
    }

    public function dissociateAmbiente(Ambiente $ambiente)
    {
        $aulas = Aula::where('ambiente_id', $ambiente->id)->get();

        foreach ($aulas as $aula) {
            $aula->ambiente()->dissociate();
            $aula->save();
        }
    }

    public function findAulaByAlunoDeviceAndAmbienteDeviceAndData($clientId, $deviceCode, Carbon $data)
    {
        $aulas = Aula::select('aulas.*')
            ->join('turmas AS t', 't.id', '=', 'aulas.turma_id')
            ->join('alunos_turmas AS aut', 'aut.turma_id', '=', 'aulas.turma_id')
            ->join('dispositivos AS da', 'da.usuario_id', '=', 'aut.aluno_id')

            ->leftJoin('ambientes AS amb', function($join) {
                $join->on('amb.id', '=', 'aulas.ambiente_id')
                     ->orOn('amb.id', '=', 't.ambiente_default_id');
            })

            ->leftJoin('dispositivos_ambiente AS damb', 'damb.ambiente_id', '=', 'amb.id')
            ->leftJoin('oauth_clients AS oc', 'oc.id', '=', 'damb.oauth_client_id')

            ->where("data", "=", $data->format('Y-m-d'))
            ->where('da.codigo', $deviceCode)
            ->where('oc.id', $clientId)

            ->get();

        return $aulas;
    }
}
