<?php namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PermissionRepositoryContract;
use App\Repositories\Test\BaseRepository as BRepository;

use \Lang;
use \DB;

class PermissionRepository extends BRepository implements PermissionRepositoryContract
{
    protected $relations = ['roles'];

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Models\Permission';
    }

    /**
     * @return string
     */
    public function name()
    {
        return Lang::choice('permissions.title', 1);
    }
}