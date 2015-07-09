<?php namespace App\Http\Controllers;

use App\Services\Contracts\OAuthClientServiceContract;
use \Validator;
use \Input;

class OAuthClientController extends Controller
{
    protected $service;

    public function __construct(OAuthClientServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar()
	{
	    $dispositivos = $this->service->paginate();

		return view('dispositivos.index', [
		    'dispositivos' => $dispositivos
		]);
	}
}
