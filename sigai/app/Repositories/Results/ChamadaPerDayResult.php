<?php namespace App\Repositories\Results;

class ChamadaPerDayResult
{
    public $cursos = array();
    public $dates  = array();
    
    public function addRows($rows)
    {
        foreach ($rows as $row) {
            $this->addRow($row);
        }
    }
    
    public function addRow($row)
    {
        $this->addCurso($row);
        $this->addMonth($row);
        $this->addChamada($row);
    }
    
    public function addCurso($row)
    {
        $id = $row->curso_id;
        
        if (isset($this->cursos[$id])) return;
        
        $this->cursos[$id] = new \stdClass;
        $this->cursos[$id]->id      = $row->curso_id;
        $this->cursos[$id]->nome    = $row->curso_nome;
        $this->cursos[$id]->sigla   = $row->curso_sigla;
        $this->cursos[$id]->coordenador_id = $row->curso_coordenador_id;
        $this->cursos[$id]->chamada = [];
    }
    
    public function addMonth($row)
    {
        $month = $row->year . '-' . $row->month;
        $id = $row->curso_id;
        
        if (isset($this->cursos[$id]->chamada[$month])) return;
        
        $this->cursos[$id]->chamada[$month] = [];
        $this->dates[$month] = [];
    }
    
    public function addChamada($row)
    {
        $id = $row->curso_id;
        $month = $row->year . '-' . $row->month;

        if (!isset($this->cursos[$id]->chamada[$month][$row->matricula])) {
            $obj = $this->cursos[$id]->chamada[$month][$row->matricula] = new \stdClass;
            
            $obj->nome           = $row->nome;
            $obj->matricula      = $row->matricula;
            $obj->status         = $row->status;
            $obj->sigla_curso    = $row->curso_sigla;
            $obj->total_faltas   = 0;
            $obj->faltas         = [];
        } else {
            $obj = $this->cursos[$id]->chamada[$month][$row->matricula];
        }
        
        $date = $row->year . '-' . $row->month . '-' . $row->day;
            
        $obj->faltas[$date]               = new \stdClass;
        $obj->faltas[$date]->year         = $row->year;
        $obj->faltas[$date]->month        = $row->month;
        $obj->faltas[$date]->day          = $row->day;
        
        $obj->faltas[$date]->periods = [$row->p1, $row->p2, $row->p3, $row->p4];
        
        $obj->total_faltas += $row->total_faltas;
        
        if (!in_array($date, $this->dates[$month])) {
            $this->dates[$month][] = $date;
        }
    }
}
