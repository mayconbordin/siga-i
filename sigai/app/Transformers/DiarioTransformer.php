<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class DiarioTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'mes'          => $this->mes,
            'mes_nome'     => \Lang::get('months.'.$this->mes),
            'status'       => $this->status,
            'created_at'   => $this->created_at->toDateTimeString()
        ];
        
        if (in_array('turma', $options)) {
           $data['turma'] = $this->turma->transform();
        }
        
        if (in_array('professor', $options)) {
           $data['professor'] = $this->professor->transform();
        }

        if (in_array('envios', $options)) {
            $opts = $this->getSubOptions('envios', $options);
            $data['envios'] = array_map(function($e) use ($opts) {
                return $e->transform($opts);
            }, $this->envios->all());
        }
        
        return $data;
    }
}
