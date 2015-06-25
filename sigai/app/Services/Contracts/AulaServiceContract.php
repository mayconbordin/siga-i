<?php namespace App\Services\Contracts;

interface AulaServiceContract {
    public function listAll($ucId, $turmaId, array $parameters);
    public function show($ucId, $turmaId, $data);
    public function edit(array $data, $ucId, $turmaId, $data);
    public function save(array $data, $ucId, $turmaId);
    public function delete($ucId, $turmaId, $data);
    public function changeDate(array $data, $ucId, $turmaId, $id);
    public function saveChamada(array $data, $ucId, $turmaId, $data);
}