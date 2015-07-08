<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAmbienteRequest;
use App\Http\Requests\SearchAmbientesRequest;
use App\Services\Contracts\AmbienteServiceContract;

use \Lang;

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

    public function mostrar($id)
    {
        $ambiente = $this->service->show($id);
        return $this->jsonResponse($ambiente);
    }

    public function editar(SalvarAmbienteRequest $request, $id)
    {
        $ambiente = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'   => Lang::get('ambientes.saved'),
            'ambiente' => $ambiente
        ], ['tipo']);
    }

    public function salvar(SalvarAmbienteRequest $request)
    {
        $ambiente = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'   => Lang::get('ambientes.saved'),
            'ambiente' => $ambiente
        ], ['tipo']);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('ambientes.remove_success')
        ]);
    }
}