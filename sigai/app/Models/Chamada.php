<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamada extends Model {

	protected $table = 'chamadas';
	protected $primarykey = ['aula_id', 'aluno_id'];
	protected $fillable = ['p1', 'p2', 'p3', 'p4'];
	
	public function aula()
    {
        return $this->belongsTo('App\Models\Aula', 'aula_id');
    }

    public function aluno()
    {
        return $this->belongsTo('App\Models\Aluno', 'aluno_id');
    }
}
