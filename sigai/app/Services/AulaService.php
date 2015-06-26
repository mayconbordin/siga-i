<?php namespace App\Services;

use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Services\Contracts\AulaServiceContract;

use Carbon\Carbon;

class AulaService implements AulaServiceContract
{
    protected $repository;
    protected $turmaRepository;
    protected $chamadaRepository;
    protected $alunoRepository;

    public function __construct(AulaRepositoryContract $repository, TurmaRepositoryContract $turmaRepository,
                                ChamadaRepositoryContract $chamadaRepository, AlunoRepositoryContract $alunoRepository)
    {
        $this->repository        = $repository;
        $this->turmaRepository   = $turmaRepository;
        $this->chamadaRepository = $chamadaRepository;
        $this->alunoRepository   = $alunoRepository;
    }

    public function listAll($ucId, $turmaId, array $parameters)
    {
        $turma = $this->turmaRepository->findById($turmaId, $ucId);

        $start = array_get($parameters, 'start', null);
        $end   = array_get($parameters, 'end', null);

        if ($start != null) {
            $start = Carbon::createFromFormat('Y-m-d', $start);
        }

        if ($end != null) {
            $end = Carbon::createFromFormat('Y-m-d', $end);
        }

        $aulas = $this->repository->findByTurmaBetweenDates($turma->id, $start, $end);

        return $aulas;
    }

    public function show($ucId, $turmaId, $data)
    {
        $date = Carbon::createFromFormat('Y-m-d', $data);
        $aula = $this->repository->findByData($date, $turmaId, $ucId);

        return $aula;
    }

    public function edit(array $data, $ucId, $turmaId, $date)
    {
        $date = Carbon::createFromFormat('Y-m-d', $date);
        $data['data'] = Carbon::createFromFormat('d/m/Y', $data['data']);

        $aula = $this->repository->update($data, $ucId, $turmaId, $date);

        return $aula;
    }

    public function save(array $data, $ucId, $turmaId)
    {
        $data['data'] = Carbon::createFromFormat('d/m/Y', $data['data']);

        $turma = $this->turmaRepository->findById($turmaId, $ucId);
        $aula  = $this->repository->insert($data, $turma);

        return $aula;
    }

    public function delete($ucId, $turmaId, $data)
    {
        $date = Carbon::createFromFormat('Y-m-d', $data);
        $this->repository->deleteByData($date, $turmaId, $ucId);
    }

    public function changeDate(array $data, $ucId, $turmaId, $id)
    {
        $newData = Carbon::createFromFormat('d/m/Y', array_get($data, 'data'));
        $aula = $this->repository->updateData($ucId, $turmaId, $id, $newData);

        return $aula;
    }

    public function saveChamada(array $chamadas, $ucId, $turmaId, $data)
    {
        $aula = $this->show($ucId, $turmaId, $data);

        for ($i=0; $i<sizeof($chamadas); $i++) {
            $chamadas[$i]['aluno'] = $this->alunoRepository->findByMatricula($chamadas[$i]['matricula']);
        }

        $this->chamadaRepository->insertOrUpdateAll($chamadas, $aula);
    }
}