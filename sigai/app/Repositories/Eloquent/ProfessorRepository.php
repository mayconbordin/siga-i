<?php namespace App\Repositories\Eloquent;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\User;

use App\Repositories\Contracts\CursoRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Hash;
use \Log;

class ProfessorRepository extends BaseRepository implements ProfessorRepositoryContract
{
    public function findById($id)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.id', $id)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public function findByIdWith($id, array $relations)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.id', $id)
                              ->with($relations)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public function findByMatricula($matricula)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.matricula', $matricula)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public function findByNome($nome)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.nome', $nome)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public function searchByNameAndMatricula($query = null, $turmaId = null)
    {
        $q = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id');
        
        if (!empty($turmaId)) {
            $q->whereNotIn('professores.id', function($query) use ($turmaId) {
                $query->select('professor_id')
                      ->from('professores_turmas')
                      ->where('turma_id', $turmaId);
            });
        }
                        
        if (!empty($query)) {
            $q->where('usuarios.nome', 'LIKE', $query.'%')
	          ->orWhere('usuarios.matricula', 'LIKE', $query.'%');
        }
              
        return $q->get();
    }
    
    public function paginate($orderBy = 'usuarios.nome', $perPage = 10)
    {
        $alunos = Professor::with('cursoOrigem')
                           ->join('usuarios', 'professores.id', '=', 'usuarios.id')
	                       ->orderBy($orderBy)->paginate($perPage);
	    return $alunos;
    }

    public function insert(array $data)
    {
        $usuario = new User;
        $usuario->matricula = $data['matricula'];
        $usuario->nome      = $data['nome'];
        $usuario->email     = $data['email'];
        $usuario->password  = Hash::make($data['password']);

        if (!$usuario->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
       
        $professor = new Professor;
        $professor->id = $usuario->id;

        if (isset($data['curso_origem'])) {
            $professor->cursoOrigem()->associate($data['curso_origem']);
        }

        if (!$professor->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
        
        $professor->usuario = $usuario;
        $professor->id = $usuario->id;
        
        return $professor;
    }
    
    public function updateByMatricula(array $data, $matricula)
    {
        $professor = self::findByMatricula($matricula);

        $professor->usuario->matricula = array_get($data, 'matricula');
        $professor->usuario->nome      = array_get($data, 'nome');
        $professor->usuario->email     = array_get($data, 'email');
        
        if (isset($data['password']) && strlen($data['password']) > 0) {
            $professor->usuario->password = Hash::make($data['password']);
        }

        if (!$professor->usuario->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }

        if (isset($data['curso_origem'])) {
            $professor->cursoOrigem()->associate($data['curso_origem']);
        }
       
        if (!$professor->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
        
        return $professor;
    }
    
    public function deleteByMatricula($matricula)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
            ->with('usuario.cursos')
            ->where('usuarios.matricula', $matricula)->first();

        if ($professor == null) {
            throw new NotFoundError(Lang::get('professores.not_found'));
        }
        
        DB::beginTransaction();
	    
	    try {
            foreach ($professor->usuario->cursos as $curso) {
                $curso->coordenador()->dissociate();
                $curso->save();
            }

	        $professor->statusDiarios()->delete();
	        $professor->turmas()->detach();

	        $professor->delete();
            $professor->usuario->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
            Log::error($e->getMessage(), ['context' => $e->getTraceAsString()]);
	        throw new ServerError(Lang::get('professores.remove_error'));
	    }
	    
	    DB::commit();
    }

    public function dissociateCursoOrigem(Curso $cursoOrigem)
    {
        $professores = Professor::where('curso_origem_id', $cursoOrigem->id)->get();

        foreach ($professores as $professor) {
            $professor->cursoOrigem()->dissociate();
            $professor->save();
        }
    }
}
