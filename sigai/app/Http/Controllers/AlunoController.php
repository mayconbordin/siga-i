<?php namespace App\Http\Controllers;

use App\Services\Contracts\AlunoServiceContract;
use \Validator;
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

	public function listar()
	{
	    $alunos = $this->service->paginate();
	
		return view('alunos.index', [
		    'alunos' => $alunos
		]);
	}
	
}
