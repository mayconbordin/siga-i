<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class DispositivoAluno extends Model {
	protected $table = 'dispositivos_aluno';
	protected $fillable = ['codigo'];

    public function aluno()
    {
        return $this->belongsTo('App\Models\Aluno', 'aluno_id');
    }
    
    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoDispositivoAluno', 'tipo_dispositivo_id');
    }
}
