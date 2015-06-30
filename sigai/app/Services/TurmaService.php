<?php namespace App\Services;


use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Repositories\Contracts\AmbienteRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Repositories\Contracts\DiarioRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\UnidadeCurricularRepositoryContract;
use App\Services\Contracts\TurmaServiceContract;

use Carbon\Carbon;

class TurmaService implements TurmaServiceContract
{
    protected $turmaRepository;
    protected $ucRepository;
    protected $alunoRepository;
    protected $professorRepository;
    protected $diarioRepository;
    protected $chamadaRepository;
    protected $ambienteRepository;

    protected $sortFields = [
        'id'                 => 'turmas.id',
        'nome'               => 'turmas.nome',
        'data_inicio'        => 'turmas.data_inicio',
        'data_fim'           => 'turmas.data_fim',
        'unidade_curricular' => 'uc.sigla'
    ];

    public function __construct(TurmaRepositoryContract $turmaRepository, UnidadeCurricularRepositoryContract $ucRepository,
                                AlunoRepositoryContract $alunoRepository, ProfessorRepositoryContract $professorRepository,
                                DiarioRepositoryContract $diarioRepository, ChamadaRepositoryContract $chamadaRepository,
                                AmbienteRepositoryContract $ambienteRepository)
    {
        $this->turmaRepository     = $turmaRepository;
        $this->ucRepository        = $ucRepository;
        $this->alunoRepository     = $alunoRepository;
        $this->professorRepository = $professorRepository;
        $this->chamadaRepository   = $chamadaRepository;
        $this->diarioRepository    = $diarioRepository;
        $this->ambienteRepository  = $ambienteRepository;
    }

    public function filter(array $parameters)
    {
        $perPage   = array_get($parameters, 'limit', 10);
        $sortField = array_get($parameters, 'sort', 'id');
        $order     = array_get($parameters, 'order', 'asc');
        $search    = array_get($parameters, 'search', null);
        $field     = array_get($parameters, 'field', null);

        $sort = $this->sortFields[$sortField];

        $turmas = $this->turmaRepository->search($perPage, $sort, $order, $search, $field);

        $data = $turmas->toArray();
        $data['rows'] = $data['data'];

        unset($data['data']);

        return $data;
    }

    public function show($ucId, $id)
    {
        return $this->turmaRepository->findById($id, $ucId);
    }

    public function showFull($ucId, $id)
    {
        $data = new \stdClass;

        $data->turma = $this->turmaRepository->findByIdWithAll($id, $ucId);
        $data->faltas = $this->chamadaRepository->findFaltasByTurma($data->turma->id);
        $data->alunos = $this->alunoRepository->findByTurmaWithPivot($data->turma->id);
        $data->diariosToClose = $this->diarioRepository->findDiariosToCloseByTurma($data->turma);
        $data->diarios = $this->diarioRepository->findAllByTurma($data->turma);

        return $data;
    }

    public function edit(array $data, $ucId, $id)
    {
        $this->parseTurmaDates($data);
        $data['ambiente'] = $this->ambienteRepository->findById($data['ambiente_id']);
        
        return $this->turmaRepository->update($data, $ucId, $id);
    }

    public function save(array $data, $ucId)
    {
        $uc = $this->ucRepository->findById($ucId);

        $this->parseTurmaDates($data);
        $data['ambiente'] = $this->ambienteRepository->findById($data['ambiente_id']);

        return $this->turmaRepository->insert($data, $uc);
    }

    public function delete($ucId, $id)
    {
        $this->turmaRepository->deleteById($id, $ucId);
    }

    public function listAlunos($ucId, $id)
    {
        $turma = $this->turmaRepository->findByIdWith($id, $ucId, ['alunos', 'alunos.usuario']);
        return $turma->alunos;
    }

    public function attachAluno(array $data, $ucId, $turmaId, $matricula)
    {
        $aluno  = $this->alunoRepository->findByMatricula($matricula);
        $result = $this->turmaRepository->attachAluno($data, $ucId, $turmaId, $aluno);

        return $result['aluno'];
    }

    public function detachAluno($ucId, $turmaId, $matricula)
    {
        $aluno = $this->alunoRepository->findByMatricula($matricula);
        $this->turmaRepository->detachAluno($ucId, $turmaId, $aluno);
    }

    public function updateAluno(array $data, $ucId, $turmaId, $matricula)
    {
        $aluno = $this->alunoRepository->findByMatricula($matricula);
        $aluno = $this->turmaRepository->updateAluno($data, $ucId, $turmaId, $aluno);

        return $aluno;
    }

    public function listProfessores($ucId, $id)
    {
        $turma = $this->turmaRepository->findByIdWith($id, $ucId, ['professores', 'professores.usuario']);
        return $turma->professores;
    }

    public function attachProfessor($ucId, $turmaId, $matricula)
    {
        $professor = $this->professorRepository->findByMatricula($matricula);
        $result = $this->turmaRepository->attachProfessor($ucId, $turmaId, $professor);

        return $result['professor'];
    }

    public function detachProfessor($ucId, $turmaId, $matricula)
    {
        $professor = $this->professorRepository->findByMatricula($matricula);
        $this->turmaRepository->detachProfessor($ucId, $turmaId, $professor);
    }

    protected function parseTurmaDates(array &$data)
    {
        $data['data_inicio'] = Carbon::createFromFormat('d/m/Y', $data['data_inicio']);
        $data['data_fim']    = Carbon::createFromFormat('d/m/Y', $data['data_fim']);

        $data['horario_inicio'] = Carbon::createFromFormat('H:i:s', $data['horario_inicio']);
        $data['horario_fim']    = Carbon::createFromFormat('H:i:s', $data['horario_fim']);
    }
}