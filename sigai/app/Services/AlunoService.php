<?php namespace App\Services;

use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Services\Contracts\AlunoServiceContract;

class AlunoService implements AlunoServiceContract
{
    protected $repository;

    public function __construct(AlunoRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function listAll(array $parameters)
    {
        $query   = array_get($parameters, 'query', null);
        $turmaId = array_get($parameters, 'turmaId', null);

        $alunos = $this->repository->searchByNameAndMatricula($query, $turmaId);

        return $alunos;
    }

    public function show($matricula)
    {
        return $this->repository->findByMatricula($matricula);
    }

    public function edit(array $data, $matricula)
    {
        $aluno = $this->repository->updateByMatricula($data, $matricula);
        return $aluno;
    }

    public function save(array $data)
    {
        $aluno = $this->repository->insert($data);
        return $aluno;
    }

    public function delete($matricula)
    {
        $this->repository->deleteByMatricula($matricula);
    }
}