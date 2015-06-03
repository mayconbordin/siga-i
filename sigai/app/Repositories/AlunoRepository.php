<?php namespace App\Repositories;

use App\Models\Aluno;
use App\Models\User;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Hash;

class AlunoRepository extends Repository {

    public static function findByMatricula($matricula)
    {
        $aluno = Aluno::join('usuarios', 'alunos.id', '=', 'usuarios.id')
                      ->where('usuarios.matricula', $matricula)->first();
                      
        if ($aluno == null) {
	        throw new NotFoundError(Lang::get('alunos.not_found'));
	    }
        
        return $aluno;
    }
    
    public static function findByMatriculaWith($matricula, array $relations)
    {
        $aluno = Aluno::join('usuarios', 'alunos.id', '=', 'usuarios.id')
                      ->where('usuarios.matricula', $matricula)
                      ->with($relations)->first();
                      
        if ($aluno == null) {
	        throw new NotFoundError(Lang::get('alunos.not_found'));
	    }
        
        return $aluno;
    }
    
    public static function searchByNameAndMatricula($query = null, $turmaId = null)
    {
        $q = Aluno::join('usuarios', 'alunos.id', '=', 'usuarios.id');
        
        if (!empty($turmaId)) {
            $q->whereNotIn('alunos.id', function($query) {
                $query->select('aluno_id')
                      ->from('alunos_turmas')
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
        $alunos = Aluno::join('usuarios', 'alunos.id', '=', 'usuarios.id')
	                   ->orderBy($orderBy)->paginate($perPage);
	    return $alunos;
    }
    
    public static function findByTurmaWithPivot($turmaId)
    {
        $alunos = Aluno::select('alunos.*', 'usuarios.*', 'alunos_turmas.status', 
                                'cursos.id as curso_origem_id', 'cursos.nome as curso_origem_nome',
                                'cursos.sigla as curso_origem_sigla')
                       ->join('alunos_turmas', 'alunos.id', '=', 'alunos_turmas.aluno_id')
                       ->join('usuarios', 'usuarios.id', '=', 'alunos.id')
                       ->join('turmas', 'turmas.id', '=', 'alunos_turmas.turma_id')
                       ->join('cursos', 'cursos.id', '=', 'alunos_turmas.curso_origem_id')
                       ->where('turmas.id', $turmaId)
                       ->get();
                       
        return $alunos;
    }
    
    
    public static function findByAulaWithChamada($turmaId, $aulaId)
    {
        $alunos = Aluno::join('usuarios', 'alunos.id', '=', 'usuarios.id')
                       ->join('alunos_turmas', function($join) use ($turmaId) {
                           $join->on('alunos.id', '=', 'alunos_turmas.aluno_id')
                                ->where('alunos_turmas.turma_id', '=', $turmaId);
                       })
                       ->leftJoin('chamadas', function($join) use ($aulaId) {
                            $join->on('alunos.id', '=', 'chamadas.aluno_id')
                                 ->where('chamadas.aula_id', '=', $aulaId);
                        })

	                   ->orderBy('usuarios.nome')->get();
	                   
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
            throw new ServerError(Lang::get('alunos.create_error'));
        }
       
        $aluno = new Aluno();
        $aluno->id = $usuario->id;

        if (!$aluno->save()) {
            throw new ServerError(Lang::get('alunos.create_error'));
        }
        
        $aluno->usuario = $usuario;
        $aluno->id = $usuario->id;
        
        return $aluno;
    }
    
    public static function updateByMatricula(array $data, $matricula)
    {
        $aluno = self::findByMatricula($matricula);

        $aluno->usuario->matricula = $data['matricula'];
        $aluno->usuario->nome      = $data['nome'];
        $aluno->usuario->email     = $data['email'];
        
        if (isset($data['password']) && strlen($data['password']) > 0) {
            $aluno->usuario->password = Hash::make($data['password']);
        }

        if (!$aluno->usuario->save()) {
            throw new ServerError(Lang::get('alunos.create_error'));
        }

        if (!$aluno->save()) {
            throw new ServerError(Lang::get('alunos.create_error'));
        }
        
        return $aluno;
    }
    
    public static function deleteByMatricula($matricula)
    {
        $aluno   = self::findByMatricula($matricula);
        $usuario = $aluno->usuario;
        
        DB::beginTransaction();
	    
	    try {
	        $aluno->cursos()->detach();
	        $aluno->turmas()->detach();
	        $aluno->chamadas()->delete();
	        $aluno->delete();
	        $usuario->delete();
	    } catch (\Exception $e) {
	        DB::rollback();
	        throw new ServerError(Lang::get('alunos.remove_error'));
	    }
	    
	    DB::commit();
    }
}
