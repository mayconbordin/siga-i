<?php namespace App\Repositories\Eloquent;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\Ambiente;
use App\Models\UnidadeCurricular;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;
use App\Exceptions\ConflictError;

use App\Repositories\Contracts\TurmaRepositoryContract;

use \DB;
use \Lang;
use \Log;
use \App;

use Carbon\Carbon;

class TurmaRepository extends BaseRepository implements TurmaRepositoryContract
{
    public function findById($id, $unidadeCurricularId)
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
    
    public function findByNomeAndData($nome, Carbon $dataInicio, Carbon $dataFim)
    {
        $turma = Turma::where('nome', $nome)
                      ->where('data_inicio', $dataInicio->format('Y-m-d'))
                      ->where('data_fim', $dataFim->format('Y-m-d'))
                      ->first();
	    
	    if ($turma == null) {
	        throw new NotFoundError(Lang::get('turmas.not_found'));
	    }
	    
	    return $turma;
    }
    
    public function findByIdWith($id, $unidadeCurricularId, array $relations)
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
    
    public function findByIdWithAll($id, $unidadeCurricularId)
    {
        $turma = Turma::where('id', $id)->with(
            'unidadeCurricular', 'professores',  'professores.usuario', 'aulas'
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
    
    public function search($perPage = 10, $sort = 'turmas.id', $order = 'asc', $search = null, $field = null)
    {
        $query = Turma::distinct()->select('turmas.*')
                       ->join('unidades_curriculares as uc', 'uc.id', '=', 'turmas.unidade_curricular_id')
                       ->with('unidadeCurricular', 'professores', 'professores.usuario');
                       
        if ($search != null) {
            if ($field == 'nome') {
                $query->where('turmas.nome', 'LIKE', '%'.$search.'%');
            }
                            
            if ($field == 'data_inicio' || $field == 'data_fim') {
                if (strlen($search) == 4)
                    $mask = '%Y';
                else if (strlen($search) == 7)
                    $mask = '%Y-%m';
                else if (strlen($search) == 10)
                    $mask = '%Y-%m-%d';
                    
                if (isset($mask))
                    $query->whereRaw("DATE_FORMAT(turmas.$field, '$mask') = '$search'");
            }
            
            if ($field == 'unidade_curricular') {
                $query->where('uc.nome', 'LIKE', '%'.$search.'%');
            }
            
            if ($field == 'professores') {
                $query->join('professores_turmas as pt', 'pt.turma_id', '=', 'turmas.id')
                      ->join('usuarios as uu', 'uu.id', '=', 'pt.professor_id')
                      ->where('uu.nome', 'LIKE', '%'.$search.'%');
            }
        }
                       
        $turmas = $query->orderBy($sort, $order)->paginate($perPage);
                       
        return $turmas;
    }
    
    public function update(array $data, $ucId, $id)
    {
        $turma = self::findById($id, $ucId);

        $dataInicio = array_get($data, 'data_inicio', $turma->data_inicio);
        $dataFim    = array_get($data, 'data_fim', $turma->data_fim);
        $horaInicio = array_get($data, 'horario_inicio', $turma->horario_inicio);
        $horaFim    = array_get($data, 'horario_fim', $turma->horario_fim);

        if (!($dataInicio instanceof Carbon) || !($dataFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Datas devem ser do tipo Carbon");
        }

        if (!($horaInicio instanceof Carbon) || !($horaFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Horários devem ser do tipo Carbon");
        }
	    
	    $turma->nome           = array_get($data, 'nome', $turma->nome);
	    $turma->data_inicio    = $dataInicio;
	    $turma->data_fim       = $dataFim;
        $turma->horario_inicio = $horaInicio;
        $turma->horario_fim    = $horaFim;
	    
	    if (isset($data['unidade_curricular']) && $data['unidade_curricular'] instanceof UnidadeCurricular) {
	        $turma->unidadeCurricular()->associate($data['unidade_curricular']);
	    }

        if (isset($data['ambiente']) && $data['ambiente'] instanceof Ambiente) {
            $turma->ambienteDefault()->associate($data['ambiente']);
        }
	    
	    if (!$turma->save()) {
            throw new ServerError(Lang::get('turmas.save_error'));
        }
        
        return $turma;
    }
    
    public function insert(array $data, UnidadeCurricular $uc)
    {
        $dataInicio = array_get($data, 'data_inicio');
        $dataFim    = array_get($data, 'data_fim');
        $horaInicio = array_get($data, 'horario_inicio');
        $horaFim    = array_get($data, 'horario_fim');

        if (!($dataInicio instanceof Carbon) || !($dataFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Datas devem ser do tipo Carbon");
        }

        if (!($horaInicio instanceof Carbon) || !($horaFim instanceof Carbon)) {
            throw new \InvalidArgumentException("Horários devem ser do tipo Carbon");
        }

        $turma = new Turma;

	    $turma->nome           = array_get($data, 'nome');
        $turma->data_inicio    = $dataInicio;
        $turma->data_fim       = $dataFim;
        $turma->horario_inicio = $horaInicio;
        $turma->horario_fim    = $horaFim;
	    
	    $turma->unidadeCurricular()->associate($uc);

        if (isset($data['ambiente']) && $data['ambiente'] instanceof Ambiente) {
            $turma->ambienteDefault()->associate($data['ambiente']);
        }

	    if (!$turma->save()) {
            throw new ServerError(Lang::get('turmas.create_error'));
        }
        
        return $turma;
    }
    
    public function deleteById($id, $unidadeCurricularId)
    {
        $turma = self::findById($id, $unidadeCurricularId);
        
        DB::beginTransaction();
	    
	    try {
	        foreach ($turma->aulas as $aula) {
	            $aula->chamadas()->delete();
	        }
	        
	        $turma->aulas()->delete();
	        
	        $turma->statusDiarios()->delete();
	        
	        $turma->alunos()->detach();
	        $turma->professores()->detach();
	        
	        $turma->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
	        throw $e;
	    }
	    
	    DB::commit();
    }
    
    public function attachAluno(array $data, $ucId, $turmaId, Aluno $aluno)
    {
        $turma = self::findById($turmaId, $ucId);
	    
	    if (self::hasAluno($turma->id, $aluno->id)) {
	        throw new ConflictError(Lang::get('turmas.aluno_exists'));
	    }
	    
	    $turma->alunos()->attach($aluno, $data);
	    
	    // pega o aluno com o pivot
	    $aluno = $turma->alunos()->where('id', '=', $aluno->id)->first();
	    
	    return ['turma' => $turma, 'aluno' => $aluno];
    }
    
    public function detachAluno($ucId, $turmaId, Aluno $aluno)
    {
        $turma = self::findById($turmaId, $ucId);
	    
	    $turma->alunos()->detach($aluno);
    }
    
    public function updateAluno(array $data, $ucId, $turmaId, Aluno $aluno)
    {
        $turma = self::findById($turmaId, $ucId);
	    
	    $turma->alunos()->updateExistingPivot($aluno->id, $data);

        // pega o aluno com o pivot
        $aluno = $turma->alunos()->where('id', '=', $aluno->id)->first();
	    
	    return $aluno;
    }

    public function detachAlunosByCursoOrigem(Curso $cursoOrigem)
    {
        DB::table('alunos_turmas')
            ->where('curso_origem_id', $cursoOrigem->id)
            ->delete();
    }
    
    public function hasAluno($turmaId, $alunoId)
    {
        return !is_null(
            DB::table('alunos_turmas')
              ->where('aluno_id', $alunoId)
              ->where('turma_id', $turmaId)
              ->first()
        );
    }
    
    public function attachProfessor($ucId, $turmaId, Professor $professor)
    {
        $turma = self::findById($turmaId, $ucId);
	    
	    if (self::hasProfessor($turma->id, $professor->id)) {
	        throw new ConflictError(Lang::get('turmas.professor_exists'));
	    }
	    
	    $turma->professores()->attach($professor);

	    return ['turma' => $turma, 'professor' => $professor];
    }
    
    public function detachProfessor($ucId, $turmaId, Professor $professor)
    {
        $turma = self::findById($turmaId, $ucId);
	    $turma->professores()->detach($professor);
    }
    
    public function hasProfessor($turmaId, $professorId)
    {
        return !is_null(
            DB::table('professores_turmas')
              ->where('professor_id', $professorId)
              ->where('turma_id', $turmaId)
              ->first()
        );
    }

    public function dissociateAmbiente(Ambiente $ambiente)
    {
        $turmas = Turma::where('ambiente_default_id', $ambiente->id)->get();

        foreach ($turmas as $turma) {
            $turma->ambienteDefault()->dissociate();
            $turma->save();
        }
    }
}
