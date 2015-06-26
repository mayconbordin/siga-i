<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarProfessorRequest;

use App\Repositories\ProfessorRepository;
use App\Repositories\CursoRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use App\Services\Contracts\CursoServiceContract;
use App\Services\Contracts\ProfessorServiceContract;
use \Lang;

class ProfessorController extends Controller
{
    protected $service;
    protected $cursoService;

    public function __construct(ProfessorServiceContract $service, CursoServiceContract $cursoService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service      = $service;
        $this->cursoService = $cursoService;
    }

	public function listar()
	{
        $professores = $this->service->paginate();
        $cursos      = $this->cursoService->listAll();
        
        return view('professores.index', [
            'professores' => $professores,
            'cursos'      => $cursos
        ]);
	}
}
