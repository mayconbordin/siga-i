<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

class DiarioTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'mes'          => $this->mes,
            'status'       => $this->status,
            'created_at'   => $this->created_at->toDateTimeString()
        ];
        
        if (in_array('turma', $options)) {
           $data['turma'] = $this->turma->transform();
        }
        
        if (in_array('professor', $options)) {
           $data['professor'] = $this->professor->transform();
        }
        
        return $data;
    }
}
