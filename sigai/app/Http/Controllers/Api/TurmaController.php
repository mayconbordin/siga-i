<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\SalvarTurmaRequest;
use App\Http\Requests\SalvarAlunoTurmaRequest;
use App\Http\Requests\SearchTurmasRequest;
use App\Services\Contracts\DiarioServiceContract;
use App\Services\Contracts\TurmaServiceContract;

use \DB;
use \Lang;
use \Input;
use \Auth;

class TurmaController extends Controller
{
    protected $turmaService;
    protected $diarioService;

    public function __construct(DiarioServiceContract $diarioService, TurmaServiceContract $turmaService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->turmaService  = $turmaService;
        $this->diarioService = $diarioService;
    }
    
    public function listar(SearchTurmasRequest $request)
    {
        $params = $request->all();
        $data = $this->turmaService->filter($params);

        return $this->jsonResponse($data);
    }

	public function mostrar($ucId, $id)
	{
	    $turma = $this->turmaService->show($ucId, $id);
	    return $this->jsonResponse($turma);
	}
	
	public function editar(SalvarTurmaRequest $request, $ucId, $id)
	{
	    $turma = $this->turmaService->edit($request->all(), $ucId, $id);

        return $this->jsonResponse([
            'message' => Lang::get('turmas.saved'),
            'turma'   => $turma
        ]);
	}
	
	public function salvar(SalvarTurmaRequest $request, $ucId)
	{
        $turma = $this->turmaService->save($request->all(), $ucId);

        return $this->jsonResponse([
            'message' => Lang::get('turmas.saved'),
            'turma'   => $turma
        ]);
	}
	
	public function deletar($ucId, $id)
	{
        $this->turmaService->delete($ucId, $id);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.remove_success')]);
	}
	
	public function listarAlunos($ucId, $id)
	{
        $alunos = $this->turmaService->listAlunos($ucId, $id);
	    
	    return $this->jsonResponse($alunos);
	}
	
	public function vincularAluno(SalvarAlunoTurmaRequest $request, $ucId, $turmaId, $matricula)
	{
        $aluno = $this->turmaService->attachAluno($request->all(), $ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_attached'),
	        'aluno'   => $aluno
        ], ['pivot']);
	}
	
	public function desvincularAluno($ucId, $turmaId, $matricula)
	{
        $this->turmaService->detachAluno($ucId, $turmaId, $matricula);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_detached')
        ]);
	}
	
	public function updateAluno(SalvarAlunoTurmaRequest $request, $ucId, $turmaId, $matricula)
	{
	    $aluno = $this->turmaService->updateAluno($request->all(), $ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_updated'),
	        'aluno'   => $aluno
        ], ['pivot']);
	}

	public function listarProfessores($ucId, $id)
	{
	    $professores = $this->turmaService->listProfessores($ucId, $id);
	    return $this->jsonResponse($professores);
	}
	
	public function vincularProfessor($ucId, $turmaId, $matricula)
	{
        $professor = $this->turmaService->attachProfessor($ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message'   => Lang::get('turmas.professor_attached'),
	        'professor' => $professor
        ], ['pivot']);
	}
	
	public function desvincularProfessor($ucId, $turmaId, $matricula)
	{
        $this->turmaService->detachProfessor($ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.professor_detached')
        ]);
	}
	
	public function fecharDiario($ucId, $turmaId, $month)
	{
        $diario = $this->diarioService->closeDiario($ucId, $turmaId, $month);

        return $this->jsonResponse([
            'message' => Lang::get('diarios.saved'),
            'diario'  => $diario
        ], ['professor', 'turma', 'envios', 'envios.professor']);
	}

    public function enviarDiario($ucId, $turmaId, $month)
    {
        $envio = $this->diarioService->sendDiario($ucId, $turmaId, $month);

        return $this->jsonResponse([
            'message' => Lang::get('diarios.sent'),
            'envio'  => $envio
        ], ['professor']);
    }

}
