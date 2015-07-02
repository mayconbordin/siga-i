<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\GetAgendaRequest;
use App\Services\Contracts\AgendaServiceContract;

use \DB;
use \Lang;
use \Input;

class AgendaController extends Controller
{
    protected $service;

    public function __construct(AgendaServiceContract $service)
    {
        $this->service = $service;
    }

	public function mostrar(GetAgendaRequest $request)
	{
        $agenda = $this->service->getAgenda($request->all());

        return $this->jsonResponse($agenda);
	}
}
