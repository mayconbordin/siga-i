<?php namespace App\Repositories;

use App\Models\UnidadeCurricular;

use App\Repositories\CursoRepository;
use App\Repositories\TurmaRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;

class UnidadeCurricularRepository extends Repository {

    public static function findById($id)
    {
        $uc = UnidadeCurricular::find($id);
	    
	    if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public static function findByIdWith($id, array $relations)
    {
        $uc = UnidadeCurricular::where('id', $id)->with($relations)->first();
        
        if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public static function findByNome($nome)
    {
        $uc = UnidadeCurricular::where('nome', $nome)->first();
	    
	    if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public static function listAll()
    {
        return UnidadeCurricular::all();
    }
    
    public static function paginate($perPage = 10)
    {
        return UnidadeCurricular::paginate($perPage);
    }
    
    public static function paginateWith(array $relations, $perPage = 10)
    {
        return UnidadeCurricular::with($relations)->paginate($perPage);
    }
    
    public static function attachCurso($id, $cursoId)
    {
        $uc    = self::findById($id);
	    $curso = CursoRepository::findById($cursoId);

	    $uc->cursos()->attach($curso);
	    
	    return $curso;
    }
    
    public static function detachCurso($id, $cursoId)
    {
        $uc    = self::findById($id);
	    $curso = CursoRepository::findById($cursoId);
	    
	    $uc->cursos()->detach($curso);
    }
    
    public static function insert(array $data)
    {
        $uc = new UnidadeCurricular;
        
        $uc->nome          = self::get($data['nome']);
	    $uc->sigla         = self::get($data['sigla']);
	    $uc->carga_horaria = self::get($data['carga_horaria']);
	    
	    if (!$uc->save()) {
	        throw new ServerError(Lang::get('unidades_curriculares.create_error'));
	    }
	    
	    return $uc;
    }
    
    public static function update(array $data, $id)
    {
        $uc = self::findById($id);
        
        $uc->nome          = self::get($data['nome']);
	    $uc->sigla         = self::get($data['sigla']);
	    $uc->carga_horaria = self::get($data['carga_horaria']);
	    
	    if (!$uc->save()) {
	        throw new ServerError(Lang::get('unidades_curriculares.save_error'));
	    }
	    
	    return $uc;
    }
    
    public static function deleteById($id)
    {
        $uc = self::findById($id);
        
        DB::beginTransaction();
	    
	    try {
	        foreach ($uc->turmas as $turma) {
	            TurmaRepository::deleteById($turma->id, $id);
	        }

	        $uc->cursos()->detach();
	        $uc->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        throw new ServerError(Lang::get('unidades_curriculares.remove_error'));
	    }
	    
	    DB::commit();
    }
}
