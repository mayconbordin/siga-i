<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class Dispositivo extends Model {
    use TransformableTrait;

    protected $transformer = 'App\Transformers\DispositivoTransformer';
	protected $table = 'dispositivos';
	protected $fillable = ['codigo', 'usuario_id', 'tipo_dispositivo_id'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'usuario_id');
    }
    
    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoDispositivo', 'tipo_dispositivo_id');
    }
}
