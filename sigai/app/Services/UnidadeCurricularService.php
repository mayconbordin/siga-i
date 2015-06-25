<?php namespace App\Services;

use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\UnidadeCurricularRepositoryContract;
use App\Services\Contracts\UnidadeCurricularServiceContract;

use \DB;

class UnidadeCurricularService implements UnidadeCurricularServiceContract
{
    protected $ucRepository;
    protected $cursoRepository;

    public function __construct(UnidadeCurricularRepositoryContract $ucRepository, CursoRepositoryContract $cursoRepository)
    {
        $this->ucRepository    = $ucRepository;
        $this->cursoRepository = $cursoRepository;
    }

    public function listAll()
    {
        return $this->ucRepository->listAll();
    }

    public function show($id)
    {
        return $this->ucRepository->findById($id);
    }

    public function delete($id)
    {
        $this->ucRepository->deleteById($id);
    }

    public function listAllTurmas($id)
    {
        $uc = $this->ucRepository->findByIdWith($id, ['turmas']);
        return $uc->turmas;
    }

    public function listAllCursos($id)
    {
        $uc = $this->ucRepository->findByIdWith($id, ['cursos']);
        return $uc->cursos;
    }

    public function attachCurso($id, $cursoId)
    {
        $curso = $this->cursoRepository->findById($cursoId);
        return $this->ucRepository->attachCurso($id, $curso);
    }

    public function detachCurso($id, $cursoId)
    {
        $curso = $this->cursoRepository->findById($cursoId);
        $this->ucRepository->detachCurso($id, $curso);
    }
}