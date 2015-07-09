<?php namespace App\Repositories\Contracts;

use App\Exceptions\ConflictError;
use App\Exceptions\NotFoundError;
use App\Models\Ambiente;
use App\Models\OAuthClient;

interface AmbienteRepositoryContract {
    /**
     * Retorna o ambiente com a ID informada.
     * @param int $id
     * @return Ambiente
     * @throws NotFoundError
     */
    public function findById($id);

    /**
     * Retorna o ambiente que tenha exatamente o nome informado.
     *
     * @param string $nome
     * @return Ambiente
     * @throws NotFoundError
     */
    public function findByNome($nome);

    /**
     * Procura ambientes que comecem com a query informada.
     *
     * @param string $query
     * @return Array
     */
    public function searchByName($query);

    /**
     * Retorna lista com todos os ambientes.
     * @return Array
     */
    public function listAll();

    /**
     * Pagina a lista de ambientes.
     *
     * @param string $orderBy
     * @param int    $perPage
     * @return Array
     */
    public function paginate($orderBy = 'id', $perPage = 10);

    /**
     * Atualiza um ambiente existente.
     *
     * @param array $data [nome=>string, tipo=>TipoAmbiente]
     * @param int   $id
     * @return Ambiente
     */
    public function update(array $data, $id);

    /**
     * Insere um novo ambiente.
     *
     * @param array $data [nome=>string, tipo=>TipoAmbiente]
     * @return Ambiente
     */
    public function insert(array $data);

    /**
     * Remove o ambiente com a ID informada, bem como todos registros ligados a ele. No caso das turmas e aulas ligadas a ele,
     * apenas anula o campo de ambiente.
     *
     * @param int $id
     * @return void
     */
    public function deleteById($id);

    /**
     * Víncula o dispositivo ao ambiente com ID informada.
     *
     * @param int $id
     * @param OAuthClient $dispositivo
     * @return Array [ambiente=>Ambiente, dispositivo=>OAuthClient]
     * @throws NotFoundError Caso não encontre o ambiente
     * @throws ConflictError Caso o dispositivo já esteja vínculado ao ambiente
     */
    public function attachDispositivo($id, OAuthClient $dispositivo);

    /**
     * Desvíncula o dispositivo do ambiente com ID informada.
     *
     * @param int $id
     * @param OAuthClient $dispositivo
     * @return void
     * @throws NotFoundError Caso não encontre o ambiente
     */
    public function detachDispositivo($id, OAuthClient $dispositivo);

    /**
     * Verifica se o ambiente possuí o dispositivo.
     *
     * @param int $ambienteId
     * @param string $dispositivoId
     * @return bool
     */
    public function hasDispositivo($ambienteId, $dispositivoId);
}