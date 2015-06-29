<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarAulaRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use App\Services\Contracts\AulaServiceContract;
use \Lang;

class AulaController extends Controller
{
    protected $service;

    public function __construct(AulaServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar()
	{

	}
	
	public function mostrar($ucId, $turmaId, $data)
	{
        try {
            $data = $this->service->showFull($ucId, $turmaId, $data);

            return view('aulas.criar_mostrar', [
		        'aula'     => $data['aula'],
		        'chamadas' => $data['alunos']
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
            $aula = $this->service->edit($request->all(), $ucId, $turmaId, $data);
            
            return redirect()->action('AulaController@mostrar', [$ucId, $turmaId, $aula->data->format('Y-m-d')])
	                         ->with('success', Lang::get('aulas.saved'));
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
