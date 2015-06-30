<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class TipoAmbiente extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\TipoAmbienteTransformer';
	protected $table = 'tipos_ambiente';
	protected $fillable = ['nome'];

	public function ambientes()
    {
        return $this->hasMany('App\Models\Ambiente', 'tipo_ambiente_id');
    }
    
}
