<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class StatusDiario extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\DiarioTransformer';
    protected $table = 'status_diarios';
    protected $fillable = ['status', 'mes'];
	
    public function turma()
    {
        return $this->belongsTo('App\Models\Turma', 'turma_id');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor', 'professor_id');
    }
}
