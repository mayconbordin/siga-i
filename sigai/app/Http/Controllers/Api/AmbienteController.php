<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAmbientesRequest;
use App\Services\Contracts\AmbienteServiceContract;

class AmbienteController extends Controller
{
    protected $service;

    public function __construct(AmbienteServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

    public function listar(SearchAmbientesRequest $request)
    {
        $params = $request->all();
        $ambientes = $this->service->listAll($params);

        return $this->jsonResponse($ambientes, ['tipo']);
    }
}