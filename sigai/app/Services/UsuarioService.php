<?php namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UsuarioRepositoryContract;

use App\Services\Contracts\UsuarioServiceContract;
use \Hash;

class UsuarioService implements UsuarioServiceContract
{
    protected $repository;

    public function __construct(UsuarioRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function isPasswordValid(User $usuario, $password)
    {
        return Hash::check($password, $usuario->password);
    }

    public function save(User $usuario, array $data)
    {
        $data['password'] = array_get($data, 'new_password', '');
        $this->repository->updateById($data, $usuario->id);
    }
}