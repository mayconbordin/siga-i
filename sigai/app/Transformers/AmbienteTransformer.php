<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class AmbienteTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'                 => (int) $this->id,
            'nome'               => $this->nome,
            'tipo_ambiente_id'   => (int) $this->tipo_ambiente_id
        ];
 
        if (in_array('tipo', $options)) {
            $data['tipo'] = $this->tipo->transform();
        }
        
        return $data;
    }
}
