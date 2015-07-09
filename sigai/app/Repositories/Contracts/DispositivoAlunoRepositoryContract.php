<?php namespace App\Repositories\Contracts;

use App\Models\DispositivoAluno;

interface DispositivoAlunoRepositoryContract {
    /**
     * Retorna o dispositivo com a id informada.
     * @param int $id
     * @return DispositivoAluno
     * @throws NotFoundError Caso não encontre o dispositivo
     */
    public function findById($id);

    /**
     * Retorna o dispositivo com o código exatamente igual ao informado.
     * @param string $codigo
     * @return DispositivoAluno
     * @throws NotFoundError Caso não encontre o dispositivo
     */
    public function findByCodigo($codigo);

    /**
     * Retorna lista de dispositivos cujo código comece com a query informada.
     * @param string $query
     * @return array
     */
    public function searchByCodigo($query);

    /**
     * Retorna lista com todos os dispositivos existentes.
     * @return array
     */
    public function listAll();

    /**
     * Retorna lista de dispositivos com paginação, ordenando por padrão pelo nome do dispositivo, com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    public function paginate($orderBy = 'id', $perPage = 10);

    /**
     * Atualiza o dispositivo com a id informada com os dados passados pelo array de dados.
     * @param array $data
     * @param int   $id
     * @return DispositivoAluno
     * @throws ServerError Caso não consiga salvar os dados do dispositivo
     */
    public function update(array $data, $id);

    /**
     * Insere um novo dispositivo com os dados informados pelo array.
     * @param array $data
     * @return DispositivoAluno
     * @throws ServerError Caso não consiga salvar os dados do dispositivo
     */
    public function insert(array $data);

    /**
     * Remove o dispositivo pela id informada.
     * @param int $id
     * @throws NotFoundError Caso não encontre o dispositivo
     */
    public function deleteById($id);
}