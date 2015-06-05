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
    public static function insert($month, $ucId, $turmaId, Professor $professor)
    {
        $today = Carbon::now();
        
        if (self::exists($turmaId, $month)) {
            throw new ConflictError(Lang::get('diarios.already_exists'));
        }

        if ($month != ((int) $today->format('m'))) {
            throw new BadRequest(Lang::get('diarios.not_current_month'));
        }

        $turma = TurmaRepository::findById($turmaId, $ucId);
        
        if (!$today->between($turma->data_inicio, $turma->data_fim)) {
            throw new BadRequest(Lang::get('diarios.already_over'));
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
