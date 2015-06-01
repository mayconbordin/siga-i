<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAulaRequest;

use App\Repositories\TurmaRepository;
use App\Repositories\AulaRepository;
use App\Repositories\ChamadaRepository;

use \DB;
use \Lang;
use \Input;

use Carbon\Carbon;

class AulaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }
    
    public function listar($ucId, $turmaId)
    {
        $turma = TurmaRepository::findById($turmaId, $ucId);

        $start = e(Input::get('start'));
        $end   = e(Input::get('end'));
        
        $aulas = AulaRepository::findByTurmaBetweenDates($turma->id, $start, $end);
        
        return $this->jsonResponse($aulas, ['full_calendar']);
    }
    
    public function mostrar($ucId, $turmaId, $data)
	{
	    $aula = AulaRepository::findByData($data, $turmaId, $ucId);
	    
	    return $this->jsonResponse($aula, ['turma']);
	}

	public function editar(SalvarAulaRequest $request, $ucId, $turmaId, $data)
	{
        $aula = AulaRepository::update($request->all(), $ucId, $turmaId, $data);
        
        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
	}
	
	public function salvar(SalvarAulaRequest $request, $ucId, $turmaId)
    {
        $aula = AulaRepository::insert($request->all(), $ucId, $turmaId);
        
        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
	}
    
    public function deletar($ucId, $turmaId, $data)
	{
	    AulaRepository::deleteByData($data, $turmaId, $ucId);

	    return $this->jsonResponse(['message' => 
	        Lang::get('aulas.remove_success')]);
	}
	
	
	public function mudarData(SalvarAulaRequest $request, $ucId, $turmaId, $id)
    {
        $aula = AulaRepository::updateData($ucId, $turmaId, $id, $request->data);

        return $this->jsonResponse([
            'message' => Lang::get('aulas.saved'),
            'aula'    => $aula
        ]);
    }
    
    public function salvarChamada($ucId, $turmaId, $data)
    {
        $chamadas = Input::get('chamada');
        
        ChamadaRepository::insertOrUpdateAll($chamadas, $ucId, $turmaId, $data);
        
        return $this->jsonResponse([
            'message' => Lang::get('chamadas.saved')
        ]);
    }
    
}
