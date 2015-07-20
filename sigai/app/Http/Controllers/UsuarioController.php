<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarUsuarioRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Http\Requests\SearchUsuariosRequest;
use App\Services\Contracts\RoleServiceContract;
use App\Services\Contracts\UsuarioServiceContract;
use \Auth;
use \Hash;
use \Lang;

use Carbon\Carbon;

class UsuarioController extends Controller
{
    protected $service;
    protected $roleService;

	public function __construct(UsuarioServiceContract $service, RoleServiceContract $roleService)
	{
		$this->middleware('auth');
        $this->service = $service;
        $this->roleService = $roleService;
		$this->usuario = Auth::user();
	}

	public function index()
	{
        return view('usuario.index', [
		    'usuario' => $this->usuario
		]);
	}

    public function listar(SearchUsuariosRequest $request)
    {
        $usuarios = $this->service->listAll($request->all());

        return view('usuario.list', [
            'usuarios' => $usuarios,
            'roles' => $this->roleService->listAll()
        ]);
    }

    public function salvar(SalvarUsuarioRequest $request)
	{
	    if (!$this->service->isPasswordValid($this->usuario, $request->get('password'))) {
            return redirect('conta')->withErrors([
                'password' => [Lang::get('usuarios.invalid_password')]
            ]);
        }
	    
	    try {
            $this->service->edit($request->all(), $this->usuario->id);
	        
	        return redirect()->action('UsuarioController@index')
	                         ->with('success', Lang::get('usuarios.save_success'));
        } catch (ServerError $e) {
            return redirect('conta')->with('error', $e->getMessage());
        } catch (NotFoundError $e) {
            return redirect('conta')->with('error', $e->getMessage());
        }
	}
}
