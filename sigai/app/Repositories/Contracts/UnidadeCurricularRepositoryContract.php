<?php namespace App\Repositories\Contracts;

use App\Models\Curso;

interface UnidadeCurricularRepositoryContract
{
    public function findById($id);

    public function findByIdWith($id, array $relations);

    public function findByNome($nome);

    public function listAll();

    public function paginate($perPage = 10);

    public function paginateWith(array $relations, $perPage = 10);

    public function attachCurso($id, Curso $curso);

    public function detachCurso($id, Curso $curso);

    public function insert(array $data);

    public function update(array $data, $id);

    public function deleteById($id);
}