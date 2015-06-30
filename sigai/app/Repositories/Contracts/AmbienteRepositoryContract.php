<?php namespace App\Repositories\Contracts;

interface AmbienteRepositoryContract {
    public function findById($id);
    public function findByNome($nome);
    public function searchByName($query);
    public function listAll();
    public function paginate($orderBy = 'nome', $perPage = 10);
    public function update(array $data, $id);
    public function insert(array $data);
    public function deleteById($id);
}