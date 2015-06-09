<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\User;
use App\Models\Chamada;
use App\Models\Role;

use App\Repositories\CursoRepository;
use App\Repositories\UnidadeCurricularRepository;
use App\Repositories\TurmaRepository;
use App\Repositories\AulaRepository;
use App\Repositories\AlunoRepository;
use App\Repositories\ChamadaRepository;
use App\Repositories\ProfessorRepository;

use App\Exceptions\NotFoundError;

use Illuminate\Contracts\Bus\SelfHandling;

use \DB;
use \Log;

class ImportData extends Command implements SelfHandling {

    protected $usuario, $data;
    
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(User $usuario, array $data)
	{
		$this->usuario = $usuario;
		$this->data    = $data;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
	    DB::beginTransaction();
	    
	    try {
		    $this->importUnidadeCurricular($this->data['unidade_curricular']);
		    $this->importCursos($this->data['cursos']);
		    $this->importTurma($this->data['turma']);
	        $this->importAulas($this->data['aulas']);
	        $this->importAlunos($this->data['alunos']);

	        $this->importFaltasAlunos($this->data['alunos']);
            $this->associateAlunosAulas($this->data['alunos']);
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
		        $this->cursos[$curso['nome']] = CursoRepository::findByNome($curso['nome']);
		    } catch (NotFoundError $e) {
		        $c = CursoRepository::insert($curso);
		        //$c->unidadesCurriculares()->attach($this->uc);
		        
		        $this->cursos[$curso['nome']] = $c;
		    }
		}
	}
	
	protected function importUnidadeCurricular($uc)
	{
	    try {
		    $this->uc = UnidadeCurricularRepository::findByNome($uc['nome']);
	    } catch (NotFoundError $e) {
	        $this->uc = UnidadeCurricularRepository::insert($uc);
	    }
	}
	
	protected function importTurma($turma)
	{
	    try {
	        $this->turma = TurmaRepository::findByNomeAndData($turma['nome'], 
	            $turma['data_inicio'], $turma['data_fim']);
	    } catch (NotFoundError $e) {
	        $this->turma = TurmaRepository::insert($turma, $this->uc->id, 'Y-m-d');
	    }
	}
	
	protected function importAulas($aulas)
	{
	    $this->aulas = [];
	    
	    foreach ($aulas as $aula) {
	        try {
		        $this->aulas[$aula['data']] = AulaRepository::findByData($aula['data'],
		            $this->turma->id, $this->uc->id);
		    } catch (NotFoundError $e) {
		        $this->aulas[$aula['data']] = AulaRepository::insert($aula,
		            $this->uc->id, $this->turma->id, 'Y-m-d');
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
	            $this->alunos[$aluno['matricula']] = AlunoRepository::findByMatricula($aluno['matricula']);
	        } catch (NotFoundError $e) {
	            $aluno['password'] = '12345';
	            $aluno['email']    = str_replace(" ", "_", strtolower($aluno['nome'])) . "@gmail.com";
		        $this->alunos[$aluno['matricula']] = AlunoRepository::insert($aluno);
		        
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
                    $chamada = ChamadaRepository::findByAulaAndAluno($aula->id, $_aluno->id);
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
	        
	        if (!TurmaRepository::hasAluno($this->turma->id, $_aluno->id)) {
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
	        $curso = CursoRepository::findByNome($curso);
	        
	        if ($curso->unidadesCurriculares()->find($this->uc->id) == null) {
	            $curso->unidadesCurriculares()->attach($this->uc);
	        }
	    }
	}
	
	protected function associateProfessorTurma()
	{
	    $professor = ProfessorRepository::findById($this->usuario->id);
	    
	    if ($this->turma->professores()->find($professor->id) == null) {
	        $this->turma->professores()->attach($professor);
	    }
	}

}
