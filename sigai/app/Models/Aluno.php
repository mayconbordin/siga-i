<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class Aluno extends Model {
    const STATUS_NORMAL                = 'normal';
    const STATUS_CANCELADO             = 'cancelado';
    const STATUS_TRANSFERIDO           = 'transferido';
    const STATUS_DISPENSADO            = 'dispensado';
    const STATUS_TRANCAMENTO_MATRICULA = 'trancamento_matrícula';
    const STATUS_ENSINO_DISTANCIA      = 'ensino_distancia';
    
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\AlunoTransformer';

	protected $table   = 'alunos';
	protected $hidden  = ['password', 'remember_token'];
	//protected $appends = ['matricula'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function chamadas()
    {
        return $this->hasMany('App\Models\Chamada', 'aluno_id');
    }
    
    public function cursos()
    {
        return $this->belongsToMany('App\Models\Curso', 'cursos_alunos',
                                    'aluno_id', 'curso_id');
    }
    
    public function turmas()
    {
        return $this->belongsToMany('App\Models\Turma', 'alunos_turmas', 'aluno_id', 'turma_id')
                    ->withPivot('status', 'curso_origem_id');
    }

    public function getIsNormalAttribute()
    {
        if (isset($this['status'])) {
            return $this->status == self::STATUS_NORMAL;
        } else {
            return $this->pivot->status == self::STATUS_NORMAL;
        }
    }
}
