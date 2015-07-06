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
use App\Services\Contracts\ImportServiceContract;

use Carbon\Carbon;
use \DB;
use \Log;

class ImportService implements ImportServiceContract
{
    protected $cursoRepository;
    protected $ucRepository;
    protected $turmaRepository;
    protected $aulaRepository;
    protected $alunoRepository;
    protected $chamadaRepository;
    protected $professorRepository;

    protected $usuario;

    public function __construct(CursoRepositoryContract $cursoRepository, UnidadeCurricularRepositoryContract $ucRepository,
                                TurmaRepositoryContract $turmaRepository, AulaRepositoryContract $aulaRepository,
                                AlunoRepositoryContract $alunoRepository, ChamadaRepositoryContract $chamadaRepository,
                                ProfessorRepositoryContract $professorRepository)
    {
        $this->cursoRepository     = $cursoRepository;
        $this->ucRepository        = $ucRepository;
        $this->turmaRepository     = $turmaRepository;
        $this->aulaRepository      = $aulaRepository;
        $this->alunoRepository     = $alunoRepository;
        $this->chamadaRepository   = $chamadaRepository;
        $this->professorRepository = $professorRepository;
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
            Log::error($e->getMessage(), ['exception' => $e]);
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
        $turma['data_inicio'] = Carbon::createFromFormat('Y-m-d', $turma['data_inicio']);
        $turma['data_fim']    = Carbon::createFromFormat('Y-m-d', $turma['data_fim']);

        try {
            $this->turma = $this->turmaRepository->findByNomeAndData($turma['nome'], $turma['data_inicio'], $turma['data_fim']);
        } catch (NotFoundError $e) {
            $this->turma = $this->turmaRepository->insert($turma, $this->uc);
        }
    }

    protected function importAulas($aulas)
    {
        $this->aulas = [];

        foreach ($aulas as $aula) {
            $data = $aula['data'];
            $aula['data'] = Carbon::createFromFormat('Y-m-d', $aula['data']);

            try {
                $this->aulas[$data] = $this->aulaRepository->findByData($aula['data'], $this->turma->id, $this->uc->id);
            } catch (NotFoundError $e) {
                $this->aulas[$data] = $this->aulaRepository->insert($aula, $this->turma);
            }
        }
    }

    protected function importAlunos($alunos)
    {
        $this->alunos = [];
        $this->cursosUC = [];

        $role = Role::where('name', 'aluno')->first();

        foreach ($alunos as $aluno) {
            $this->cursosUC[$aluno['curso']] = true;

            try {
                $this->alunos[$aluno['matricula']] = $this->alunoRepository->findByMatricula($aluno['matricula']);
            } catch (NotFoundError $e) {
                $aluno['password'] = '12345';
                $aluno['email']    = str_replace(" ", "_", strtolower($aluno['nome'])) . "@gmail.com";
                $this->alunos[$aluno['matricula']] = $this->alunoRepository->insert($aluno);

                $this->alunos[$aluno['matricula']]->usuario->attachRole($role);
            }
        }
    }

    protected function importFaltasAlunos($alunos)
    {
        foreach ($alunos as $aluno) {
            foreach ($aluno['faltas'] as $data => $periodos) {
                $aula = $this->aulas[$data];
                $_aluno = $this->alunos[$aluno['matricula']];

                try {
                    $chamada = $this->chamadaRepository->findByAulaAndAluno($aula->id, $_aluno->id);
                } catch (NotFoundError $e) {
                    $chamada = new Chamada;
                    $chamada->aluno()->associate($_aluno);
                    $chamada->aula()->associate($aula);
                }

                $chamada->setPeriodos($periodos);
                $chamada->save();
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