<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

use Carbon\Carbon;

class Aula extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\AulaTransformer';
	protected $table = 'aulas';
	protected $fillable = ['data', 'status', 'conteudo', 'horario_inicio', 'horario_fim'];
	
	public function getDataAttribute($value)
    {
        if ($value instanceof Carbon)
            return $value;
        else
            return Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getHorarioInicioAttribute($value)
    {
        if ($value instanceof Carbon)
            return $value;
        else
            return Carbon::createFromFormat('H:i:s', $value);
    }

    public function getHorarioFimAttribute($value)
    {
        if ($value instanceof Carbon)
            return $value;
        else
            return Carbon::createFromFormat('H:i:s', $value);
    }
	
	public function turma()
    {
        return $this->belongsTo('App\Models\Turma', 'turma_id');
    }

    public function chamadas()
    {
        return $this->hasMany('App\Models\Chamada', 'aula_id');
    }

    public function ambiente()
    {
        return $this->belongsTo('App\Models\Ambiente', 'ambiente_id');
    }
}
