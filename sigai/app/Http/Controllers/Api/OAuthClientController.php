<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarOAuthClientRequest;
use App\Http\Requests\SearchOAuthClientsRequest;
use App\Http\Requests\UpdateOAuthClientAmbienteRequest;
use App\Http\Requests\UpdateOAuthClientRequest;
use App\Services\Contracts\OAuthClientServiceContract;

use \Lang;

class OAuthClientController extends Controller
{
    protected $service;

    public function __construct(OAuthClientServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

    public function listar(SearchOAuthClientsRequest $request)
    {
        $params = $request->all();
        $clients = $this->service->listAll($params);

        return $this->jsonResponse($clients, ['tipo']);
    }

    public function mostrar($id)
    {
        $client = $this->service->show($id);
        return $this->jsonResponse($client, ['tipo', 'ambientes', 'scopes']);
    }

    public function editar(UpdateOAuthClientRequest $request, $id)
    {
        $client = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'     => Lang::get('dispositivos.saved'),
            'dispositivo' => $client
        ], ['tipo', 'ambientes']);
    }

    public function editarAmbiente(UpdateOAuthClientAmbienteRequest $request, $id)
    {
        $client = $this->service->editAmbiente($request->all(), $id);

        return $this->jsonResponse([
            'message'     => Lang::get('dispositivos.saved'),
            'dispositivo' => $client
        ]);
    }

    public function salvar(SalvarOAuthClientRequest $request)
    {
        $client = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'     => Lang::get('dispositivos.saved'),
            'dispositivo' => $client
        ], ['tipo', 'ambientes']);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('dispositivos.remove_success')
        ]);
    }
}