<?php namespace App\Services\Contracts;


interface TurmaServiceContract {
    public function filter(array $parameters);
    public function show($ucId, $id);
    public function showFull($ucId, $id);
    public function getByNomeAndData($nome, $dataInicio, $dataFim);
    public function edit(array $data, $ucId, $id);
    public function save(array $data, $ucId);
    public function delete($ucId, $id);
    public function listAlunos($ucId, $id);
    public function attachAluno(array $data, $ucId, $turmaId, $matricula);
    public function detachAluno($ucId, $turmaId, $matricula);
    public function updateAluno(array $data, $ucId, $turmaId, $matricula);
    public function listProfessores($ucId, $id);
    public function attachProfessor($ucId, $turmaId, $matricula);
    public function detachProfessor($ucId, $turmaId, $matricula);
}