<?php namespace App\Repositories\Contracts;

use App\Exceptions\ConflictError;
use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;
use App\Exceptions\ValidationError;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\Aluno;
use App\Models\UnidadeCurricular;

use Carbon\Carbon;

interface TurmaRepositoryContract
{
    /**
     * Retorna a turma com a id informada.
     * @param int $id
     * @param int $unidadeCurricularId
     * @return Turma
     * @throws NotFoundError Se não encontrar a turma
     * @throws ValidationError Se a turma não pertencer a unidade curricular informada
     */
    public function findById($id, $unidadeCurricularId);

    /**
     * Retorna a turma com o nome exato e as datas de início e fim.
     * @param string $nome
     * @param Carbon $dataInicio
     * @param Carbon $dataFim
     * @return Turma
     * @throws NotFoundError Se não encontrar a turma
     */
    public function findByNomeAndData($nome, Carbon $dataInicio, Carbon $dataFim);

    /**
     * Retorna a turma com a id informada e os relacionamentos informados.
     * @param int $id
     * @param int $unidadeCurricularId
     * @param array $relations
     * @return Turma
     * @throws NotFoundError Se não encontrar a turma
     * @throws ValidationError Se a turma não pertencer a unidade curricular informada
     */
    public function findByIdWith($id, $unidadeCurricularId, array $relations);

    /**
     * Retorna a turma com a id informada e todos os relacionamentos.
     * @param int $id
     * @param int $unidadeCurricularId
     * @return Turma
     * @throws NotFoundError Se não encontrar a turma
     * @throws ValidationError Se a turma não pertencer a unidade curricular informada
     */
    public function findByIdWithAll($id, $unidadeCurricularId);

    /**
     * Retorna os resultados de busca por turmas.
     * @param int    $perPage Quantidade de resultados por página
     * @param string $sort    Nome do campo para ordenação dos resultados
     * @param string $order   Ordem da ordenação: 'asc' ou 'desc'
     * @param string $search  (Opcional) Valor a ser buscado
     * @param string $field   (Opcional) Campo onde será feita a busca: nome, data_inicio, data_fim, professores ou unidade_curricular
     * @return array
     */
    public function search($perPage = 10, $sort = 'turmas.id', $order = 'asc', $search = null, $field = null);

    /**
     * Atualiza dados da turma com a id informada.
     * @param array $data
     * @param int   $ucId
     * @param int   $id
     * @return Turma
     * @throws NotFoundError Se não encontrar a turma
     * @throws \InvalidArgumentException Se as datas não forem instâncias da classe {@link Carbon}
     * @throws ServerError
     */
    public function update(array $data, $ucId, $id);

    /**
     * Insere a turma.
     * @param array             $data
     * @param UnidadeCurricular $uc
     * @return Turma
     * @throws \InvalidArgumentException Se as datas não forem instâncias da classe {@link Carbon}
     * @throws ServerError
     */
    public function insert(array $data, UnidadeCurricular $uc);

    /**
     * Remove a turma com a id informada.
     * @param int $id
     * @param int $unidadeCurricularId
     * @throws NotFoundError Se não encontrar a turma
     * @throws ServerError
     */
    public function deleteById($id, $unidadeCurricularId);

    /**
     * Associa o aluno a turma.
     * @param array $data
     * @param int   $ucId
     * @param int   $turmaId
     * @param Aluno $aluno
     * @return array Contendo os campos 'turma' e 'aluno'
     * @throws ConflictError Se a associação já existir
     */
    public function attachAluno(array $data, $ucId, $turmaId, Aluno $aluno);

    /**
     * Desassocia o aluno a turma.
     * @param int   $ucId
     * @param int   $turmaId
     * @param Aluno $aluno
     */
    public function detachAluno($ucId, $turmaId, Aluno $aluno);

    /**
     * Atualiza os dados da associação entre aluno e turma.
     * @param array $data
     * @param int   $ucId
     * @param int   $turmaId
     * @param Aluno $aluno
     * @return Aluno
     */
    public function updateAluno(array $data, $ucId, $turmaId, Aluno $aluno);

    /**
     * Desassocia todos os alunos com o curso de origem informado.
     * @param Curso $cursoOrigem
     */
    public function detachAlunosByCursoOrigem(Curso $cursoOrigem);

    /**
     * Verifica se a associação entre aluno e turma existe.
     * @param int $turmaId
     * @param int $alunoId
     * @return boolean
     */
    public function hasAluno($turmaId, $alunoId);

    /**
     * Associa o professor a turma.
     * @param int       $ucId
     * @param int       $turmaId
     * @param Professor $professor
     * @return array Contendo os campos 'turma' e 'professor'
     */
    public function attachProfessor($ucId, $turmaId, Professor $professor);

    /**
     * Desassocia o professor da turma.
     * @param int       $ucId
     * @param int       $turmaId
     * @param Professor $professor
     */
    public function detachProfessor($ucId, $turmaId, Professor $professor);

    /**
     * Verifica se a associação entre professor e turma existe.
     * @param int $turmaId
     * @param int $professorId
     * @return boolean
     */
    public function hasProfessor($turmaId, $professorId);
}
