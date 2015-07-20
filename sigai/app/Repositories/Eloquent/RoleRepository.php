<?php namespace App\Repositories\Eloquent;

use App\Exceptions\ValidationError;
use App\Repositories\Contracts\RoleRepositoryContract;
use App\Repositories\Test\BaseRepository as BRepository;

use \Lang;
use \DB;

class RoleRepository extends BRepository implements RoleRepositoryContract
{
    protected $relations = ['perms', 'users'];

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Models\Role';
    }

    /**
     * @return string
     */
    public function name()
    {
        return Lang::get('usuarios.roles');
    }

    public function create(array $attributes)
    {
        $permissions = array_pull($attributes, 'permissions', []);
        $model = parent::create($attributes);

        if (!is_array($permissions) || array_filter($permissions, 'is_numeric') !== $permissions) {
            throw ValidationError::withSingleError('permissions', Lang::get('permissions.not_array'));
        }

        $model->perms()->attach($permissions);

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $permissions = array_pull($attributes, 'permissions', []);
        $model = parent::update($attributes, $id);

        if (!is_array($permissions) || array_filter($permissions, 'is_numeric') !== $permissions) {
            throw ValidationError::withSingleError('permissions', Lang::get('permissions.not_array'));
        }

        $model->perms()->detach();
        $model->perms()->attach($permissions);

        return $model;
    }

}