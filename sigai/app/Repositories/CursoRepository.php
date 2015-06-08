<?php namespace App\Repositories;

use App\Models\Curso;

use App\Repositories\UsuarioRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;

class CursoRepository extends Repository {

    public static function findById($id)
    {
        $curso = Curso::with('coordenador')->where('id', $id)->first();
	    
	    if ($curso == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $curso;
    }
    
    public static function findByNome($nome)
    {
        $curso = Curso::with('coordenador')->where('nome', $nome)->first();
	    
	    if ($curso == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $curso;
    }
    
    public static function searchByName($query)
    {
        $cursos = Curso::where('nome', 'LIKE', $query.'%')->get();
        return $cursos;
    }
    
    public static function listAll()
    {
        $cursos = Curso::all();
        return $cursos;
    }
    
    public static function paginate($orderBy = 'nome', $perPage = 10)
    {
        $cursos = Curso::with('coordenador')->orderBy($orderBy)->paginate($perPage);
	    return $cursos;
    }

    public static function update(array $data, $id)
    {
        $curso = self::findById($id);
	    
	    $curso->nome  = array_get($data, 'nome');
	    $curso->sigla = array_get($data, 'sigla');
	    
	    $coordenador = UsuarioRepository::findByMatricula(array_get($data, 'coordenador_matricula'));
	    $curso->coordenador()->associate($coordenador);

	    if (!$curso->save()) {
            throw new ServerError(Lang::get('cursos.save_error'));
        }
        
        return $curso;
    }
    
    public static function insert(array $data)
    {
        $curso = new Curso;
	    
	    $curso->nome  = array_get($data, 'nome');
	    $curso->sigla = array_get($data, 'sigla');
	    
	    $coordenador = UsuarioRepository::findByMatricula(array_get($data, 'coordenador_matricula'));
	    $curso->coordenador()->associate($coordenador);

	    if (!$curso->save()) {
            throw new ServerError(Lang::get('cursos.create_error'));
        }
        
        return $curso;
    }
    
    public static function deleteById($id)
    {
        $curso = self::findById($id);
        
        DB::beginTransaction();
	    
	    try {
	        $curso->alunos()->detach();
	        $curso->unidadesCurriculares()->detach();
	        
	        $curso->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        throw new ServerError(Lang::get('cursos.remove_error'));
	    }
	    
	    DB::commit();
    }
}
