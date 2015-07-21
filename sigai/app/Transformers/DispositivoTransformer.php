<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class DispositivoTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'          => (int) $this->id,
            'codigo'      => $this->codigo,
            'created_at'  => $this->created_at->format('d/m/Y H:i:s'),
            'tipo_dispositivo_id' => (int) $this->tipo_dispositivo_id,
            'usuario_id'  => (int) $this->usuario_id
        ];
 
        if (in_array('tipo', $options)) {
            $data['tipo'] = $this->tipo->transform();
        }

        if (in_array('usuario', $options)) {
            $data['usuario'] = $this->usuario->transform();
        }
        
        return $data;
    }
}
