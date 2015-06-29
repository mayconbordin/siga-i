<?php namespace App\Services;

use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\DiarioRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Services\Contracts\ProfessorServiceContract;

use Carbon\Carbon;

class ProfessorService implements ProfessorServiceContract
{
    protected $repository;
    protected $cursoRepository;
    protected $aulaRepository;
    protected $diarioRepository;

    public function __construct(ProfessorRepositoryContract $repository, CursoRepositoryContract $cursoRepository,
                                AulaRepositoryContract $aulaRepository, DiarioRepositoryContract $diarioRepository)
    {
        $this->repository        = $repository;
        $this->cursoRepository   = $cursoRepository;
        $this->aulaRepository    = $aulaRepository;
        $this->diarioRepository  = $diarioRepository;
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

    public function showSummary($id)
    {
        $professor = $this->repository->findByIdWith($id, ['turmas']);
        $nextAulas = $this->aulaRepository->findNextByProfessor($professor->id);
        $diarios   = $this->diarioRepository->findDiariosToClose($professor);

        $daysEndMonth = Carbon::now()->diffInDays(Carbon::now()->endOfMonth());

        return [
            'professor'    => $professor,
            'turmas'       => $professor->turmas,
            'nextAulas'    => $nextAulas,
            'diarios'      => $diarios,
            'daysEndMonth' => $daysEndMonth
        ];
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