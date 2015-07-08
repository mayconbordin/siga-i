<?php namespace App\Http\Controllers;

use App\Services\Contracts\AmbienteServiceContract;
use App\Services\Contracts\TipoAmbienteServiceContract;
use \Validator;
use \Input;

class AmbienteController extends Controller
{
    protected $service;
    protected $tipoAmbienteService;

    public function __construct(AmbienteServiceContract $service, TipoAmbienteServiceContract $tipoAmbienteService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service             = $service;
        $this->tipoAmbienteService = $tipoAmbienteService;
    }

	public function listar()
	{
	    $ambientes     = $this->service->paginate();
        $tiposAmbiente = $this->tipoAmbienteService->listAll();
	
		return view('ambientes.index', [
		    'ambientes'     => $ambientes,
            'tiposAmbiente' => $tiposAmbiente
		]);
	}
}
