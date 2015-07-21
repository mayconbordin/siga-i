<?php namespace App\Services\Contracts;

use App\Models\User;

interface UsuarioServiceContract extends CrudServiceContract {
    public function all(array $parameters = null);

    /**
     * Verifica se a senha informada é válida para o usuário.
     *
     * @param User   $usuario
     * @param string $password
     * @return boolean
     */
    public function isPasswordValid(User $usuario, $password);

    /**
     * Recupera o usuário pela matrícula e verifica se a senha informada bate com a do usuário.
     *
     * @param string $matricula
     * @param string $password
     * @return null|User Retorna o usuário se a senha for válida, caso contrário retorna null.
     */
    public function getByMatriculaAndAuthenticate($matricula, $password);
}