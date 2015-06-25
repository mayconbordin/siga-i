<?php namespace App\Services\Contracts;

interface CursoServiceContract {
    public function listAll(array $parameters);
    public function show($id);
    public function edit(array $data, $id);
    public function save(array $data);
    public function delete($id);
}