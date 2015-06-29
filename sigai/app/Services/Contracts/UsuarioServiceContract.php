<?php namespace App\Services\Contracts;

use App\Models\User;

interface UsuarioServiceContract {
    public function isPasswordValid(User $usuario, $password);
    public function save(User $usuario, array $data);
}