<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\GetUsuarioRequest;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\SearchUsuariosRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Contracts\UsuarioServiceContract;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

use \DB;
use \Lang;
use \Input;

class UsuarioController extends Controller
{
    protected $service;

    public function __construct(UsuarioServiceContract $service)
    {
        $this->service = $service;
    }

	public function autenticar(GetUsuarioRequest $request, $matricula)
	{
        $password = $request->get('password');
        $user = $this->service->getByMatriculaAndAuthenticate($matricula, $password);

        if ($user != null) {
            return $this->jsonResponse($user, ['roles']);
        } else {
            return response()->json(['errors' => ['Unauthorized']], 401);
        }
	}

    public function listar(SearchUsuariosRequest $request)
    {
        $roles = $this->service->all($request->all());
        return $this->jsonResponse($roles);
    }

    public function mostrarOAuthUser()
    {
        $id   = Authorizer::getResourceOwnerId();
        $user = $this->service->show($id);
        return $this->jsonResponse($user, ['roles']);
    }

    public function mostrar($id)
    {
        $role = $this->service->show($id);
        return $this->jsonResponse($role, ['roles']);
    }

    public function editar(UpdateUserRequest $request, $id)
    {
        $role = $this->service->edit($request->all(), $id);

        return $this->jsonResponse([
            'message'     => Lang::get('tipos_usuario.saved'),
            'usuario' => $role
        ], ['roles']);
    }

    public function salvar(SaveUserRequest $request)
    {
        $role = $this->service->save($request->all());

        return $this->jsonResponse([
            'message'     => Lang::get('tipos_usuario.saved'),
            'usuario' => $role
        ], ['roles']);
    }

    public function deletar($id)
    {
        $this->service->delete($id);

        return $this->jsonResponse([
            'message' => Lang::get('tipos_usuario.remove_success')
        ]);
    }
}
