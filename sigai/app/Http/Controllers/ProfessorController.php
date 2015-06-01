<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarProfessorRequest;

use App\Repositories\ProfessorRepository;
use App\Repositories\CursoRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \Lang;

class ProfessorController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function listar()
	{
        $professores = ProfessorRepository::paginate();
        $cursos = CursoRepository::listAll();
        
        return view('professores.index', [
            'professores' => $professores,
            'cursos' => $cursos
        ]);
	}
}
