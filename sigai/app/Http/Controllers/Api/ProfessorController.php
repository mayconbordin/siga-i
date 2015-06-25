<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProfessoresRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Requests\SalvarProfessorRequest;

use App\Services\Contracts\ProfessorServiceContract;
use \DB;
use \Lang;
use \Input;

class ProfessorController extends Controller
{
    protected $service;

    public function __construct(ProfessorServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar(SearchProfessoresRequest $request)
	{
	    $params = $request->all();
        $professores = $this->service->listAll($params);

		return $this->jsonResponse($professores);
	}
	
	public function mostrar($matricula)
	{
	    $professor = $this->service->show($matricula);
        return $this->jsonResponse($professor, ['cursoOrigem']);
	}

	public function editar(UpdateProfessorRequest $request, $matricula)
	{
        $professor = $this->service->edit($request->all(), $matricula);
        
        return $this->jsonResponse([
            'message'   => Lang::get('professores.saved'),
            'professor' => $professor
        ], ['cursoOrigem']);
	}
	
	public function salvar(SalvarProfessorRequest $request)
    {
        $professor = $this->service->save($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('professores.saved'),
            'professor' => $professor
        ], ['cursoOrigem']);
	}
    
    public function deletar($matricula)
	{
        $this->service->delete($matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('professores.remove_success')
        ]);
	}
}
