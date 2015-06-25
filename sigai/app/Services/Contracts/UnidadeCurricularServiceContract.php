<?php namespace App\Services\Contracts;


interface UnidadeCurricularServiceContract
{
    public function listAll();
    public function show($id);
    public function delete($id);
    public function listAllTurmas($id);
    public function listAllCursos($id);
    public function attachCurso($id, $cursoId);
    public function detachCurso($id, $cursoId);
}