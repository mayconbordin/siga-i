<?php namespace App\Services\Contracts;

use App\Models\User;

interface ImportServiceContract {
    public function importExcel(User $usuario, array $data);
}