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
    
    public function setPeriodos(array $periodos)
    {
        if (sizeof($periodos) != 4) {
            throw new \Exception("A chamada deve conter quatro períodos");
        }
        
        $this->p1 = $periodos[0];
        $this->p2 = $periodos[1];
        $this->p3 = $periodos[2];
        $this->p4 = $periodos[3];
    }
}
