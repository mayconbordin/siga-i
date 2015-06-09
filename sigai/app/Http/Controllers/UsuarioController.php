<?php namespace App\Http\Controllers;

use App\Repositories\UsuarioRepository;
use App\Http\Requests\SalvarUsuarioRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

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
	    if (!Hash::check($request->get('password'), $this->usuario->password)) {
            return redirect('conta')->withErrors([
                'password' => [Lang::get('usuarios.invalid_password')]
            ]);
        }
	    
	    try {
	        $data = $request->all();
	        $data['password'] = $request->get('new_password');
	        
	        UsuarioRepository::updateById($data, $this->usuario->id);
	        
	        return redirect()->action('UsuarioController@index')
	                         ->with('success', Lang::get('usuarios.save_success'));
        } catch (ServerError $e) {
            return redirect('conta')->with('error', $e->getMessage());
        } catch (NotFoundError $e) {
            return redirect('conta')->with('error', $e->getMessage());
        }
	}
}
