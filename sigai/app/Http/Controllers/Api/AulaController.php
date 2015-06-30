<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAulaRequest;

use App\Http\Requests\SalvarChamadaRequest;
use App\Http\Requests\SearchAulasRequest;
use App\Http\Requests\UpdateAulaRequest;
use App\Repositories\TurmaRepository;
use App\Repositories\AulaRepository;
use App\Repositories\ChamadaRepository;

use App\Services\Contracts\AulaServiceContract;
use \DB;
use \Lang;
use \Input;

use Carbon\Carbon;

class AulaController extends Controller
{
    protected $service;

    public function __construct(AulaServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }
    
    public function listar(SearchAulasRequest $request, $ucId, $turmaId)
    {
        $aulas = $this->service->listAll($ucId, $turmaId, $request->all());
        return $this->jsonResponse($aulas, ['full_calendar']);
    }
    
    public function mostrar($ucId, $turmaId, $data)
	{
	    $aula = $this->service->show($ucId, $turmaId, $data);
	    return $this->jsonResponse($aula, ['turma']);
	}

	public function editar(SalvarAulaRequest $request, $ucId, $turmaId, $data)
	{
        $aula = $this->service->edit($request->all(), $ucId, $turmaId, $data);

        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
	}
	
	public function salvar(SalvarAulaRequest $request, $ucId, $turmaId)
    {
        $aula = $this->service->save($request->all(), $ucId, $turmaId);

        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
	}
    
    public function deletar($ucId, $turmaId, $data)
	{
        $this->service->delete($ucId, $turmaId, $data);

	    return $this->jsonResponse(['message' => 
	        Lang::get('aulas.remove_success')]);
	}
	
	
	public function mudarData(UpdateAulaRequest $request, $ucId, $turmaId, $id)
    {
        $aula = $this->service->changeDate($request->all(), $ucId, $turmaId, $id);

        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
    }
    
    public function salvarChamada($ucId, $turmaId, $data)
    {
        $this->service->saveChamada(Input::get('chamada'), $ucId, $turmaId, $data);

        return $this->jsonResponse([
            'message' => Lang::get('chamadas.saved')
        ]);
    }
    
}
