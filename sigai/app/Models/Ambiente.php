<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class Ambiente extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\AmbienteTransformer';
	protected $table = 'ambientes';
	protected $fillable = ['nome'];

	public function tipo()
    {
        return $this->belongsTo('App\Models\TipoAmbiente', 'tipo_ambiente_id');
    }
    
}