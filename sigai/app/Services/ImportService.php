<?php namespace App\Services;

use App\Exceptions\NotFoundError;
use App\Models\User;
use App\Models\Chamada;
use App\Models\Role;

use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\UnidadeCurricularRepositoryContract;
use App\Services\Contracts\AulaServiceContract;
use App\Services\Contracts\ChamadaServiceContract;
use App\Services\Contracts\ImportServiceContract;

use App\Services\Contracts\TurmaServiceContract;
use Carbon\Carbon;
use \DB;
use \Log;
use \Lang;

class ImportService implements ImportServiceContract
{
    protected $cursoRepository;
    protected $ucRepository;
    protected $turmaRepository;
    protected $alunoRepository;
    protected $professorRepository;

    protected $turmaService;
    protected $aulaService;
    protected $chamadaService;

    protected $usuario;

    public $defaultHorarioInicio = '16:30:00';
    public $defaultHorarioFim    = '22:30:00';
    public $defaultAmbienteId    = 1;

    public function __construct(CursoRepositoryContract $cursoRepository, UnidadeCurricularRepositoryContract $ucRepository,
                                TurmaRepositoryContract $turmaRepository, AlunoRepositoryContract $alunoRepository,
                                ProfessorRepositoryContract $professorRepository, TurmaServiceContract $turmaService,
                                AulaServiceContract $aulaService, ChamadaServiceContract $chamadaService)
    {
        $this->cursoRepository     = $cursoRepository;
        $this->ucRepository        = $ucRepository;
        $this->turmaRepository     = $turmaRepository;
        $this->alunoRepository     = $alunoRepository;
        $this->professorRepository = $professorRepository;

        $this->turmaService        = $turmaService;
        $this->aulaService         = $aulaService;
        $this->chamadaService      = $chamadaService;
    }

    public function importExcel(User $usuario, array $data)
    {
        $this->usuario = $usuario;

        DB::beginTransaction();

        try {
            $this->importUnidadeCurricular($data['unidade_curricular']);
            $this->importCursos($data['cursos']);
            $this->importTurma($data['turma']);
            $this->importAulas($data['aulas']);
            $this->importAlunos($data['alunos']);

            $this->importFaltasAlunos($data['alunos']);
            $this->associateAlunosAulas($data['alunos']);
            $this->associateCursosUnidadeCurricular();
            $this->associateProfessorTurma();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['exception' => $e, 'trace' => $e->getTrace()]);
            throw $e;
        }

        DB::commit();
    }

    protected function importCursos($cursos)
    {
        $this->cursos = [];

        foreach ($cursos as $curso) {
            try {
                $this->cursos[$curso['nome']] = $this->cursoRepository->findByNome($curso['nome']);
            } catch (NotFoundError $e) {
                $c = $this->cursoRepository->insert($curso);

                $this->cursos[$curso['nome']] = $c;
            }
        }
    }

    protected function importUnidadeCurricular($uc)
    {
        try {
            $this->uc = $this->ucRepository->findByNome($uc['nome']);
        } catch (NotFoundError $e) {
            $this->uc = $this->ucRepository->insert($uc);
        }
    }

    protected function importTurma($turma)
    {
        $turma['horario_inicio'] = $this->defaultHorarioInicio;
        $turma['horario_fim']    = $this->defaultHorarioFim;
        $turma['ambiente_id']    = $this->defaultAmbienteId;

        try {
            $this->turma = $this->turmaService->getByNomeAndData($turma['nome'], $turma['data_inicio'], $turma['data_fim']);
        } catch (NotFoundError $e) {
            $this->turma = $this->turmaService->save($turma, $this->uc->id);
        }
    }

    protected function importAulas($aulas)
    {
        $this->aulas = [];

        foreach ($aulas as $aula) {
            $aula['horario_inicio'] = $this->defaultHorarioInicio;
            $aula['horario_fim']    = $this->defaultHorarioFim;

            try {
                $this->aulas[$aula['data']] = $this->aulaService->show($this->uc->id, $this->turma->id, $aula['data']);
            } catch (NotFoundError $e) {
                $this->aulas[$aula['data']] = $this->aulaService->save($aula, $this->uc->id, $this->turma->id);
            }
        }
    }

    protected function importAlunos($alunos)
    {
        $this->alunos = [];
        $this->cursosUC = [];

        foreach ($alunos as $aluno) {
            $this->cursosUC[$aluno['curso']] = true;

            try {
                $this->alunos[$aluno['matricula']] = $this->alunoRepository->findByMatricula($aluno['matricula']);
            } catch (NotFoundError $e) {
                $aluno['password'] = '12345';
                $aluno['email']    = str_replace(" ", "_", strtolower($aluno['nome'])) . "@gmail.com";
                $this->alunos[$aluno['matricula']] = $this->alunoRepository->insert($aluno);
            }
        }
    }

    protected function importFaltasAlunos($alunos)
    {
        foreach ($alunos as $aluno) {
            foreach ($aluno['faltas'] as $data => $periodos) {
                $aula = $this->aulas[$data];
                $_aluno = $this->alunos[$aluno['matricula']];

                $this->chamadaService->saveOrUpdate($aula, $_aluno, $periodos);
            }
        }
    }

    protected function associateAlunosAulas($alunos)
    {
        foreach ($alunos as $aluno) {
            $_aluno = $this->alunos[$aluno['matricula']];

            if (!$this->turmaRepository->hasAluno($this->turma->id, $_aluno->id)) {
                $this->turma->alunos()->attach($_aluno, [
                    'status'          => $aluno['status'],
                    'curso_origem_id' => $this->cursos[$aluno['curso']]->id
                ]);
            }
        }
    }

    protected function associateCursosUnidadeCurricular()
    {
        foreach ($this->cursosUC as $curso => $v) {
            $curso = $this->cursoRepository->findByNome($curso);

            if ($curso->unidadesCurriculares()->find($this->uc->id) == null) {
                $curso->unidadesCurriculares()->attach($this->uc);
            }
        }
    }

    protected function associateProfessorTurma()
    {
        $professor = $this->professorRepository->findById($this->usuario->id);

        if ($this->turma->professores()->find($professor->id) == null) {
            $this->turma->professores()->attach($professor);
        }
    }
}