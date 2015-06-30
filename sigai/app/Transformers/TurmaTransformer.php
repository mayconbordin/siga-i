<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class TurmaTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'             => (int) $this->id,
            'nome'           => $this->nome,
            'data_inicio'    => $this->data_inicio->format('d/m/Y'),
            'data_fim'       => $this->data_fim->format('d/m/Y'),
            'horario_inicio' => $this->data_inicio->format('H:i:s'),
            'horario_fim'    => $this->data_fim->format('H:i:s'),
        ];

        if (in_array('ambiente', $options)) {
            $data['ambiente'] = $this->ambienteDefault->transform();
        }

        return $data;
    }
}
