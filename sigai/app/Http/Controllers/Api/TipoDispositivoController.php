<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarTipoDispositivoRequest;
use App\Http\Requests\SearchTiposDispositivoRequest;
use App\Services\Contracts\TipoDispositivoServiceContract;

use \Lang;

class TipoDispositivoController extends Controller
{
    protected $service;

    public function __construct(TipoDispositivoServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

    public function listar(SearchTiposDispositivoRequest $request)
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

    public function editar(SalvarTipoDispositivoRequest $request, $id)
    {
        $tipo = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'   => Lang::get('tipos_dispositivo.saved'),
            'tipo' => $tipo
        ]);
    }

    public function salvar(SalvarTipoDispositivoRequest $request)
    {
        $tipo = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'   => Lang::get('tipos_dispositivo.saved'),
            'tipo' => $tipo
        ]);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('tipos_dispositivo.remove_success')
        ]);
    }
}