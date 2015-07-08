<?php namespace App\Services\Contracts;

interface TipoAmbienteServiceContract {
    public function listAll(array $parameters = null);
    public function show($id);
    public function edit(array $data, $id);
    public function save(array $data);
    public function delete($id);
    public function paginate();
}