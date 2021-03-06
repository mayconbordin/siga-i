<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Transformers\Base\TransformableTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait, TransformableTrait;
	
	protected $transformer = 'App\Transformers\UsuarioTransformer';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['matricula', 'nome', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public static $rules = [
        'matricula' => 'required|max:255',
        'nome'      => 'required|max:255',
    ];

    public static $rules_update = [
        'matricula' => 'max:255',
        'nome'      => 'max:255',
    ];


    public function cursos()
    {
        return $this->hasMany('App\Models\Curso', 'coordenador_id');
    }

    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'usuario_id');
    }
}
