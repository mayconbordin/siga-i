<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Models\User;

interface UsuarioRepositoryContract
{
    /**
     * Retorna o usuário com a id informada.
     * @param int $id
     * @return User
     * @throws NotFoundError Caso não encontre o usuário
     */
    public static function findById($id);

    /**
     * Retorna o usuário com a matrícula informada.
     * @param string $matricula
     * @return User
     * @throws NotFoundError Caso não encontre o usuário
     */
    public static function findByMatricula($matricula);

    /**
     * Retorna o primeiro usuário com o nome informado.
     * @param string $nome
     * @return User
     * @throws NotFoundError Caso não encontre o usuário
     */
    public static function findByNome($nome);

    /**
     * Verifica se a senha para o usuário com a id informada é válida ou não.
     * @param int    $id
     * @param string $password
     * @return boolean
     */
    public static function isPasswordValid($id, $password);

    /**
     * Atualiza dados do usuário com a id informada.
     * @param array $data
     * @param int   $id
     * @return User
     */
    public static function updateById(array $data, $id);
}
