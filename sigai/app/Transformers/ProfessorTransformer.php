<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class ProfessorTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) (empty($this->id) ? $this->usuario->id : $this->id),
            'matricula'    => $this->usuario->matricula,
            'nome'         => $this->usuario->nome,
            'email'        => $this->usuario->email,
            'display_name' => '(' . $this->usuario->matricula . ') ' 
                                  . $this->usuario->nome
        ];
        
        if (in_array('cursoOrigem', $options)) {
            $data['cursoOrigem']     = $this->cursoOrigem->transform();
            $data['curso_origem_id'] = $this->cursoOrigem->id;
        }
        
        return $data;
    }
}
