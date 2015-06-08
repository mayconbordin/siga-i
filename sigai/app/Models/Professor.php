<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class Professor extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\ProfessorTransformer';
    protected $table = 'professores';

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
    
    public function cursoOrigem()
    {
        return $this->belongsTo('App\Models\Curso', 'curso_origem_id');
    }
    
    public function statusDiarios()
    {
        return $this->hasMany('App\Models\StatusDiario', 'professor_id');
    }
    
    public function turmas()
    {
        return $this->belongsToMany('App\Models\Turma', 'professores_turmas',
                                    'professor_id', 'turma_id');
    }
    
    
    public function getMatriculaAttribute()
    {
        return $this->usuario->matricula;
    }
    
    public function getNomeAttribute()
    {
        return $this->usuario->nome;
    }

}
