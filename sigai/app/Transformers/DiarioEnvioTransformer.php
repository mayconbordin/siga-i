<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class DiarioEnvioTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'created_at'   => $this->created_at->toDateTimeString()
        ];
        
        if (in_array('diario', $options)) {
           $data['diario'] = $this->diario->transform();
        }

        if (in_array('professor', $options)) {
            $data['professor'] = $this->professor->transform();
        }
        
        return $data;
    }
}
