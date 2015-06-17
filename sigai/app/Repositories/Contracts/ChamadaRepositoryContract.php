<?php namespace App\Repositories\Contracts;

use App\Models\Aluno;
use App\Models\Aula;

interface ChamadaRepositoryContract
{
    public static function findByAulaAndAluno($aulaId, $alunoId);
    
    public static function insertOrUpdateAll(array $chamadas, Aula $aula);
    
    public static function insertOrUpdate(Aluno $aluno, array $periods, Aula $aula);
    
    public static function findFaltasByTurma($turmaId);

    public static function findFaltasByTurmaPerPeriod($turmaId, $month = null);
}
