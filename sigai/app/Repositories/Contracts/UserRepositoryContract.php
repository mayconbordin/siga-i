<?php namespace App\Repositories\Contracts;

use App\Repositories\Test\BaseRepositoryContract;

interface UserRepositoryContract extends BaseRepositoryContract {
    public function findAllByRolePaginated($role, $orderCol = 'nome', $orderDir = 'asc', $perPage = 15, $columns = array('*'));
    public function findByDispositivo($codigo);
}