<?php namespace App\Http\Controllers;

use App\Services\Contracts\DispositivoServiceContract;
use App\Services\Contracts\TipoDispositivoServiceContract;
use \Validator;
use \Input;

class DispositivoController extends Controller
{
    protected $service;
    protected $tipoDispositivoService;

    public function __construct(DispositivoServiceContract $service, TipoDispositivoServiceContract $tipoDispositivoService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service                = $service;
        $this->tipoDispositivoService = $tipoDispositivoService;
    }

	public function listar()
	{
	    $dispositivos     = $this->service->paginate();
        $tiposDispositivo = $this->tipoDispositivoService->listAll();

		return view('dispositivos_usuario.index', [
		    'dispositivos'     => $dispositivos,
            'tiposDispositivo' => $tiposDispositivo
		]);
	}
}
