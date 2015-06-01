<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');


// teste
//Route::get('/exportar', 'TurmaController@exportar');

// Alunos
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'alunos'], function()
{
    Route::get('/', 'AlunoController@listar');
});

// Professores
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'professores'], function()
{
    Route::get ('/'    , 'ProfessorController@listar');
});


// Cursos
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'cursos'], function()
{
    Route::get ('/'    , 'CursoController@listar');
});


// Unidades Curriculares
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'unidades_curriculares'], function()
{
    Route::group(['roles' => 'coordenador'], function()
    {
        Route::get   (''      , 'UnidadeCurricularController@listar');
        Route::get   ('/'     , 'UnidadeCurricularController@listar');
        Route::post  ('/'     , 'UnidadeCurricularController@salvar');
        Route::get   ('/criar', 'UnidadeCurricularController@criar');
        Route::get   ('/{id}' , 'UnidadeCurricularController@mostrar');
        Route::post  ('/{id}' , 'UnidadeCurricularController@editar');
    });
    
    Route::group(['roles' => 'coordenador', 'permissions' => 'edit-own-turma'], function()
    {
        Route::post  ('/{ucId}/turmas'          , 'TurmaController@salvar');
        Route::get   ('/{ucId}/turmas/{turmaId}', 'TurmaController@mostrar');
        Route::post  ('/{ucId}/turmas/{turmaId}', 'TurmaController@editar');
        Route::get   ('/{ucId}/turmas/{turmaId}/diarios/{month?}', 'TurmaController@exportar');
    });
    
    Route::get   ('/{ucId}/turmas/{turmaId}/aulas/{data}', [
        'uses' => 'AulaController@mostrar',
        'permissions' => 'view-own-aula',
        'roles' => 'coordenador'
    ]);
    Route::post  ('/{ucId}/turmas/{turmaId}/aulas/{data}', [
        'uses' => 'AulaController@editar',
        'permissions' => 'edit-own-aula',
        'roles' => 'coordenador'
    ]);
});


// API
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
{
    Route::group(['prefix' => 'unidades_curriculares'], function()
    {
        Route::group(['roles' => 'coordenador'], function()
        {
            Route::get   ('/',                      'UnidadeCurricularController@listar');
            Route::get   ('/{ucId}',                  'UnidadeCurricularController@mostrar');
            Route::delete('/{ucId}',                  'UnidadeCurricularController@deletar');
        
            // turmas da unidade curricular
            Route::get   ('/{ucId}/turmas',           'UnidadeCurricularController@mostrarTurmas');
            Route::post  ('/{ucId}/turmas',           'TurmaController@salvar');
            
            Route::put   ('/{ucId}/turmas/{turmaId}',    'TurmaController@editar');
            Route::delete('/{ucId}/turmas/{turmaId}',    'TurmaController@deletar');
            
            // alunos da turma
            Route::post  ('/{ucId}/turmas/{turmaId}/alunos/{matricula}', 'TurmaController@vincularAluno');
            Route::put   ('/{ucId}/turmas/{turmaId}/alunos/{matricula}', 'TurmaController@updateAluno');
            Route::delete('/{ucId}/turmas/{turmaId}/alunos/{matricula}', 'TurmaController@desvincularAluno');
            
            // professores da turma
            Route::put   ('/{ucId}/turmas/{turmaId}/professores/{matricula}', 'TurmaController@vincularProfessor');
            Route::delete('/{ucId}/turmas/{turmaId}/professores/{matricula}', 'TurmaController@desvincularProfessor');
            
            // cursos vínculados a unidade curricular
            Route::get   ('/{id}/cursos',           'UnidadeCurricularController@mostrarCursos');
            Route::put   ('/{id}/cursos/{cursoId}', 'UnidadeCurricularController@vincularCurso');
            Route::delete('/{id}/cursos/{cursoId}', 'UnidadeCurricularController@desvincularCurso');
        });
        
        Route::group(['permissions' => ['edit-turma', 'edit-own-turma']], function()
        {
            Route::get   ('/{ucId}/turmas/{turmaId}',    'TurmaController@mostrar');
            
            // aulas da turma
            Route::get   ('/{ucId}/turmas/{turmaId}/aulas'          , 'AulaController@listar');
            Route::post  ('/{ucId}/turmas/{turmaId}/aulas'          , 'AulaController@salvar');
            Route::get   ('/{ucId}/turmas/{turmaId}/aulas/{data}'   , 'AulaController@mostrar');
            Route::put   ('/{ucId}/turmas/{turmaId}/aulas/{data}'   , 'AulaController@editar');
            Route::delete('/{ucId}/turmas/{turmaId}/aulas/{data}'   , 'AulaController@deletar');
            Route::put   ('/{ucId}/turmas/{turmaId}/aulas/{id}/data', 'AulaController@mudarData');
            
            // chamada da aula
            Route::post  ('/{ucId}/turmas/{turmaId}/aulas/{data}/chamada', 'AulaController@salvarChamada');
            
            // diários de classe
            Route::put ('/{ucId}/turmas/{turmaId}/diarios/{month}', 'TurmaController@fecharDiario');
            
            Route::get   ('/{ucId}/turmas/{turmaId}/alunos', 'TurmaController@listarAlunos');
            Route::get   ('/{ucId}/turmas/{turmaId}/professores', 'TurmaController@listarProfessores');
        });
    });
    
    Route::group(['prefix' => 'cursos'], function()
    {
        Route::get   ('/',                      'CursoController@listar');
        Route::get   ('/{id}',                  'CursoController@mostrar');
        
        Route::group(['roles' => 'coordenador'], function()
        {
            Route::post  ('/',                      'CursoController@salvar');
            Route::put   ('/{id}',                  'CursoController@editar');
            Route::delete('/{id}',                  'CursoController@deletar');
        });
    });
    
    Route::group(['prefix' => 'alunos'], function()
    {
        Route::get   ('/'           , 'AlunoController@listar');
        Route::get   ('/{matricula}', 'AlunoController@mostrar');
        
        Route::group(['roles' => 'coordenador'], function()
        {
            Route::post  ('/'           , 'AlunoController@salvar');
            Route::put   ('/{matricula}', 'AlunoController@editar');
            Route::delete('/{matricula}', 'AlunoController@deletar');
        });
    });
    
    Route::group(['prefix' => 'professores'], function()
    {
        Route::get   ('/',                      'ProfessorController@listar');
        Route::get   ('/{matricula}',           'ProfessorController@mostrar');
        
        Route::group(['roles' => 'coordenador'], function()
        {
            Route::post  ('/',                      'ProfessorController@salvar');
            Route::put   ('/{matricula}',           'ProfessorController@editar');
            Route::delete('/{matricula}',           'ProfessorController@deletar');
        });
    });
});

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
