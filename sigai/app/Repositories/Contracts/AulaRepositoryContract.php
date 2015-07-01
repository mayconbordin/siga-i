<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Exceptions\ValidationError;
use App\Models\Ambiente;
use App\Models\Aula;
use App\Models\Turma;

use Carbon\Carbon;

interface AulaRepositoryContract
{
    /**
     * Retorna lista de aulas de uma turma dentro de um período.
     * @param int    $turmaId
     * @param Carbon $start
     * @param Carbon $end
     * @return array
     */
    public function findByTurmaBetweenDates($turmaId, Carbon $start = null, Carbon $end = null);

    /**
     * Retorna lista de aulas de uma turma dentro de um mês.
     * @param int $turmaId
     * @param int $month
     * @return array
     */
    public function findByTurmaInMonth($turmaId, $month);

    /**
     * Retorna a aula com a id informada.
     * @param int $id
     * @param int $turmaId
     * @param int $unidadeCurricularId
     * @return Aula
     * @throws NotFoundError Se a aula com a id e turma informados não existir
     * @throws ValidationError Se a id da unidade curricular informada for diferente da obtida no banco de dados
     */
    public function findById($id, $turmaId, $unidadeCurricularId);

    /**
     * Retorna a aula com a data e turma informados.
     * @param Carbon $data
     * @param int    $turmaId
     * @param int    $unidadeCurricularId
     * @return Aula
     * @throws NotFoundError Se a aula com a id e turma informados não existir
     * @throws ValidationError Se a id da unidade curricular informada for diferente da obtida no banco de dados
     */
    public function findByData(Carbon $data, $turmaId, $unidadeCurricularId);

    /**
     * Retorna a aula com a data e turma informados, incluindo todas informações relacionadas a aula.
     * @param Carbon $data
     * @param int    $turmaId
     * @param int    $unidadeCurricularId
     * @return Aula
     * @throws NotFoundError Se a aula com a id e turma informados não existir
     * @throws ValidationError Se a id da unidade curricular informada for diferente da obtida no banco de dados
     */
    public function findByDataWithAll(Carbon $data, $turmaId, $unidadeCurricularId);

    /**
     * Retorna lista de próximas aulas de um determinado professor. Por default utiliza a data do dia e retorna as aulas
     * a partir deste dia.
     * @param int    $professorId
     * @param Carbon $now
     * @param int    $limit Limita o número de resultados que serão retornados
     * @return array
     */
    public function findNextByProfessor($professorId, Carbon $now = null, $limit = 5);

    /**
     * Remove a aula pela data e turma informados.
     * @param Carbon $data
     * @param int    $turmaId
     * @param int    $unidadeCurricularId
     * @throws ServerError
     */
    public function deleteByData(Carbon $data, $turmaId, $unidadeCurricularId);

    /**
     * Insere uma nova aula na turma informada.
     * @param array $data
     * @param Turma $turma
     * @return Aula
     * @throws ServerError
     * @throws ValidationError Caso a data da aula já exista para a turma informada ou ela estiver fora do período da turma.
     */
    public function insert(array $data, Turma $turma);

    /**
     * Atualiza dados da turma com a data e turma informada.
     * @param array  $data
     * @param int    $ucId
     * @param int    $turmaId
     * @param Carbon $date
     * @return Aula
     * @throws ServerError
     * @throws ValidationError Caso a data da aula já exista para a turma informada ou ela estiver fora do período da turma.
     */
    public function update(array $data, $ucId, $turmaId, Carbon $date);

    /**
     * @param int    $ucId
     * @param int    $turmaId
     * @param int    $id
     * @param Carbon $newData
     * @return Aula
     * @throws ServerError
     * @throws ValidationError Caso a data da aula já exista para a turma informada ou ela estiver fora do período da turma.
     */
    public function updateData($ucId, $turmaId, $id, Carbon $newData);

    /**
     * Retorna true se a data de aula existir para a turma informada, e false caso contrário.
     * @param int    $turmaId
     * @param Carbon $date
     * @return boolean
     */
    public function exists($turmaId, Carbon $date);

    /**
     * Disassocia o ambiente informado das aulas.
     * @param Ambiente $ambiente
     * @return void
     */
    public function dissociateAmbiente(Ambiente $ambiente);

    /**
     * Busca por aulas que façam parte de turmas frequentadas pelo aluno com o dispositivo com o código informado, contato
     * que o ambiente da aula tenha como um de seus dispositivos aquele informado pela ID de cliente. Também filtra as aulas
     * por uma data específica.
     *
     * @param string $clientId
     * @param string $deviceCode
     * @param Carbon $data
     * @return array
     */
    public function findAulaByAlunoDeviceAndAmbienteDeviceAndData($clientId, $deviceCode, Carbon $data);
}
