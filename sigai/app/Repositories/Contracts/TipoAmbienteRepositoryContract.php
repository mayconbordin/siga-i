<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Models\TipoAmbiente;

interface TipoAmbienteRepositoryContract {
    /**
     * Retorna o tipo de ambiente com a ID informada.
     * @param int $id
     * @return TipoAmbiente
     * @throws NotFoundError
     */
    public function findById($id);

    /**
     * Retorna o tipo de ambiente que tenha exatamente o nome informado.
     *
     * @param string $nome
     * @return TipoAmbiente
     * @throws NotFoundError
     */
    public function findByNome($nome);

    /**
     * Procura tipos de tipo de ambiente que comecem com a query informada.
     *
     * @param string $query
     * @return Array
     */
    public function searchByName($query);

    /**
     * Retorna lista com todos os tipos de ambiente.
     * @return Array
     */
    public function listAll();

    /**
     * Pagina a lista de tipos de ambiente.
     *
     * @param string $orderBy
     * @param int    $perPage
     * @return Array
     */
    public function paginate($orderBy = 'nome', $perPage = 10);

    /**
     * Atualiza um tipo de ambiente existente.
     *
     * @param array $data [nome=>string]
     * @param int   $id
     * @return TipoAmbiente
     */
    public function update(array $data, $id);

    /**
     * Insere um novo ambiente.
     *
     * @param array $data [nome=>string]
     * @return TipoAmbiente
     */
    public function insert(array $data);

    /**
     * Remove o tipo de ambiente com a ID informada, bem como todos registros ligados a ele. Neste caso todos os ambientes
     * ligados a este tipo de ambiente.
     *
     * @param int $id
     * @return void
     */
    public function deleteById($id);
}