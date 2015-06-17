<?php namespace App\Repositories\Contracts;

use App\Models\User;

interface CursoRepositoryContract
{
    public function findById($id);
    
    public function findByNome($nome);
    
    public function searchByName($query);
    
    public function listAll();
    
    public function paginate($orderBy = 'nome', $perPage = 10);

    public function update(array $data, $id, User $coordenador);
    
    public function insert(array $data, User $coordenador);
    
    public function deleteById($id);
}
