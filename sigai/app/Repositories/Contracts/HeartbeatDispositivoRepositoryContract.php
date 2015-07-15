<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Models\HeartbeatDispositivo;
use App\Models\OAuthClient;
use App\Models\User;
use App\Repositories\Test\BaseRepositoryContract;

interface HeartbeatDispositivoRepositoryContract extends BaseRepositoryContract
{
    /**
     * Retorna o heartbeat com a id informada.
     * @param int $id
     * @return HeartbeatDispositivo
     * @throws NotFoundError Caso não encontre o heartbeat
     */
    //public function findById($id);

    /**
     * Retorna lista com todos os heartbeats existentes.
     * @return array
     */
    //public function listAll();

    /**
     * Retorna lista de heartbeats com paginação, ordenando por padrão pelo nome do heartbeat, com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    //public function paginate($orderBy = 'id', $perPage = 10);

    /**
     * Insere um novo heartbeat com os dados informados pelo array.
     * @param array $data
     * @param OAuthClient $dispositivo
     * @return HeartbeatDispositivo
     * @throws ServerError Caso não consiga salvar os dados do heartbeat
     */
    //public function insert(OAuthClient $dispositivo);

    /**
     * Remove o heartbeat pela id informada.
     * @param int $id
     * @throws NotFoundError Caso não encontre o heartbeat
     */
    //public function deleteById($id);
}
