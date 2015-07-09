<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class TipoDispositivo extends Model {
    use TransformableTrait;

    protected $transformer = 'App\Transformers\TipoDispositivoTransformer';
    protected $table = 'tipos_dispositivos';
    protected $fillable = ['nome'];

    public function dispositivos()
    {
        return $this->hasMany('App\Models\DispositivoAluno', 'tipo_dispositivo_id');
    }

    public function oauthClients()
    {
        return $this->hasMany('App\Models\OAuthClient', 'tipo_dispositivo_id');
    }
}