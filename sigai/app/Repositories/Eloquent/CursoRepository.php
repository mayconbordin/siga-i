<?php namespace App\Repositories\Eloquent;

use App\Models\Curso;
use App\Models\User;

use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Log;
use \App;

class CursoRepository extends BaseRepository implements CursoRepositoryContract
{
    protected $turmaRepository;
    protected $professorRepository;

    public function findById($id)
    {
        $curso = Curso::with('coordenador')->where('id', $id)->first();
	    
	    if ($curso == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $curso;
    }
    
    public function findByNome($nome)
    {
        $curso = Curso::with('coordenador')->where('nome', $nome)->first();
	    
	    if ($curso == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $curso;
    }
    
    public function searchByName($query)
    {
        $cursos = Curso::where('nome', 'LIKE', $query.'%')->get();
        return $cursos;
    }
    
    public function listAll()
    {
        $cursos = Curso::all();
        return $cursos;
    }
    
    public function paginate($orderBy = 'nome', $perPage = 10)
    {
        $cursos = Curso::with('coordenador')->orderBy($orderBy)->paginate($perPage);
	    return $cursos;
    }

    public function update(array $data, $id, User $coordenador)
    {
        $curso = self::findById($id);
	    
	    $curso->nome  = array_get($data, 'nome');
	    $curso->sigla = array_get($data, 'sigla');

        $curso->coordenador()->associate($coordenador);

	    if (!$curso->save()) {
            throw new ServerError(Lang::get('cursos.save_error'));
        }
        
        return $curso;
    }
    
    public function insert(array $data, User $coordenador = null)
    {
        $curso = new Curso;
	    
	    $curso->nome  = array_get($data, 'nome');
	    $curso->sigla = array_get($data, 'sigla');

        if ($coordenador != null) {
            $curso->coordenador()->associate($coordenador);
        }

	    if (!$curso->save()) {
            throw new ServerError(Lang::get('cursos.create_error'));
        }
        
        return $curso;
    }
    
    public function deleteById($id)
    {
        $curso = Curso::where('id', $id)->with('alunos', 'unidadesCurriculares', 'professoresOrigem')->first();

        if ($curso == null) {
            throw new NotFoundError(Lang::get('cursos.not_found'));
        }

        DB::beginTransaction();

        try {
            // disassocia o curso dos professores
            $this->getProfessorRepository()->dissociateCursoOrigem($curso);

            // remove relacionamento entre alunos e turmas com este curso de origem
            $this->getTurmaRepository()->detachAlunosByCursoOrigem($curso);

            $curso->alunos()->detach();
            $curso->unidadesCurriculares()->detach();

            $curso->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('cursos.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }

    public function getTurmaRepository()
    {
        if ($this->turmaRepository == null) {
            $this->turmaRepository = App::getInstance()->make('App\Repositories\Contracts\TurmaRepositoryContract');
        }
        return $this->turmaRepository;
    }

    public function getProfessorRepository()
    {
        if ($this->professorRepository == null) {
            $this->professorRepository = App::getInstance()->make('App\Repositories\Contracts\ProfessorRepositoryContract');
        }
        return $this->professorRepository;
    }

    public function setTurmaRepository(TurmaRepositoryContract $turmaRepository)
    {
        $this->turmaRepository = $turmaRepository;
    }

    public function setProfessorRepository(ProfessorRepositoryContract $professorRepository)
    {
        $this->professorRepository = $professorRepository;
    }
}
