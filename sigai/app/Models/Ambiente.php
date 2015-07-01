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

    public function turmas()
    {
        return $this->hasMany('App\Models\Turma', 'ambiente_default_id');
    }

    public function aulas()
    {
        return $this->hasMany('App\Models\Aula', 'ambiente_id');
    }

    public function dispositivos()
    {
        return $this->belongsToMany('App\Models\OAuthClient', 'dispositivos_ambiente', 'ambiente_id', 'oauth_client_id');
    }
}
