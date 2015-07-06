<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Models\Curso;
use App\Models\User;

interface CursoRepositoryContract
{
    /**
     * Retorna o curso com a id informada.
     * @param int $id
     * @return Curso
     * @throws NotFoundError Caso não encontre o curso
     */
    public function findById($id);

    /**
     * Retorna o curso com o nome exatamente igual ao informado.
     * @param string $nome
     * @return Curso
     * @throws NotFoundError Caso não encontre o curso
     */
    public function findByNome($nome);

    /**
     * Retorna lista de cursos cujo nome comece com a query informada.
     * @param string $query
     * @return array
     */
    public function searchByName($query);

    /**
     * Retorna lista com todos os cursos existentes.
     * @return array
     */
    public function listAll();

    /**
     * Retorna lista de cursos com paginação, ordenando por padrão pelo nome do curso, com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    public function paginate($orderBy = 'nome', $perPage = 10);

    /**
     * Atualiza o curso com a id informada com os dados passados pelo array de dados.
     * @param array $data
     * @param int   $id
     * @param User  $coordenador
     * @return Curso
     * @throws ServerError Caso não consiga salvar os dados do curso
     */
    public function update(array $data, $id, User $coordenador);

    /**
     * Insere um novo curso com os dados informados pelo array.
     * @param array $data
     * @param User  $coordenador
     * @return Curso
     * @throws ServerError Caso não consiga salvar os dados do curso
     */
    public function insert(array $data, User $coordenador = null);

    /**
     * Remove o curso pela id informada.
     * @param int $id
     * @throws NotFoundError Caso não encontre o curso
     */
    public function deleteById($id);
}
