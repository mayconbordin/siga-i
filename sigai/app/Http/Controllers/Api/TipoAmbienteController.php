<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarTipoAmbienteRequest;
use App\Http\Requests\SearchTiposAmbienteRequest;
use App\Services\Contracts\TipoAmbienteServiceContract;

use \Lang;

class TipoAmbienteController extends Controller
{
    protected $service;

    public function __construct(TipoAmbienteServiceContract $service)
    {
        $this->middleware('auth');
        //$this->middleware('permissions');

        $this->service = $service;
    }

    public function listar(SearchTiposAmbienteRequest $request)
    {
        $params    = $request->all();
        $tipos = $this->service->listAll($params);

        return $this->jsonResponse($tipos, ['tipo']);
    }

    public function mostrar($id)
    {
        $tipo = $this->service->show($id);
        return $this->jsonResponse($tipo);
    }

    public function editar(SalvarTipoAmbienteRequest $request, $id)
    {
        $tipo = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'   => Lang::get('tipos_ambiente.saved'),
            'tipo' => $tipo
        ]);
    }

    public function salvar(SalvarTipoAmbienteRequest $request)
    {
        $tipo = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'   => Lang::get('tipos_ambiente.saved'),
            'tipo' => $tipo
        ]);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('tipos_ambiente.remove_success')
        ]);
    }
}