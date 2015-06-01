<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class AulaTransformer extends Transformer
{
    public function transform($options = array())
    {
        if (in_array('full_calendar', $options)) {
            return [
                'id'     => (int) $this->id,
                'title'  => Lang::get('aulas.single_title'),
                'start'  => $this->data->format('Y-m-d'),
                'allDay' => true
            ];
        }
        
        $data = [
            'id'                 => (int) $this->id,
            'data'               => $this->data->format('d/m/Y'),
            'status'             => $this->status,
            'conteudo'           => $this->conteudo,
            'ensino_a_distancia' => ($this->ensino_a_distancia == 0) ? false : true,
            'turma_id'           => $this->turma_id
        ];
 
        if (in_array('turma', $options)) {
            $data['turma'] = $this->turma->transform();
        }
        
        return $data;
        
    }
}
