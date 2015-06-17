<?php namespace App\Repositories\Eloquent;

use App\Models\User;

use App\Repositories\Contracts\UsuarioRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Hash;

class UsuarioRepository extends BaseRepository implements UsuarioRepositoryContract
{
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
    
    public static function isPasswordValid($id, $password)
    {
        $usuario = self::findById($id);
        return Hash::check($password, $usuario->password);
    }
    
    public static function updateById(array $data, $id)
    {
        $usuario = self::findById($id);

        if (isset($data['matricula']))
            $usuario->matricula = $data['matricula'];
        if (isset($data['nome']))
            $usuario->nome = $data['nome'];
        if (isset($data['email']))
            $usuario->email = $data['email'];
        
        if (isset($data['password']) && strlen($data['password']) > 0) {
            $usuario->password = Hash::make($data['password']);
        }

        if (!$usuario->save()) {
            throw new ServerError(Lang::get('usuarios.save_error'));
        }
        
        return $usuario;
    }
}
