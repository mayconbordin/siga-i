<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class AlunoTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'matricula'    => ($this->usuario != null) ? $this->usuario->matricula : $this->matricula,
            'nome'         => ($this->usuario != null) ? $this->usuario->nome : $this->nome,
            'email'        => ($this->usuario != null) ? $this->usuario->email : $this->email,
            'display_name' => ($this->usuario != null) ? ($this->usuario->matricula.' | '.$this->usuario->nome)
                                                    : ($this->matricula.' | '.$this->nome)
        ];
        
        if (in_array('pivot', $options)) {
            $data['status'] = ($this->pivot != null) ? $this->pivot->status : $this->status;
            $data['curso_origem_id'] = ($this->pivot != null) ? $this->pivot->curso_origem_id : $this->curso_origem_id;
        }
        
        return $data;
    }
}
