<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class TipoDispositivoAluno extends Model {
    protected $table = 'tipos_dispositivos_aluno';
    protected $fillable = ['nome'];

    public function dispositivos()
    {
        return $this->hasMany('App\Models\DispositivoAluno', 'tipo_dispositivo_id');
    }
}