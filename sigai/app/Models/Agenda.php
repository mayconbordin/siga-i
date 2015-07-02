<?php namespace App\Models;

use App\Transformers\Base\TransformableTrait;

class Agenda {
    use TransformableTrait;

    protected $transformer = 'App\Transformers\AgendaTransformer';

    public $data;
    public $aulas = array();

    public function addAula(Aula $aula)
    {
        $this->aulas[] = $aula;
    }
}