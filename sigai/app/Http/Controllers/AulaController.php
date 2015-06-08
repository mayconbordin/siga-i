<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarAulaRequest;

use App\Repositories\AulaRepository;
use App\Repositories\AlunoRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \Lang;

class AulaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function listar()
	{

	}
	
	public function mostrar($ucId, $turmaId, $data)
	{
        try {
            $aula   = AulaRepository::findByDataWithAll($data, $turmaId, $ucId);
            $alunos = AlunoRepository::findByAulaWithChamada($turmaId, $aula->id);

            return view('aulas.criar_mostrar', [
		        'aula'     => $aula,
		        'chamadas' => $alunos
		    ]);
        } catch (NotFoundError $e) {
            return redirect()->action('TurmaController@mostrar', [$turmaId])
                             ->with('error', $e->getMessage());
        } catch (ValidationError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getErrorsJoined('<br>'));
        }
	}
	
	public function editar(SalvarAulaRequest $request, $ucId, $turmaId, $data)
	{
        try {
            $aula = AulaRepository::update($request->all(), $ucId, $turmaId, $data);
            
            return redirect()->action('AulaController@mostrar', [$ucId, $turmaId, $data])
	                         ->with('success', Lang::get('turmas.saved'));
        } catch (NotFoundError $e) {
            return redirect()->action('TurmaController@mostrar', [$turmaId])
                             ->with('error', $e->getMessage());
        } catch (ValidationError $e) {
            return redirect()->action('AulaController@mostrar', [$ucId, $turmaId, $data])
                             ->withErrors($e->getErrors());
        } catch (ServerError $e) {
             return redirect()->action('AulaController@mostrar', [$ucId, $turmaId, $data])
	                          ->with('error', $e->getMessage());
        }
	}
	
}
