<?php namespace App\Services;

use App\Exceptions\ValidationError;
use App\Repositories\Contracts\PermissionRepositoryContract;
use App\Repositories\Contracts\RoleRepositoryContract;
use App\Services\Abstracts\CrudService;
use App\Services\Contracts\RoleServiceContract;

use \Lang;

class RoleService extends CrudService implements RoleServiceContract
{
    protected $permissionRespository;

    public function __construct(RoleRepositoryContract $repository, PermissionRepositoryContract $permissionRespository)
    {
        parent::__construct($repository);
        $this->permissionRespository = $permissionRespository;
    }

    public function listAllPermissions()
    {
        $permissions = $this->permissionRespository->all(['*'], 'name');
        return $permissions;
    }
}