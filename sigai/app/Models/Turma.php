<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

use Carbon\Carbon;

class Turma extends Model {
    const TURNO_MANHA = 'manhã';
    const TURNO_TARDE = 'tarde';
    const TURNO_NOITE = 'noite';

    use TransformableTrait;
    
    protected $transformer = 'App\Transformers\TurmaTransformer';

	protected $table    = 'turmas';
	protected $fillable = ['nome', 'data_inicio', 'data_fim'];
	protected $hidden   = ['pivot'];
	
	public function getDataInicioAttribute($value)
    {
        if ($value instanceof Carbon)
            return $value;
        else
            return Carbon::createFromFormat('Y-m-d', $value);
    }
    
    public function getDataFimAttribute($value)
    {
        if ($value instanceof Carbon)
            return $value;
        else
            return Carbon::createFromFormat('Y-m-d', $value);
    }

    public function unidadeCurricular()
    {
        return $this->belongsTo('App\Models\UnidadeCurricular', 'unidade_curricular_id');
    }

    public function aulas()
    {
        return $this->hasMany('App\Models\Aula', 'turma_id');
    }
    
    public function statusDiarios()
    {
        return $this->hasMany('App\Models\StatusDiario', 'turma_id');
    }
    
    public function alunos()
    {
        return $this->belongsToMany('App\Models\Aluno', 'alunos_turmas',
                                    'turma_id', 'aluno_id')
                    ->withPivot('status', 'curso_origem_id');
    }
    
    public function professores()
    {
        return $this->belongsToMany('App\Models\Professor', 'professores_turmas',
                                    'turma_id', 'professor_id');
    }

}
