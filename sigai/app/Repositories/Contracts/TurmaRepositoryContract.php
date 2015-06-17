<?php namespace App\Repositories\Contracts;

use App\Models\Turma;
use App\Models\Professor;
use App\Models\Aluno;
use App\Models\UnidadeCurricular;

interface TurmaRepositoryContract
{
    public function findById($id, $unidadeCurricularId);
    
    public function findByNomeAndData($nome, $dataInicio, $dataFim);
    
    public function findByIdWith($id, $unidadeCurricularId, array $relations);
    
    public function findByIdWithAll($id, $unidadeCurricularId);
    
    public function search($perPage = 10, $sort = 'turmas.id', $order = 'asc', $search = null, $field = null);
    
    public function update(array $data, $ucId, $id);
    
    public function insert(array $data, UnidadeCurricular $uc, $dateFormat = 'd/m/Y');
    
    public function deleteById($id, $unidadeCurricularId);
    
    public function attachAluno(array $data, $ucId, $turmaId, Aluno $aluno);
    
    public function detachAluno($ucId, $turmaId, Aluno $aluno);
    
    public function updateAluno(array $data, $ucId, $turmaId, Aluno $aluno);
    
    public function hasAluno($turmaId, $alunoId);
    
    public function attachProfessor($ucId, $turmaId, Professor $professor);
    
    public function detachProfessor($ucId, $turmaId, Professor $professor);
    
    public function hasProfessor($turmaId, $professorId);
}
