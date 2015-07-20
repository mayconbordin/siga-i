<?php namespace App\Models;

use App\Transformers\Base\TransformableTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use TransformableTrait;

    protected $transformer = 'App\Transformers\RoleTransformer';

    protected $fillable = ['name', 'display_name', 'description'];
}
