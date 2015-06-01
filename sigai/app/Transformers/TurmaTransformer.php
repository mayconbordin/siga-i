<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class TurmaTransformer extends Transformer
{
    public function transform($options = array())
    {
        return [
            'id'          => (int) $this->id,
            'nome'        => $this->nome,
            'data_inicio' => $this->data_inicio->format('d/m/Y'),
            'data_fim'    => $this->data_fim->format('d/m/Y'),
        ];
    }
}
