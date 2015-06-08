<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Requests\SalvarProfessorRequest;

use App\Repositories\ProfessorRepository;

use \DB;
use \Lang;
use \Input;

class ProfessorController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function listar()
	{
	    $q       = e(Input::get('query'));
	    $turmaId = e(Input::get('turmaId'));
	    
        $professores = ProfessorRepository::searchByNameAndMatricula($q, $turmaId);
        
		return $this->jsonResponse($professores);
	}
	
	public function mostrar($matricula)
	{
	    $professor = ProfessorRepository::findByMatricula($matricula);

        return $this->jsonResponse($professor, ['cursoOrigem']);
	}

	public function editar(UpdateProfessorRequest $request, $matricula)
	{
        $professor = ProfessorRepository::updateByMatricula($request->all(), $matricula);
        
        return $this->jsonResponse([
            'message'   => Lang::get('professores.saved'),
            'professor' => $professor
        ], ['cursoOrigem']);
	}
	
	public function salvar(SalvarProfessorRequest $request)
    {
        $professor = ProfessorRepository::insert($request->all());
        
        return $this->jsonResponse([
            'message'   => Lang::get('professores.saved'),
            'professor' => $professor
        ], ['cursoOrigem']);
	}
    
    public function deletar($matricula)
	{
	    ProfessorRepository::deleteByMatricula($matricula);

	    return $this->jsonResponse([
	        'message' => Lang::get('professores.remove_success')
        ]);
	}
}
