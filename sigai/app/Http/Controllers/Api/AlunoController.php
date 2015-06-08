<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;

use App\Models\Aluno;
use App\Repositories\AlunoRepository;

use \DB;
use \Lang;
use \Input;

class AlunoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function listar()
	{
	    $q       = e(Input::get('query'));
	    $turmaId = e(Input::get('turmaId'));
	    
        $alunos = AlunoRepository::searchByNameAndMatricula($q, $turmaId);
        
		return $this->jsonResponse($alunos);
	}
	
	public function mostrar($matricula)
	{
	    $aluno = AlunoRepository::findByMatricula($matricula);

        return $this->jsonResponse($aluno);
	}

	public function editar(UpdateAlunoRequest $request, $matricula)
	{
        $aluno = AlunoRepository::updateByMatricula($request->all(), $matricula);
        
        return $this->jsonResponse([
            'message'   => Lang::get('alunos.saved'),
            'aluno' => $aluno
        ]);
	}
	
	public function salvar(SalvarAlunoRequest $request)
    {
        $aluno = AlunoRepository::insert($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('alunos.saved'),
            'aluno' => $aluno
        ]);
	}
    
    public function deletar($matricula)
	{
	    AlunoRepository::deleteByMatricula($matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('alunos.remove_success')
        ]);
	}
}
