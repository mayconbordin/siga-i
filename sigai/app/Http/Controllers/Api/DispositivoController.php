<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarDispositivoRequest;
use App\Http\Requests\SearchDispositivosRequest;
use App\Http\Requests\UpdateDispositivoRequest;
use App\Services\Contracts\DispositivoServiceContract;

use \Lang;

class DispositivoController extends Controller
{
    protected $service;

    public function __construct(DispositivoServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

    public function listar(SearchDispositivosRequest $request)
    {
        $params = $request->all();
        $clients = $this->service->listAll($params);

        return $this->jsonResponse($clients, ['tipo']);
    }

    public function mostrar($id)
    {
        $client = $this->service->show($id);
        return $this->jsonResponse($client, ['tipo', 'usuario']);
    }

    public function editar(UpdateDispositivoRequest $request, $id)
    {
        $client = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'     => Lang::get('dispositivos_usuario.saved'),
            'dispositivo' => $client
        ], ['tipo', 'usuario']);
    }

    public function salvar(SalvarDispositivoRequest $request)
    {
        $client = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'     => Lang::get('dispositivos_usuario.saved'),
            'dispositivo' => $client
        ], ['tipo', 'usuario']);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('dispositivos_usuario.remove_success')
        ]);
    }
}