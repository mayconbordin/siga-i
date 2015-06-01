<?php namespace App\Repositories;

use App\Models\User;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Hash;

class UsuarioRepository extends Repository {
    public static function findById($id) {
        $usuario = User::where('id', $id)->first();
                      
        if ($usuario == null) {
	        throw new NotFoundError(Lang::get('usuarios.not_found'));
	    }
	    
        return $usuario;
    }

    public static function findByMatricula($matricula) {
        $usuario = User::where('matricula', $matricula)->first();
                      
        if ($usuario == null) {
	        throw new NotFoundError(Lang::get('usuarios.not_found'));
	    }
	    
        return $usuario;
    }
    
    public static function findByNome($nome) {
        $usuario = User::where('nome', $nome)->first();
                      
        if ($usuario == null) {
	        throw new NotFoundError(Lang::get('usuarios.not_found'));
	    }
	    
        return $usuario;
    }
}
