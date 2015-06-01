<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarCursoRequest;
use App\Http\Requests\UpdateCursoRequest;

use App\Models\Curso;
use App\Repositories\CursoRepository;

use \DB;
use \Lang;
use \Input;

class CursoController extends Controller {

    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function listar()
	{
	    $q = e(Input::get('query'));
	    
        $cursos = CursoRepository::searchByName($q);
	
		return $this->jsonResponse($cursos);
	}
	
	public function mostrar($id)
	{
	    $curso = CursoRepository::findById($id);
	    return $this->jsonResponse($curso);
	}

	public function editar(UpdateCursoRequest $request, $id)
	{
        $curso = CursoRepository::update($request->all(), $id);
        
        return $this->jsonResponse([
            'message'   => Lang::get('cursos.saved'),
            'curso' => $curso
        ]);
	}
	
	public function salvar(SalvarCursoRequest $request)
    {
        $curso = CursoRepository::insert($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('cursos.saved'),
            'curso' => $curso
        ]);
	}
    
    public function deletar($id)
	{
	    CursoRepository::deleteById($id);

	    return $this->jsonResponse([
	        'message' => Lang::get('cursos.remove_success')
        ]);
	}

}
