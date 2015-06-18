<?php namespace App\Repositories\Contracts;

use App\Exceptions\BadRequest;
use App\Exceptions\ConflictError;
use App\Exceptions\ServerError;
use App\Models\StatusDiario;
use App\Models\Turma;
use App\Models\Professor;

use Carbon\Carbon;

interface DiarioRepositoryContract
{
    /**
     * Insere um novo diário.
     * @param int       $month
     * @param Turma     $turma
     * @param Professor $professor
     * @param Carbon    $today (Opcional) Utilizado para verificar se o diário pode ou não ser criado.
     * @return StatusDiario
     * @throws ConflictError Caso o diário já exista
     * @throws BadRequest Caso o diário seja para uma turma ativa e o mês for maior que o mês atual.
     * @throws ServerError
     */
    public function insert($month, Turma $turma, Professor $professor, Carbon $today = null);

    /**
     * Encontra os diários de uma turma.
     * @param Turma $turma
     * @return array
     */
    public function findAllByTurma(Turma $turma);

    /**
     * Lista os diários que precisam ser fechados pelo professor para o mês atual. Leva em conta apenas as turmas ativas
     * do professor. Diários de meses anteriores que não foram fechados são ignorados por esta função.
     * @param Professor $professor
     * @param Carbon    $today
     * @return array
     */
    public function findDiariosToClose(Professor $professor, Carbon $today = null);

    /**
     * Lista os meses cujo diário de turma não foi fechado para uma determinada turma. Se a turma estiver inativa, irá listar
     * todos os meses sem diário, e se a turma estiver ativa, irá listar todos os meses sem diário até o mês atual.
     * @param Turma  $turma
     * @param Carbon $today
     * @return array
     */
    public function findDiariosToCloseByTurma(Turma $turma, Carbon $today = null);

    /**
     * Verifica se o diário para o mês e turma informados existe.
     * @param int $turmaId
     * @param int $month
     * @return boolean
     */
    public function exists($turmaId, $month);
}
