<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class UnidadeCurricular extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\UnidadeCurricularTransformer';
	protected $table = 'unidades_curriculares';
	protected $fillable = ['nome', 'carga_horaria', 'sigla'];

    public function turmas()
    {
        return $this->hasMany('App\Models\Turma', 'unidade_curricular_id');
    }
    
    public function cursos()
    {
        return $this->belongsToMany('App\Models\Curso', 'cursos_unidades_curriculares',
                                    'uni_curr_id', 'curso_id');
    }

}
