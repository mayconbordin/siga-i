<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class TipoDispositivoTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'   => (int) $this->id,
            'nome' => $this->nome,
        ];

        return $data;
    }
}
