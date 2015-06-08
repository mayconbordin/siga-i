<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class CursoTransformer extends Transformer
{
    public function transform($options = array())
    {
        return [
            'id'    => (int) $this->id,
            'nome'  => $this->nome,
            'sigla' => $this->sigla,
            'coordenador' => $this->coordenador->transform()
        ];
    }
}
