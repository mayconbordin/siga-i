<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\SalvarTurmaRequest;
use App\Http\Requests\SalvarDiarioRequest;
use App\Http\Requests\SalvarAlunoTurmaRequest;

use App\Repositories\TurmaRepository;
use App\Repositories\UsuarioRepository;
use App\Repositories\DiarioRepository;
use App\Repositories\ProfessorRepository;

use App\Exceptions\BadRequest;
use App\Exceptions\ConflictError;

use App\Services\Contracts\DiarioServiceContract;
use \DB;
use \Lang;
use \Input;
use \Auth;

use Carbon\Carbon;

class TurmaController extends Controller
{
    protected $turmaRepository;
    protected $diarioService;

    public function __construct(DiarioServiceContract $diarioService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->diarioService = $diarioService;
    }
    
    public function listar()
    {
        $perPage = Input::get('limit');
        $sort    = Input::get('sort');
        $order   = Input::get('order');
        $search  = Input::get('search');
        $field   = Input::get('field');
        
        if ($sort == "unidade_curricular") {
            $sort = "uc.sigla";
        }
        
        $turmas = TurmaRepository::search($perPage, $sort, $order, $search, $field);
        
        $data = $turmas->toArray();
        $data['rows'] = $data['data'];
        
        unset($data['data']);
        
        return $this->jsonResponse($data);
    }

	public function mostrar($ucId, $id)
	{
	    $turma = TurmaRepository::findById($id, $ucId);
	    return $this->jsonResponse($turma);
	}
	
	public function editar(SalvarTurmaRequest $request, $ucId, $id)
	{
	    $turma = TurmaRepository::update($request->all(), $ucId, $id);

        return $this->jsonResponse([
            'message' => Lang::get('turmas.saved'),
            'turma'   => $turma
        ]);
	}
	
	public function salvar(SalvarTurmaRequest $request, $ucId)
	{
	    $turma = TurmaRepository::insert($request->all(), $ucId);

        return $this->jsonResponse([
            'message' => Lang::get('turmas.saved'),
            'turma'   => $turma
        ]);
	}
	
	public function deletar($ucId, $id)
	{
	    TurmaRepository::deleteById($id, $ucId);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.remove_success')]);
	}
	
	public function listarAlunos($ucId, $id)
	{
	    $turma = TurmaRepository::findByIdWith($id, $ucId, ['alunos', 'alunos.usuario']);
	    
	    return $this->jsonResponse($turma->alunos);
	}
	
	public function vincularAluno(SalvarAlunoTurmaRequest $request, $ucId, $turmaId, $matricula)
	{
	    $result = TurmaRepository::attachAluno($request->all(), $ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_attached'),
	        'aluno'   => $result['aluno']
        ], ['pivot']);
	}
	
	public function desvincularAluno($ucId, $turmaId, $matricula)
	{
	    TurmaRepository::detachAluno($ucId, $turmaId, $matricula);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_detached')
        ]);
	}
	
	public function updateAluno(SalvarAlunoTurmaRequest $request, $ucId, $turmaId, $matricula)
	{
	    $aluno = TurmaRepository::updateAluno($request->all(), $ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('turmas.aluno_updated'),
	        'aluno'   => $aluno
        ], ['pivot']);
	}

	public function listarProfessores($ucId, $id)
	{
	    $turma = TurmaRepository::findByIdWith($id, $ucId, ['professores', 'professores.usuario']);
	    
	    return $this->jsonResponse($turma->professores);
	}
	
	public function vincularProfessor($ucId, $turmaId, $matricula)
	{
	    $result = TurmaRepository::attachProfessor($ucId, $turmaId, $matricula);

	    return $this->jsonResponse([
	        'message'   => Lang::get('turmas.professor_attached'),
	        'professor' => $result['professor']
        ], ['pivot']);
	}
	
	public function desvincularProfessor($ucId, $turmaId, $matricula)
	{
	    TurmaRepository::detachProfessor($ucId, $turmaId, $matricula);
	    
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
        ], ['professor', 'turma']);
	}

    public function enviarDiario($ucId, $turmaId, $month)
    {
        $envio = $this->diarioService->sendDiario($ucId, $turmaId, $month);

        return $this->jsonResponse([
            'message' => Lang::get('diarios.sent'),
            'envio'  => $envio
        ]);
    }

}
