<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class ProfessorTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) (empty($this->id)  ? $this->usuario->id : $this->id),
            'matricula'    => ($this->usuario != null) ? $this->usuario->matricula : $this->matricula,
            'nome'         => ($this->usuario != null) ? $this->usuario->nome : $this->nome,
            'email'        => ($this->usuario != null) ? $this->usuario->email : $this->email,
            'display_name' => ($this->usuario != null) ? ($this->usuario->matricula.' | '.$this->usuario->nome)
                                                       : ($this->matricula.' | '.$this->nome)
        ];
        
        if (in_array('cursoOrigem', $options)) {
            $data['cursoOrigem']     = $this->cursoOrigem->transform();
            $data['curso_origem_id'] = $this->cursoOrigem->id;
        }
        
        return $data;
    }
}
