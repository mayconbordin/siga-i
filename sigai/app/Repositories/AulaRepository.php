<?php namespace App\Repositories;

use App\Models\Aula;

use App\Repositories\TurmaRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;

use Carbon\Carbon;

class AulaRepository extends Repository
{
    public static function findByTurmaBetweenDates($turmaId, $start = null, $end = null)
    {
        $query = Aula::where('turma_id', $turmaId);
        
        if ($start != null) {
            $query->where('data', '>=', $start);
        }
        
        if ($end != null) {
            $query->where('data', '<=', $end);
        }
        
        return $query->get();
    }
    
    public static function findByTurmaInMonth($turmaId, $month)
    {
        $query = Aula::where('turma_id', $turmaId)
                     ->whereRaw("MONTH(data) = $month")
                     ->orderBy(DB::raw('MONTH(data)'));
                     
        return $query->get();
    }
    
    public static function findById($id, $turmaId, $unidadeCurricularId)
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
    
    public static function findByData($data, $turmaId, $unidadeCurricularId)
    {
        $aula = Aula::where('data', $data)->where('turma_id', $turmaId)
	                ->with('turma', 'turma.unidadeCurricular')->first();
	    
	    if ($aula == null) {
	        throw new NotFoundError(Lang::get('aulas.not_found'));
	    }
	    
	    if ($aula->turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $aula;
    }
    
    public static function findByDataWithAll($data, $turmaId, $unidadeCurricularId)
    {
        $aula = Aula::where('data', $data)->where('turma_id', $turmaId)
	                ->with('turma', 'turma.unidadeCurricular', 'chamadas',
	                       'chamadas.aluno', 'chamadas.aluno.usuario')->first();
	    
	    if ($aula == null) {
	        throw new NotFoundError(Lang::get('aulas.not_found'));
	    }
	    
	    if ($aula->turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $aula;
    }
    
    
    public static function findNextByProfessor($professorId)
    {
        $aulas = Aula::with('turma', 'turma.professores')
                     ->join('turmas AS t', 't.id', '=', 'aulas.turma_id')
                     ->join('professores_turmas AS pt', 'pt.turma_id', '=', 't.id')
                     ->join('professores AS p', 'p.id', '=', 'pt.professor_id')
                     
                     ->whereRaw("data >= DATE_FORMAT(NOW(),'%Y-%m-%d')")
                     ->where('p.id', $professorId)
                     ->orderBy('data')
                     ->take(5)
	                 ->get();
	    return $aulas;
    }
    
    
    public static function deleteByData($data, $turmaId, $unidadeCurricularId)
    {
        $aula = AulaRepository::findByData($data, $turmaId, $ucId);
        
        DB::beginTransaction();
	    
	    try {
	        $aula->chamadas()->delete();
	        $aula->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        throw new ServerError(Lang::get('aulas.remove_error'));
	    }
	    
	    DB::commit();
    }
    
    public static function insert(array $data, $ucId, $turmaId, $dateFormat = 'd/m/Y')
    {
        $aula  = new Aula;
        $turma = TurmaRepository::findById($turmaId, $ucId);
        
        $aula->data               = Carbon::createFromFormat($dateFormat, array_get($data, 'data'));
        $aula->status             = array_get($data, 'status', 0);
        $aula->conteudo           = array_get($data, 'conteudo');
        $aula->obs                = array_get($data, 'obs');
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
        
        $aula->turma()->associate($turma);
        
	    if (!$aula->save()) {
            throw new ServerError(Lang::get('aulas.create_error'));
        }
        
        return $aula;
    }
    
    public static function update(array $data, $ucId, $turmaId, $date)
    {
        $aula = self::findByData($date, $turmaId, $ucId);
	    
	    $aula->data               = Carbon::createFromFormat('d/m/Y', array_get($data, 'data'));
        $aula->status             = array_get($data, 'status', 0);
        $aula->conteudo           = array_get($data, 'conteudo');
        $aula->obs                = array_get($data, 'obs');
        $aula->ensino_a_distancia = array_get($data, 'ensino_a_distancia', false);
        
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
    
    public static function updateData($ucId, $turmaId, $id, $newData)
    {
        $aula = self::findById($id, $turmaId, $ucId);

        $aula->data = Carbon::createFromFormat('d/m/Y', $newData);
        
	    if (!$aula->save()) {
	        throw new ServerError(Lang::get('aulas.save_error'));
        }
        
        return $aula;
    }
    
}
