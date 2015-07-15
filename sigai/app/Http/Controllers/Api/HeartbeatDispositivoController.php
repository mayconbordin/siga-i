<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchHeartbeatsDispositivoRequest;

use App\Services\Contracts\HeartbeatDispositivoServiceContract;
use \DB;
use \Lang;
use \Input;

class HeartbeatDispositivoController extends Controller
{
    protected $service;

    public function __construct(HeartbeatDispositivoServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar($dispositivoId)
	{
        $heartbeats = $this->service->listByDevice($dispositivoId);
		return $this->jsonResponse($heartbeats);
	}
}
