<?php namespace App\Repositories\Contracts;

use App\Models\Ambiente;
use App\Models\OAuthClient;

interface OAuthClientRepositoryContract {
    /**
     * Retorna o cliente com a id informada.
     * @param int $id
     * @return OAuthClient
     * @throws NotFoundError Caso não encontre o cliente
     */
    public function findById($id);

    /**
     * Retorna o cliente com o nome exatamente igual ao informado.
     * @param string $nome
     * @return OAuthClient
     * @throws NotFoundError Caso não encontre o cliente
     */
    public function findByNome($nome);

    /**
     * Retorna lista de clientes cujo nome comece com a query informada.
     * @param string $query
     * @return array
     */
    public function searchByName($query);

    /**
     * Retorna lista com todos os clientes existentes.
     * @return array
     */
    public function listAll();

    /**
     * Retorna lista de clientes com paginação, ordenando por padrão pelo nome do cliente, com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    public function paginate($orderBy = 'id', $perPage = 10);

    /**
     * Atualiza o cliente com a id informada com os dados passados pelo array de dados.
     * @param array $data
     * @param int   $id
     * @return OAuthClient
     * @throws ServerError Caso não consiga salvar os dados do cliente
     */
    public function update(array $data, $id);

    /**
     * Atualiza apenas o ambiente do cliente.
     * @param int $id
     * @param Ambiente $ambiente
     * @return OAuthClient
     */
    public function updateAmbiente($id, Ambiente $ambiente = null);

    /**
     * Insere um novo cliente com os dados informados pelo array.
     * @param array $data
     * @return OAuthClient
     * @throws ServerError Caso não consiga salvar os dados do cliente
     */
    public function insert(array $data);

    /**
     * Remove o cliente pela id informada.
     * @param int $id
     * @throws NotFoundError Caso não encontre o cliente
     */
    public function deleteById($id);
}