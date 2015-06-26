<?php namespace App\Http\Controllers;

use App\Services\Contracts\CursoServiceContract;
use \Validator;
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

	public function listar()
	{
	    $cursos = $this->service->paginate();
	
		return view('cursos.index', [
		    'cursos' => $cursos
		]);
	}
}
