<?php namespace App\Repositories\Eloquent;

use App\Models\Curso;
use App\Models\UnidadeCurricular;

use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\UnidadeCurricularRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;

class UnidadeCurricularRepository extends BaseRepository implements UnidadeCurricularRepositoryContract
{
    protected $turmaRepository;

    public function findById($id)
    {
        $uc = UnidadeCurricular::find($id);
	    
	    if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public function findByIdWith($id, array $relations)
    {
        $uc = UnidadeCurricular::where('id', $id)->with($relations)->first();
        
        if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public function findByNome($nome)
    {
        $uc = UnidadeCurricular::where('nome', $nome)->first();
	    
	    if ($uc == null) {
	        throw new NotFoundError(Lang::get('unidades_curriculares.not_found'));
	    }

	    return $uc;
    }
    
    public function listAll()
    {
        return UnidadeCurricular::all();
    }
    
    public function paginate($perPage = 10)
    {
        return UnidadeCurricular::paginate($perPage);
    }
    
    public function paginateWith(array $relations, $perPage = 10)
    {
        return UnidadeCurricular::with($relations)->paginate($perPage);
    }
    
    public function attachCurso($id, Curso $curso)
    {
        $uc = self::findById($id);
	    $uc->cursos()->attach($curso);
	    
	    return $curso;
    }
    
    public function detachCurso($id, Curso $curso)
    {
        $uc = self::findById($id);
	    $uc->cursos()->detach($curso);
    }
    
    public function insert(array $data)
    {
        $uc = new UnidadeCurricular;
        
        $uc->nome          = array_get($data, 'nome');
	    $uc->sigla         = array_get($data, 'sigla');
	    $uc->carga_horaria = array_get($data, 'carga_horaria');
	    
	    if (!$uc->save()) {
	        throw new ServerError(Lang::get('unidades_curriculares.create_error'));
	    }
	    
	    return $uc;
    }
    
    public function update(array $data, $id)
    {
        $uc = self::findById($id);
        
        $uc->nome          = array_get($data, 'nome');
	    $uc->sigla         = array_get($data, 'sigla');
	    $uc->carga_horaria = array_get($data, 'carga_horaria');
	    
	    if (!$uc->save()) {
	        throw new ServerError(Lang::get('unidades_curriculares.save_error'));
	    }
	    
	    return $uc;
    }

    public function deleteById($id)
    {
        $uc = self::findById($id);

        DB::beginTransaction();

	    try {
	        foreach ($uc->turmas as $turma) {
                $this->turmaRepository->deleteById($turma->id, $id);
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
