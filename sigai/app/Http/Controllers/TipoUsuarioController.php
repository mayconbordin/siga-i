<?php namespace App\Http\Controllers;

use App\Services\Contracts\RoleServiceContract;
use \Validator;
use \Input;

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
	    $roles = $this->service->paginate();
        $permissions = $this->service->listAllPermissions();

		return view('tipos_usuario.index', [
		    'tipos' => $roles,
            'permissions' => $permissions
		]);
	}
}
