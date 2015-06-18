<?php namespace App\Repositories\Contracts;

use App\Models\Curso;

interface ProfessorRepositoryContract
{
    public static function findById($id);
    
    public static function findByIdWith($id, array $relations);
    
    public static function findByMatricula($matricula);
    
    public static function findByNome($nome);
    
    public static function searchByNameAndMatricula($query = null, $turmaId = null);
    
    public static function paginate($orderBy = 'usuarios.nome', $perPage = 10);
    
    public static function insert(array $data);
    
    public static function updateByMatricula(array $data, $matricula);
    
    public static function deleteByMatricula($matricula);

    public function dissociateCursoOrigem(Curso $cursoOrigem);
}
