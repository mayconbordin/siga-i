<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarUnidadeCurricularRequest;

use App\Repositories\UnidadeCurricularRepository;

use \Lang;

class UnidadeCurricularController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function listar()
	{
        $ucs = UnidadeCurricularRepository::listAll();
		return $this->jsonResponse($ucs);
	}
	
	public function mostrar($id)
	{
	    $uc = UnidadeCurricularRepository::findById($id);
	    return $this->jsonResponse($uc);
	}
	
	public function deletar($id)
	{
	    UnidadeCurricularRepository::deleteById($id);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.remove_success')]);
	}
	
	public function mostrarTurmas($id)
	{
	    $uc = UnidadeCurricularRepository::findByIdWith($id, ['turmas']);
	    return $this->jsonResponse($uc->turmas);
	}
	
	public function mostrarCursos($id)
	{
	    $uc = UnidadeCurricularRepository::findByIdWith($id, ['cursos']);
	    return $this->jsonResponse($uc->cursos);
	}
	
	public function vincularCurso($id, $cursoId)
	{
	    $curso = UnidadeCurricularRepository::attachCurso($id, $cursoId);

	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.curso_attached'),
	        'curso'   => $curso
        ]);
	}
	
	public function desvincularCurso($id, $cursoId)
	{
	     UnidadeCurricularRepository::detachCurso($id, $cursoId);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.curso_detached')
        ]);
	}
}
