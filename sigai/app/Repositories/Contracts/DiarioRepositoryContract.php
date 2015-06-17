<?php namespace App\Repositories\Contracts;

use App\Models\Turma;
use App\Models\Professor;
use App\Models\StatusDiario;

interface DiarioRepositoryContract
{
    public function insert($month, Turma $turma, Professor $professor);
    
    public function findAllByTurma(Turma $turma);
    
    public function findDiariosToClose(Professor $professor);
    
    public function findDiariosToCloseByTurma(Turma $turma);
    
    public function exists($turmaId, $month);
}
