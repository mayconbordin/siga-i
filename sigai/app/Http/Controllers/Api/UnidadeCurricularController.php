<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Services\Contracts\UnidadeCurricularServiceContract;
use \Lang;

class UnidadeCurricularController extends Controller
{
    protected $ucService;

    public function __construct(UnidadeCurricularServiceContract $ucService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->ucService = $ucService;
    }

	public function listar()
	{
        $ucs = $this->ucService->listAll();
		return $this->jsonResponse($ucs);
	}
	
	public function mostrar($id)
	{
	    $uc = $this->ucService->show($id);
	    return $this->jsonResponse($uc);
	}
	
	public function deletar($id)
	{
        $this->ucService->delete($id);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.remove_success')]);
	}
	
	public function mostrarTurmas($id)
	{
        $turmas = $this->ucService->listAllTurmas($id);
	    return $this->jsonResponse($turmas);
	}
	
	public function mostrarCursos($id)
	{
        $cursos = $this->ucService->listAllCursos($id);
	    return $this->jsonResponse($cursos);
	}
	
	public function vincularCurso($id, $cursoId)
	{
	    $curso = $this->ucService->attachCurso($id, $cursoId);

	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.curso_attached'),
	        'curso'   => $curso
        ]);
	}
	
	public function desvincularCurso($id, $cursoId)
	{
        $this->ucService->detachCurso($id, $cursoId);
	    
	    return $this->jsonResponse([
	        'message' => Lang::get('unidades_curriculares.curso_detached')
        ]);
	}
}
