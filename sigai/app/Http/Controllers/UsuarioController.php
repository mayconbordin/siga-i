<?php namespace App\Http\Controllers;

use App\Repositories\UsuarioRepository;
use App\Http\Requests\SalvarUsuarioRequest;

use \Auth;
use \Hash;
use \Lang;

use Carbon\Carbon;

class UsuarioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->usuario = Auth::user();
	}

	public function index()
	{
		return view('usuario.index', [
		    'usuario' => $this->usuario
		]);
	}

    public function salvar(SalvarUsuarioRequest $request)
	{
	    try {
	        UsuarioRepository::updateById($request->all(), $this->usuario->id);
	        return redirect()->action('UsuarioController@index')
	                         ->with('success', Lang::get('usuarios.save_success'));
        } catch (ServerError $e) {
            return redirect('conta')->with('error', $e->getMessage());
        }
	}
}
