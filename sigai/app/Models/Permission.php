<?php namespace App\Models;

use App\Transformers\Base\TransformableTrait;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use TransformableTrait;

    protected $transformer = 'App\Transformers\PermissionTransformer';

    protected $fillable = ['name', 'display_name', 'description'];
}
