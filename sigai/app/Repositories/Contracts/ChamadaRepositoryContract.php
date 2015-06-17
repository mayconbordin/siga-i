<?php namespace App\Repositories\Contracts;

use App\Models\Aluno;
use App\Models\Aula;
use App\Models\Chamada;
use App\Repositories\Results\ChamadaPerDayResult;

interface ChamadaRepositoryContract
{
    /**
     * Retorna a chamada do aluno na turma definida.
     * @param int $aulaId
     * @param int $alunoId
     * @return Chamada
     */
    public static function findByAulaAndAluno($aulaId, $alunoId);

    /**
     * Insere ou atualiza a chamada dos alunos de uma turma.
     * @param array $chamadas Array associativo com campo 'aluno' (Aluno) e 'periods' (array de booleans, size=4)
     * @param Aula  $aula
     * @return array
     */
    public static function insertOrUpdateAll(array $chamadas, Aula $aula);

    /**
     * Insere ou atualiza a chamada do aluno de uma turma.
     * @param Aluno $aluno
     * @param array $periods Array de booleans com tamanho 4
     * @param Aula  $aula
     * @return Chamada
     */
    public static function insertOrUpdate(Aluno $aluno, array $periods, Aula $aula);

    /**
     * Retorna lista de faltas por aluno por turma, separado por meses.
     * @param int $turmaId
     * @return array
     */
    public static function findFaltasByTurma($turmaId);

    /**
     * Retorna lista de chamada da turma me um mês ou todos os meses. Os resultados são divididos por curso, e dentro de
     * cada curso eles são divididos em períodos (meses).
     * @param int $turmaId
     * @param int $month
     * @return ChamadaPerDayResult
     */
    public static function findFaltasByTurmaPerPeriod($turmaId, $month = null);
}
