<?php namespace App\Services;

use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\UsuarioRepositoryContract;
use App\Services\Contracts\CursoServiceContract;

class CursoService implements CursoServiceContract
{
    protected $repository;
    protected $usuarioRepository;

    public function __construct(CursoRepositoryContract $repository, UsuarioRepositoryContract $usuarioRepository)
    {
        $this->repository        = $repository;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');

        if ($query == null) {
            $cursos = $this->repository->listAll();
        } else {
            $cursos = $this->repository->searchByName($query);
        }

        return $cursos;
    }

    public function show($id)
    {
        $curso = $this->repository->findById($id);
        return $curso;
    }

    public function edit(array $data, $id)
    {
        $coordenador = $this->usuarioRepository->findByMatricula(array_get($data, 'coordenador_matricula'));
        $curso = $this->repository->update($data, $id, $coordenador);

        return $curso;
    }

    public function save(array $data)
    {
        $coordenador = $this->usuarioRepository->findByMatricula(array_get($data, 'coordenador_matricula'));
        $curso = $this->repository->insert($data, $coordenador);

        return $curso;
    }

    public function delete($id)
    {
        $this->repository->deleteById($id);
    }
}