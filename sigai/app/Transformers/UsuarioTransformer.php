<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class UsuarioTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'matricula'    => $this->matricula,
            'nome'         => $this->nome,
            'email'        => $this->email,
            'display_name' => ($this->matricula.' | '.$this->nome)
        ];

        if (in_array('roles', $options)) {
            $opts = $this->getSubOptions('roles', $options);

            $data['roles'] = array_map(function($e) use ($opts) {
                return $e->transform($opts);
            }, $this->roles->all());
        }
        
        return $data;
    }
}
