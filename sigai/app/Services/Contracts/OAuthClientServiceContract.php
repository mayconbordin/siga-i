<?php namespace App\Services\Contracts;

interface OAuthClientServiceContract {
    public function listAll(array $parameters = null);
    public function show($id);
    public function edit(array $data, $id);
    public function editAmbiente(array $data, $id);
    public function save(array $data);
    public function delete($id);
    public function paginate();
}