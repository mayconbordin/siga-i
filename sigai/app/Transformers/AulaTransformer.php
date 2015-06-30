<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class AulaTransformer extends Transformer
{
    public function transform($options = array())
    {
        $ambiente = ($this->ambiente != null) ? $this->ambiente : $this->turma->ambienteDefault;

        if (in_array('full_calendar', $options)) {
            return [
                'id'     => (int) $this->id,
                'title'  => $ambiente->nome,
                'start'  => $this->data->format('Y-m-d') . 'T' . $this->horario_inicio->format('H:i:s'),
                'end'    => $this->data->format('Y-m-d') . 'T' . $this->horario_fim->format('H:i:s'),
                'allDay' => false
            ];
        }
        
        $data = [
            'id'                 => (int) $this->id,
            'data'               => $this->data->format('d/m/Y'),
            'horario_inicio'     => $this->horario_inicio->format('H:i:s'),
            'horario_fim'        => $this->horario_fim->format('H:i:s'),
            'status'             => $this->status,
            'conteudo'           => $this->conteudo,
            'ensino_a_distancia' => ($this->ensino_a_distancia == 0) ? false : true,
            'turma_id'           => $this->turma_id,
            'ambiente'           => $ambiente->transform()
        ];
 
        if (in_array('turma', $options)) {
            $data['turma'] = $this->turma->transform();
        }
        
        return $data;
        
    }
}
