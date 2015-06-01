<?php namespace App\Http\Controllers;

use App\Repositories\CursoRepository;

use \Validator;
use \Input;

class CursoController extends Controller {

    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function listar()
	{
	    $cursos = CursoRepository::paginate();
	
		return view('cursos.index', [
		    'cursos' => $cursos
		]);
	}
	
	
}
