<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\GetUsuarioRequest;
use App\Services\Contracts\UsuarioServiceContract;

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
}
