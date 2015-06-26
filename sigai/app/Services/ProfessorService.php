<?php namespace App\Services;

use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Services\Contracts\ProfessorServiceContract;

class ProfessorService implements ProfessorServiceContract
{
    protected $repository;
    protected $cursoRepository;

    public function __construct(ProfessorRepositoryContract $repository, CursoRepositoryContract $cursoRepository)
    {
        $this->repository      = $repository;
        $this->cursoRepository = $cursoRepository;
    }

    public function listAll(array $parameters)
    {
        $query   = array_get($parameters, 'query', null);
        $turmaId = array_get($parameters, 'turmaId', null);

        $professores = $this->repository->searchByNameAndMatricula($query, $turmaId);

        return $professores;
    }

    public function show($matricula)
    {
        return $this->repository->findByMatricula($matricula);
    }

    public function edit(array $data, $matricula)
    {
        $data['curso_origem'] = $this->cursoRepository->findById($data['curso_origem_id']);
        $professor = $this->repository->updateByMatricula($data, $matricula);

        return $professor;
    }

    public function save(array $data)
    {
        $data['curso_origem'] = $this->cursoRepository->findById($data['curso_origem_id']);
        $professor = $this->repository->insert($data);

        return $professor;
    }

    public function delete($matricula)
    {
        $this->repository->deleteByMatricula($matricula);
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
}