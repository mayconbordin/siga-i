<?php namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Repositories\AlunoRepository;

use App\Http\Requests\SalvarAlunoRequest;

use \Validator;
use \Input;

class AlunoController extends Controller {

    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function listar()
	{
	    $alunos = AlunoRepository::paginate();
	
		return view('alunos.index', [
		    'alunos' => $alunos
		]);
	}
	
}
