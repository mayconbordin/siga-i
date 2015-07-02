<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class AgendaTransformer extends Transformer
{
    public function transform($options = array())
    {
        $aulas = [];

        foreach ($this->aulas as $aula) {
            $aulas[] = $aula->transform($options);
        }

        $data = [
            'data'  => $this->data->format('d/m/Y'),
            'aulas' => $aulas
        ];

        return $data;
        
    }
}
