<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class DiarioEnvio extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\DiarioEnvioTransformer';
    protected $table = 'diarios_envios';
	
    public function diario()
    {
        return $this->belongsTo('App\Models\StatusDiario', 'diario_id');
    }
    
    public function professor()
    {
        return $this->belongsTo('App\Models\Professor', 'professor_id');
    }
}
