<?php namespace App\Repositories;

use App\Models\Aluno;
use App\Models\Turma;

use App\Repositories\ProfessorRepository;
use App\Repositories\AlunoRepository;
use App\Repositories\UnidadeCurricularRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;
use App\Exceptions\ConflictError;

use \DB;
use \Lang;

use Carbon\Carbon;

class TurmaRepository extends Repository
{

    public static function findById($id, $unidadeCurricularId)
    {
        $turma = Turma::find($id);
	    
	    if ($turma == null) {
	        throw new NotFoundError(Lang::get('turmas.not_found'));
	    }
	    
	    if ($turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $turma;
    }
    
    public static function findByNomeAndData($nome, $dataInicio, $dataFim)
    {
        $turma = Turma::where('nome', $nome)
                      ->where('data_inicio', $dataInicio)
                      ->where('data_fim', $dataFim)
                      ->first();
	    
	    if ($turma == null) {
	        throw new NotFoundError(Lang::get('turmas.not_found'));
	    }
	    
	    return $turma;
    }
    
    public static function findByIdWith($id, $unidadeCurricularId, array $relations)
    {
        $turma = Turma::where('id', $id)->with($relations)->first();
        
        if ($turma == null) {
	        throw new NotFoundError(Lang::get('turmas.not_found'));
	    }
	    
	    if ($turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
	    
	    return $turma;
    }
    
    public static function findByIdWithAll($id, $unidadeCurricularId)
    {
        $turma = Turma::where('id', $id)->with(
            'unidadeCurricular', 'professores',  'professores.usuario', 'aulas',
            'statusDiarios', 'statusDiarios.professor', 'statusDiarios.professor.usuario'
        )->first();
                      
        if ($turma == null) {
	        throw new NotFoundError(Lang::get('turmas.not_found'));
	    }
	    
	    if ($turma->unidade_curricular_id != $unidadeCurricularId) {
	        throw new ValidationError(['unidade_curricular_id' => [Lang::get('turmas.wrong_uc')]]);
	    }
        
        $turma->aulas = $turma->aulas->sortBy(function($aula) {
            return $aula->data;
        });
        
        $turma->alunos = $turma->alunos->sortBy(function($aluno) {
            return $aluno->usuario->nome;
        });
        
        return $turma;
    }
    
    public static function paginate($perPage = 10, $sort = 'turmas.id', $order = 'asc', $search = null)
    {
        $query = Turma::select('turmas.*')
                       ->join('unidades_curriculares as uc', 'uc.id', '=', 'turmas.unidade_curricular_id')
                       ->with('unidadeCurricular', 'professores', 'professores.usuario');
                       
        if ($search != null) {
            $query->where('turmas.nome', 'LIKE', '%'.$search.'%');
        }
                       
        $turmas = $query->orderBy($sort, $order)->paginate($perPage);
                       
        return $turmas;
    }
    
    public static function update(array $data, $ucId, $id)
    {
        $turma = self::findById($id, $ucId);
	    
	    $turma->nome        = self::get($data['nome']);
	    $turma->data_inicio = Carbon::createFromFormat('d/m/Y', self::get($data['data_inicio']));
	    $turma->data_fim    = Carbon::createFromFormat('d/m/Y', self::get($data['data_fim']));
	    
	    if (self::get($data['unidade_curricular_id'], null) != null) {
	        $uc = UnidadeCurricularRepository::findById(self::get($data['unidade_curricular_id']));
	        $turma->unidadeCurricular()->associate($uc);
	    }
	    
	    if (!$turma->save()) {
            throw new ServerError(Lang::get('turmas.save_error'));
        }
        
        return $turma;
    }
    
    public static function insert(array $data, $ucId, $dateFormat = 'd/m/Y')
    {
        $turma = new Turma;
	    $uc    = UnidadeCurricularRepository::findById($ucId);
	    
	    $turma->nome        = self::get($data['nome']);
	    $turma->data_inicio = Carbon::createFromFormat($dateFormat, self::get($data['data_inicio']));
	    $turma->data_fim    = Carbon::createFromFormat($dateFormat, self::get($data['data_fim']));
	    
	    $turma->unidadeCurricular()->associate($uc);

	    if (!$turma->save()) {
            throw new ServerError(Lang::get('turmas.create_error'));
        }
        
        return $turma;
    }
    
    public static function deleteById($id, $unidadeCurricularId)
    {
        $turma = self::findById($id, $unidadeCurricularId);
        
        DB::beginTransaction();
	    
	    try {
	        $turma->aulas()->delete();
	        $turma->statusDiarios()->delete();
	        
	        $turma->alunos()->detach();
	        $turma->professores()->detach();
	        
	        $turma->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        Log::error($e->getMessage(), ['exception' => $e]);
	        throw $e;
	    }
	    
	    DB::commit();
    }
    
    public static function attachAluno(array $data, $ucId, $turmaId, $matricula)
    {
        $turma = self::findById($turmaId, $ucId);
	    $aluno = AlunoRepository::findByMatricula($matricula);
	    
	    if (self::hasAluno($turma->id, $aluno->id)) {
	        throw new ConflictError(Lang::get('turmas.aluno_exists'));
	    }
	    
	    $turma->alunos()->attach($aluno, $data);
	    
	    // pega o aluno com o pivot
	    $aluno = $turma->alunos()->where('id', '=', $aluno->id)->first();
	    
	    return ['turma' => $turma, 'aluno' => $aluno];
    }
    
    public static function detachAluno($ucId, $turmaId, $matricula)
    {
        $turma = self::findById($turmaId, $ucId);
	    $aluno = AlunoRepository::findByMatricula($matricula);
	    
	    $turma->alunos()->detach($aluno);
    }
    
    public static function updateAluno(array $data, $ucId, $turmaId, $matricula)
    {
        $turma = self::findById($turmaId, $ucId);
	    $aluno = AlunoRepository::findByMatricula($matricula);
	    
	    $turma->alunos()->updateExistingPivot($aluno->id, $data);
	    
	    return $aluno;
    }
    
    public static function hasAluno($turmaId, $alunoId)
    {
        return !is_null(
            DB::table('alunos_turmas')
              ->where('aluno_id', $alunoId)
              ->where('turma_id', $turmaId)
              ->first()
        );
    }
    
    public static function attachProfessor($ucId, $turmaId, $matricula)
    {
        $turma     = self::findById($turmaId, $ucId);
	    $professor = ProfessorRepository::findByMatricula($matricula);
	    
	    if (self::hasProfessor($turma->id, $professor->id)) {
	        throw new ConflictError(Lang::get('turmas.professor_exists'));
	    }
	    
	    $turma->professores()->attach($professor);

	    return ['turma' => $turma, 'professor' => $professor];
    }
    
    public static function detachProfessor($ucId, $turmaId, $matricula)
    {
        $turma     = self::findById($turmaId, $ucId);
	    $professor = ProfessorRepository::findByMatricula($matricula);
	    
	    $turma->professores()->detach($professor);
    }
    
    public static function hasProfessor($turmaId, $professorId)
    {
        return !is_null(
            DB::table('professores_turmas')
              ->where('professor_id', $professorId)
              ->where('turma_id', $turmaId)
              ->first()
        );
    }
}
