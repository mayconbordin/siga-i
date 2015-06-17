<?php namespace App\Repositories\Eloquent;

use App\Models\Professor;
use App\Models\User;

use App\Repositories\Contracts\ProfessorRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Hash;

class ProfessorRepository extends BaseRepository implements ProfessorRepositoryContract
{
    public static function findById($id)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.id', $id)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public static function findByIdWith($id, array $relations)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.id', $id)
                              ->with($relations)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public static function findByMatricula($matricula)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.matricula', $matricula)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public static function findByNome($nome)
    {
        $professor = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id')
                              ->where('usuarios.nome', $nome)->first();
                      
        if ($professor == null) {
	        throw new NotFoundError(Lang::get('professores.not_found'));
	    }
	    
        return $professor;
    }
    
    public static function searchByNameAndMatricula($query = null, $turmaId = null)
    {
        $q = Professor::join('usuarios', 'professores.id', '=', 'usuarios.id');
        
        if (!empty($turmaId)) {
            $q->whereNotIn('professores.id', function($query) {
                $query->select('professor_id')
                      ->from('professores_turmas')
                      ->where('turma_id', 2);
            });
        }
                        
        if (!empty($query)) {
            $q->where('usuarios.nome', 'LIKE', $query.'%')
	          ->orWhere('usuarios.matricula', 'LIKE', $query.'%');
        }
              
        return $q->get();
    }
    
    public static function paginate($orderBy = 'usuarios.nome', $perPage = 10)
    {
        $alunos = Professor::with('cursoOrigem')
                           ->join('usuarios', 'professores.id', '=', 'usuarios.id')
	                       ->orderBy($orderBy)->paginate($perPage);
	    return $alunos;
    }
    
    public static function insert(array $data)
    {
        $usuario = new User;
        $usuario->matricula = $data['matricula'];
        $usuario->nome      = $data['nome'];
        $usuario->email     = $data['email'];
        $usuario->password  = Hash::make($data['password']);

        if (!$usuario->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
       
        $professor = new Professor();
        $professor->id = $usuario->id;
        
        $curso = CursoRepository::findById($data['curso_origem_id']);
        $professor->cursoOrigem()->associate($curso);
       
        if (!$professor->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
        
        $professor->cursoOrigem = $curso;
        $professor->usuario = $usuario;
        
        return $professor;
    }
    
    public static function updateByMatricula(array $data, $matricula)
    {
        $professor = self::findByMatricula($matricula);

        $professor->usuario->matricula = $data['matricula'];
        $professor->usuario->nome      = $data['nome'];
        $professor->usuario->email     = $data['email'];
        
        if (isset($data['password']) && strlen($data['password']) > 0) {
            $professor->usuario->password = Hash::make($data['password']);
        }

        if (!$professor->usuario->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }

        $professor->cursoOrigem()->associate(
            CursoRepository::findById($data['curso_origem_id']));
       
        if (!$professor->save()) {
            throw new ServerError(Lang::get('professores.create_error'));
        }
        
        return $professor;
    }
    
    public static function deleteByMatricula($matricula)
    {
        $professor = self::findByMatricula($matricula);
        $usuario   = $professor->usuario;
        
        DB::beginTransaction();
	    
	    try {
	        $professor->statusDiarios()->delete();
	        $professor->turmas()->detach();
	        $professor->delete();
	        $usuario->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        throw new ServerError(Lang::get('professores.remove_error'));
	    }
	    
	    DB::commit();
    }
}
