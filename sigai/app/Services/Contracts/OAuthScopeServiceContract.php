<?php namespace App\Services\Contracts;

interface OAuthScopeServiceContract {
    public function listAll();
    public function show($id);
    public function edit(array $data, $id);
    public function save(array $data);
    public function delete($id);
    public function paginate();
}