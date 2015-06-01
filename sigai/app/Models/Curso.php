<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class Curso extends Model {
    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\CursoTransformer';
	protected $table = 'cursos';
	protected $fillable = ['nome', 'sigla'];
	protected $hidden = ['pivot'];

    public function professoresOrigem()
    {
        return $this->hasMany('App\Models\Professor', 'curso_origem_id');
    }
    
    public function alunos()
    {
        return $this->belongsToMany('App\Models\Aluno', 'cursos_alunos',
                                    'curso_id', 'aluno_id');
    }
    
    public function coordenador()
    {
        return $this->belongsTo('App\Models\User', 'coordenador_id');
    }
    
    public function unidadesCurriculares()
    {
        return $this->belongsToMany('App\Models\UnidadeCurricular',
                                    'cursos_unidades_curriculares',
                                    'curso_id', 'uni_curr_id');
    }

}
