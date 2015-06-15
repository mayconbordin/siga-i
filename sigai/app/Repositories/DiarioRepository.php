<?php namespace App\Repositories;

use App\Models\Turma;
use App\Models\Professor;
use App\Models\StatusDiario;

use App\Repositories\TurmaRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;
use App\Exceptions\ConflictError;
use App\Exceptions\BadRequest;

use \DB;
use \Lang;

use Carbon\Carbon;

class DiarioRepository extends Repository
{
    public static function insert($month, $turma, Professor $professor)
    {
        $today = Carbon::now();

        // verifica se já existe        
        if (self::exists($turma->id, $month)) {
            throw new ConflictError(Lang::get('diarios.already_exists'));
        }

        // se a turma estiver ativa, não deixa fechar diário de mês superior ao atual
        if ($month > $today->month && $turma->isActive()) {
            throw new BadRequest(Lang::get('diarios.not_current_month'));
        }

        $diario = new StatusDiario;
        $diario->status = 1;
        $diario->mes = $month;
        $diario->turma()->associate($turma);
        $diario->professor()->associate($professor);

	    if (!$diario->save()) {
            throw new ServerError(Lang::get('diarios.create_error'));
        }
        
        return $diario;
    }
    
    public static function findDiariosToClose($professorId)
    {
        $currMonth = ((int) Carbon::now()->format('m'));
        
        $diarios = DB::table('turmas AS t')
                     ->selectRaw('t.id as turma_id, t.nome, t.unidade_curricular_id')
                     ->leftJoin('status_diarios AS sd', function($join) use ($currMonth) {
                            $join->on('sd.turma_id', '=', 't.id')
                                 ->on('sd.mes', '=', DB::raw($currMonth));
                     })
                     ->join('professores_turmas AS pt', 'pt.turma_id', '=', 't.id')
                     ->whereRaw('NOW() between t.data_inicio and t.data_fim')
                     ->whereRaw('sd.id IS NULL')
                     ->whereRaw("pt.professor_id = $professorId")
	                 ->get();

	    return $diarios;
    }
    
    public static function findDiariosToCloseByTurma(Turma $turma)
    {
        $currDate  = Carbon::now();
        $startDate = $turma->data_inicio;
        $endDate   = $turma->data_fim;

        $diarios = DB::table('turmas AS t')
                     ->selectRaw('sd.mes')
                     ->leftJoin('status_diarios AS sd', function($join) {
                            $join->on('sd.turma_id', '=', 't.id');
                     })
                     ->where("t.id", $turma->id)
	                 ->get();
        
        // pega apenas lista de meses com diários fechados
        $months = array_map(function($row) {
            return (int) $row->mes;
        }, $diarios);
        
        $allMonths = [];
        
        // pega todos os meses do começo da turma até a data atual (ou fim da turma)
        for ($month = $startDate->month; $month <= $endDate->month; $month++) {
            $allMonths[] = $month;
            
            if ($month == $currDate->month && $startDate->year == $currDate->year) break;
        }
        
        // remove os meses que já tem diários
        $diarios = array_filter($allMonths, function($m) use ($months) {
            return !in_array($m, $months);
        });

	    return $diarios;
    }
    
    public static function exists($turmaId, $month)
    {
        return !is_null(
            DB::table('status_diarios')
              ->where('mes', $month)
              ->where('turma_id', $turmaId)
              ->first()
        );
    }
}
