<?php namespace App\Repositories\Eloquent;

use App\Models\Curso;
use App\Models\User;

use App\Repositories\Contracts\CursoRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use \DB;
use \Lang;
use \Log;

class CursoRepository extends BaseRepository implements CursoRepositoryContract
{
    protected $turmaRepository;
    protected $professorRepository;

    function __construct(TurmaRepositoryContract $turmaRepository, ProfessorRepositoryContract $professorRepository)
    {
        $this->turmaRepository     = $turmaRepository;
        $this->professorRepository = $professorRepository;
    }

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
    
    public function insert(array $data, User $coordenador)
    {
        $curso = new Curso;
	    
	    $curso->nome  = array_get($data, 'nome');
	    $curso->sigla = array_get($data, 'sigla');

        $curso->coordenador()->associate($coordenador);

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
            $this->professorRepository->dissociateCursoOrigem($curso);

            // remove relacionamento entre alunos e turmas com este curso de origem
            $this->turmaRepository->detachAlunosByCursoOrigem($curso);

            $curso->alunos()->detach();
            $curso->unidadesCurriculares()->detach();

            $curso->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServerError(Lang::get('cursos.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }
}
