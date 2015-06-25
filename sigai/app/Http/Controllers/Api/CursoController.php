<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarCursoRequest;
use App\Http\Requests\SearchCursosRequest;
use App\Http\Requests\UpdateCursoRequest;

use App\Services\Contracts\CursoServiceContract;
use \DB;
use \Lang;
use \Input;

class CursoController extends Controller
{
    protected $service;

    public function __construct(CursoServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar(SearchCursosRequest $request)
	{
        $params = $request->all();
        $cursos = $this->service->listAll($params);

		return $this->jsonResponse($cursos);
	}
	
	public function mostrar($id)
	{
	    $curso = $this->service->show($id);
	    return $this->jsonResponse($curso);
	}

	public function editar(UpdateCursoRequest $request, $id)
	{
        $curso = $this->service->edit($request->all(), $id);
        
        return $this->jsonResponse([
            'message'   => Lang::get('cursos.saved'),
            'curso' => $curso
        ]);
	}
	
	public function salvar(SalvarCursoRequest $request)
    {
        $curso = $this->service->save($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('cursos.saved'),
            'curso' => $curso
        ]);
	}
    
    public function deletar($id)
	{
        $this->service->delete($id);

	    return $this->jsonResponse([
	        'message' => Lang::get('cursos.remove_success')
        ]);
	}

}
