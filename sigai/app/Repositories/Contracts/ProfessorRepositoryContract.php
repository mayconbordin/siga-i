<?php namespace App\Repositories\Contracts;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Models\Curso;
use App\Models\Professor;

interface ProfessorRepositoryContract
{
    /**
     * Encontra o professor pela id.
     * @param int $id
     * @return Professor
     * @throws NotFoundError Se não encontrar o professor
     */
    public function findById($id);

    /**
     * Encontra o professor pela id, juntamente com as informações relacionadas a ele.
     * @param int   $id
     * @param array $relations
     * @return Professor
     * @throws NotFoundError Se não encontrar o professor
     */
    public function findByIdWith($id, array $relations);

    /**
     * Encontra o professor pela matrícula.
     * @param string $matricula
     * @return Professor
     * @throws NotFoundError Se não encontrar o professor
     */
    public function findByMatricula($matricula);

    /**
     * Encontra o professor pelo nome.
     * @param string $nome
     * @return Professor
     * @throws NotFoundError Se não encontrar o professor
     */
    public function findByNome($nome);

    /**
     * Retorna lista de professores com nome ou matrícula que correspondam ao valor da query. Se a id da turma for informada,
     * excluí os professores que fazer parte daquela turma.
     * @param string $query
     * @param int    $turmaId
     * @return array
     */
    public function searchByNameAndMatricula($query = null, $turmaId = null);

    /**
     * Pagina a lista de professores, ordenando pelo nome com 10 resultados por página.
     * @param string $orderBy
     * @param int    $perPage
     * @return array
     */
    public function paginate($orderBy = 'usuarios.nome', $perPage = 10);

    /**
     * Insere um novo professor.
     * @param array $data
     * @return Professor
     * @throws ServerError
     */
    public function insert(array $data);

    /**
     * Atualiza o professor com  a matrícula informada.
     * @param array  $data
     * @param string $matricula
     * @return Professor
     * @throws ServerError
     * @throws NotFoundError Se não encontrar o professor
     */
    public function updateByMatricula(array $data, $matricula);

    /**
     * Remove o professor pela matrícula.
     * @param string $matricula
     * @throws ServerError
     * @throws NotFoundError Se não encontrar o professor
     */
    public function deleteByMatricula($matricula);

    /**
     * Desassocia os professores com determinado curso de origem. Os professores passam a ter o curso de origem como nulo.
     * @param Curso $cursoOrigem
     */
    public function dissociateCursoOrigem(Curso $cursoOrigem);
}
