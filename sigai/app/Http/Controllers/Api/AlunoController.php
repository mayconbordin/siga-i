<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAlunoRequest;
use App\Http\Requests\SearchAlunosRequest;
use App\Http\Requests\UpdateAlunoRequest;

use App\Services\Contracts\AlunoServiceContract;
use \DB;
use \Lang;
use \Input;

class AlunoController extends Controller
{
    protected $service;

    public function __construct(AlunoServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar(SearchAlunosRequest $request)
	{
        $alunos = $this->service->listAll($request->all());
		return $this->jsonResponse($alunos);
	}
	
	public function mostrar($matricula)
	{
	    $aluno = $this->service->show($matricula);
        return $this->jsonResponse($aluno);
	}

	public function editar(UpdateAlunoRequest $request, $matricula)
	{
        $aluno = $this->service->edit($request->all(), $matricula);
        
        return $this->jsonResponse([
            'message'   => Lang::get('alunos.saved'),
            'aluno' => $aluno
        ]);
	}
	
	public function salvar(SalvarAlunoRequest $request)
    {
        $aluno = $this->service->save($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('alunos.saved'),
            'aluno' => $aluno
        ]);
	}
    
    public function deletar($matricula)
	{
        $this->service->delete($matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('alunos.remove_success')
        ]);
	}
}
