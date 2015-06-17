<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Models\Aluno;

interface AlunoRepositoryContract
{
    /**
     * Retorna o usuário identificado pela matrícula ou uma exception caso ele não exista.
     * @param string $matricula
     * @return Aluno
     * @throws NotFoundError
     */
    public static function findByMatricula($matricula);

    /**
     * Retorna o usuário identificado pela matrícula junto com as informações relacionadas a ele ou uma exception caso
     * ele não exista.
     * @param string $matricula
     * @param array $relations
     * @return Aluno
     * @throws NotFoundError
     */
    public static function findByMatriculaWith($matricula, array $relations);

    /**
     * Retorna lista de alunos, se a $query for informada, filtra os alunos que tenham o nome ou a matrícula compatíveis
     * com o valor da query. Se for informado $turmaId, remove do resultado os alunos que estão presentes naquela turma.
     * @param string|null $query
     * @param int|null    $turmaId
     * @return array
     */
    public static function searchByNameAndMatricula($query = null, $turmaId = null);

    /**
     * Pagina a lista de usuários, ordenando-os por padrão pelo nome, com 10 resultados por página.
     * @param string $orderBy Nome do campo para ordenação dos resultados
     * @param int    $perPage Número de resultados por página
     * @return array
     */
    public static function paginate($orderBy = 'usuarios.nome', $perPage = 10);

    /**
     * Retorna lista de alunos pertencentes a uma turma, juntamente com os dados do aluno na turma (curso de origem).
     * @param int $turmaId
     * @return array
     */
    public static function findByTurmaWithPivot($turmaId);

    /**
     * Retorna lista de alunos de uma turma, juntamente com a chamada do aluno para uma determinada aula.
     * @param int $turmaId
     * @param int $aulaId
     * @return array
     */
    public static function findByAulaWithChamada($turmaId, $aulaId);

    /**
     * Insere aluno.
     * @param array $data
     * @return Aluno
     * @throws ServerError No caso de ocorrerem erros ao inserir os dados no banco de dados.
     * @throws \ErrorException No caso de estarem faltando dados no array.
     */
    public static function insert(array $data);

    /**
     * Atualiza dados do aluno com a matrícula indicada.
     * @param array  $data
     * @param string $matricula
     * @return Aluno
     * @throws ServerError No caso de ocorrerem erros ao atualizar os dados no banco de dados.
     */
    public static function updateByMatricula(array $data, $matricula);

    /**
     * Remove o aluno, bem como desvíncula-o dos cursos e turmas e remove suas chamadas.
     * @param string $matricula
     * @throws ServerError No caso de ocorrerem erros ao remover o aluno do banco de dados.
     */
    public static function deleteByMatricula($matricula);
}
