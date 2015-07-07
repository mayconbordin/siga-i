<?php namespace App\Services;

use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Repositories\Contracts\AmbienteRepositoryContract;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Services\Contracts\AulaServiceContract;

use App\Utils\DateUtils;
use Carbon\Carbon;

class AulaService implements AulaServiceContract
{
    protected $repository;
    protected $turmaRepository;
    protected $chamadaRepository;
    protected $alunoRepository;
    protected $ambienteRepository;

    public function __construct(AulaRepositoryContract $repository, TurmaRepositoryContract $turmaRepository,
                                ChamadaRepositoryContract $chamadaRepository, AlunoRepositoryContract $alunoRepository,
                                AmbienteRepositoryContract $ambienteRepository)
    {
        $this->repository         = $repository;
        $this->turmaRepository    = $turmaRepository;
        $this->chamadaRepository  = $chamadaRepository;
        $this->alunoRepository    = $alunoRepository;
        $this->ambienteRepository = $ambienteRepository;
    }

    public function listAll($ucId, $turmaId, array $parameters)
    {
        $turma = $this->turmaRepository->findById($turmaId, $ucId);

        $start = array_get($parameters, 'start', null);
        $end   = array_get($parameters, 'end', null);

        if ($start != null) {
            $start = DateUtils::parseDate($start);
        }

        if ($end != null) {
            $end = DateUtils::parseDate($end);
        }

        $aulas = $this->repository->findByTurmaBetweenDates($turma->id, $start, $end);

        return $aulas;
    }

    public function show($ucId, $turmaId, $data)
    {
        $date = DateUtils::parseDate($data);
        $aula = $this->repository->findByData($date, $turmaId, $ucId);

        return $aula;
    }

    public function showFull($ucId, $turmaId, $data)
    {
        $date   = DateUtils::parseDate($data);
        $aula   = $this->repository->findByDataWithAll($date, $turmaId, $ucId);
        $alunos = $this->alunoRepository->findByAulaWithChamada($turmaId, $aula->id);

        // soma número de presenças por aluno
        foreach ($alunos as $aluno) {
            $aluno->presencas = array_sum([$aluno->p1, $aluno->p2, $aluno->p3, $aluno->p4]);
        }

        return ['aula' => $aula, 'alunos' => $alunos];
    }

    public function edit(array $data, $ucId, $turmaId, $date)
    {
        $date = DateUtils::parseDate($date);

        $this->parseAulaDates($data);

        if (isset($data['ambiente_id']) && strlen($data['ambiente_id']) > 0) {
            $data['ambiente'] = $this->ambienteRepository->findById($data['ambiente_id']);
        }

        $aula = $this->repository->update($data, $ucId, $turmaId, $date);

        return $aula;
    }

    public function save(array $data, $ucId, $turmaId)
    {
        $this->parseAulaDates($data);

        if (isset($data['ambiente_id']) && strlen($data['ambiente_id']) > 0) {
            $data['ambiente'] = $this->ambienteRepository->findById($data['ambiente_id']);
        }

        $turma = $this->turmaRepository->findById($turmaId, $ucId);
        $aula  = $this->repository->insert($data, $turma);

        return $aula;
    }

    public function delete($ucId, $turmaId, $data)
    {
        $date = DateUtils::parseDate($data);
        $this->repository->deleteByData($date, $turmaId, $ucId);
    }

    public function changeDate(array $data, $ucId, $turmaId, $id)
    {
        $newData = DateUtils::parseDate(array_get($data, 'data'));
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

    protected function parseAulaDates(array &$data)
    {
        $data['data']           = DateUtils::parseDate($data['data']);
        $data['horario_inicio'] = Carbon::createFromFormat('H:i:s', $data['horario_inicio']);
        $data['horario_fim']    = Carbon::createFromFormat('H:i:s', $data['horario_fim']);
    }
}