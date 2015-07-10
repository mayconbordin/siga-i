<?php namespace App\Http\Controllers;

use App\Services\Contracts\OAuthClientServiceContract;
use App\Services\Contracts\OAuthScopeServiceContract;
use App\Services\Contracts\TipoDispositivoServiceContract;
use \Validator;
use \Input;

class OAuthClientController extends Controller
{
    protected $service;
    protected $tipoDispositivoService;
    protected $scopeService;

    public function __construct(OAuthClientServiceContract $service, TipoDispositivoServiceContract $tipoDispositivoService,
                                OAuthScopeServiceContract $scopeService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service                = $service;
        $this->tipoDispositivoService = $tipoDispositivoService;
        $this->scopeService           = $scopeService;
    }

	public function listar()
	{
	    $dispositivos     = $this->service->paginate();
        $tiposDispositivo = $this->tipoDispositivoService->listAll();
        $escopos          = $this->scopeService->listAll();

		return view('dispositivos.index', [
		    'dispositivos'     => $dispositivos,
            'tiposDispositivo' => $tiposDispositivo,
            'escopos'          => $escopos
		]);
	}
}
