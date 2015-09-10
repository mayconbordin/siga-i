<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterUserRequest;
use App\Repositories\Contracts\RoleRepositoryContract;
use App\Services\Contracts\UsuarioServiceContract;

use \DB;
use \Lang;
use \Input;
use \Response;

class AuthController extends Controller
{
    protected $service;
    protected $roleRepository;

    public function __construct(UsuarioServiceContract $service, RoleRepositoryContract $roleRepository)
    {
        $this->service = $service;
        $this->roleRepository = $roleRepository;
    }

    public function register(RegisterUserRequest $request)
    {
        $visitorRole = $this->roleRepository->findByField('name', 'visitante');

        $data = $request->all();
        $data['matricula'] = substr(str_shuffle(MD5(microtime())), 0, 30);
        $data['roles'] = [$visitorRole->id];

        $user = $this->service->save($data);

        return $this->jsonResponse([
            'message' => Lang::get('usuarios.save_success'),
            'usuario' => $user
        ], ['roles']);
    }
}
