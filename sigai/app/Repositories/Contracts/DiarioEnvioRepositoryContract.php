<?php namespace App\Repositories\Contracts;


interface DiarioEnvioRepositoryContract
{
    public function insert(array $data);
    public function findById($id);
}