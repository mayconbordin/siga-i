<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Models\TipoDispositivo;

interface TipoDispositivoRepositoryContract {
    /**
     * Retorna o tipo de dispositivo com a ID informada.
     * @param int $id
     * @return TipoDispositivo
     * @throws NotFoundError
     */
    public function findById($id);

    /**
     * Retorna o tipo de dispositivo que tenha exatamente o nome informado.
     *
     * @param string $nome
     * @return TipoDispositivo
     * @throws NotFoundError
     */
    public function findByNome($nome);

    /**
     * Procura tipos de tipo de dispositivo que comecem com a query informada.
     *
     * @param string $query
     * @return Array
     */
    public function searchByName($query);

    /**
     * Retorna lista com todos os tipos de dispositivo.
     * @return Array
     */
    public function listAll();

    /**
     * Pagina a lista de tipos de dispositivo.
     *
     * @param string $orderBy
     * @param int    $perPage
     * @return Array
     */
    public function paginate($orderBy = 'nome', $perPage = 10);

    /**
     * Atualiza um tipo de dispositivo existente.
     *
     * @param array $data [nome=>string]
     * @param int   $id
     * @return TipoDispositivo
     */
    public function update(array $data, $id);

    /**
     * Insere um novo ambiente.
     *
     * @param array $data [nome=>string]
     * @return TipoDispositivo
     */
    public function insert(array $data);

    /**
     * Remove o tipo de dispositivo com a ID informada, bem como todos registros ligados a ele. Neste caso todos os ambientes
     * ligados a este tipo de dispositivo.
     *
     * @param int $id
     * @return void
     */
    public function deleteById($id);
}