<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class HeartbeatDispositivoTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'         => (int) $this->id,
            'created_at' => $this->created_at->format('d/m/Y H:i:s')
        ];
 
        if (in_array('dispositivo', $options)) {
            $data['dispositivo'] = $this->dispositivo->transform();
        }
        
        return $data;
    }
}
