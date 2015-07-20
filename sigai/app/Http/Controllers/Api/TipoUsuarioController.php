<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarRoleRequest;
use App\Http\Requests\SalvarTipoUsuarioRequest;
use App\Http\Requests\SearchTipoUsuariosRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateTipoUsuarioAmbienteRequest;
use App\Http\Requests\UpdateTipoUsuarioRequest;
use App\Services\Contracts\RoleServiceContract;

use \Lang;

class TipoUsuarioController extends Controller
{
    protected $service;

    public function __construct(RoleServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

    public function listar()
    {
        $roles = $this->service->listAll();
        return $this->jsonResponse($roles);
    }

    public function mostrar($id)
    {
        $role = $this->service->show($id);
        return $this->jsonResponse($role, ['permissions']);
    }

    public function editar(UpdateRoleRequest $request, $id)
    {
        $role = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'     => Lang::get('tipos_usuario.saved'),
            'tipo_usuario' => $role
        ], ['permissions']);
    }

    public function salvar(SalvarRoleRequest $request)
    {
        $role = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'     => Lang::get('tipos_usuario.saved'),
            'tipo_usuario' => $role
        ], ['permissions']);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('tipos_usuario.remove_success')
        ]);
    }
}