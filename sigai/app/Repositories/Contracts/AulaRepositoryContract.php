<?php namespace App\Repositories\Contracts;

use App\Models\Turma;

use Carbon\Carbon;

interface AulaRepositoryContract
{
    public function findByTurmaBetweenDates($turmaId, $start = null, $end = null);
    
    public function findByTurmaInMonth($turmaId, $month);
    
    public function findById($id, $turmaId, $unidadeCurricularId);
    
    public function findByData($data, $turmaId, $unidadeCurricularId);
    
    public function findByDataWithAll($data, $turmaId, $unidadeCurricularId);
    
    public function findNextByProfessor($professorId);
    
    public function deleteByData($data, $turmaId, $unidadeCurricularId);
    
    public function insert(array $data, Turma $turma);
    
    public function update(array $data, $ucId, $turmaId, $date);
    
    public function updateData($ucId, $turmaId, $id, Carbon $newData);
    
    public function exists($turmaId, Carbon $date);
}
