<?php namespace App\Services\Contracts;

interface RoleServiceContract extends CrudServiceContract {
    public function listAllPermissions();
}