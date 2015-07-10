<?php namespace App\Repositories\Contracts;

use App\Models\Ambiente;
use App\Models\OAuthScope;

interface OAuthScopeRepositoryContract {
    /**
     * Retorna o escopo com a id informada.
     * @param int $id
     * @return OAuthScope
     * @throws NotFoundError Caso não encontre o escopo
     */
    public function findById($id);

    /**
     * Retorna lista com todos os escopos existentes.
     * @return array
     */
    public function listAll();

    /**
     * Retorna lista de escopos com paginação, ordenando por padrão pelo nome do escopo, com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    public function paginate($orderBy = 'id', $perPage = 10);

    /**
     * Atualiza o escopo com a id informada com os dados passados pelo array de dados.
     * @param array $data
     * @param int   $id
     * @return OAuthScope
     * @throws ServerError Caso não consiga salvar os dados do escopo
     */
    public function update(array $data, $id);

    /**
     * Insere um novo escopo com os dados informados pelo array.
     * @param array $data
     * @return OAuthScope
     * @throws ServerError Caso não consiga salvar os dados do escopo
     */
    public function insert(array $data);

    /**
     * Remove o escopo pela id informada.
     * @param int $id
     * @throws NotFoundError Caso não encontre o escopo
     */
    public function deleteById($id);
}