<?php namespace App\Repositories\Test;

use \Lang;

class UserRepository extends BaseRepository {

    public function model()
    {
        return 'App\Models\User';
    }

    public function name()
    {
        return Lang::choice('usuarios.title', 1);
    }
}