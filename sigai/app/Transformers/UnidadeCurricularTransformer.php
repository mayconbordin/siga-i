<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class UnidadeCurricularTransformer extends Transformer
{
    public function transform($options = array())
    {
        return [
            'id'            => (int) $this->id,
            'nome'          => $this->nome,
            'carga_horaria' => (int) $this->carga_horaria,
            'sigla'         => $this->sigla
        ];
    }
}
