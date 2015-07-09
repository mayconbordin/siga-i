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

// Conta do Usuário Logado
// -----------------------------------------------------------------------------
Route::get ('/conta', 'UsuarioController@index');
Route::post('/conta', 'UsuarioController@salvar');

// Importar
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'importar', 'permissions' => ['import-excel']], function()
{
    Route::get ('/', 'ImportController@index');
    Route::post('/', 'ImportController@processar');
});

// Alunos
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'alunos'], function()
{
    Route::get('/', ['uses' => 'AlunoController@listar', 'permissions' => ['list-alunos']]);
});

// Professores
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'professores'], function()
{
    Route::get ('/', ['uses' => 'ProfessorController@listar', 'permissions' => ['list-professor']]);
});

// Cursos
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'cursos'], function()
{
    Route::get ('/', ['uses' => 'CursoController@listar', 'permissions' => ['list-cursos']]);
});

// Turmas - apenas listagem
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'turmas'], function()
{
    Route::get ('/', ['uses' => 'TurmaController@listar', 'permissions' => ['list-turma']]);
});

// Ambientes
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'ambientes'], function()
{
    Route::get('/', ['uses' => 'AmbienteController@listar', 'permissions' => ['view-ambientes-page']]);
});

// Dispositivos do Ambiente
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'dispositivos_ambientes'], function()
{
    Route::get('/', ['uses' => 'OAuthClientController@listar'/*, 'permissions' => ['view-ambientes-page']*/]);
});



// Unidades Curriculares
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'unidades_curriculares'], function()
{
    Route::get (''      , ['uses' => 'UnidadeCurricularController@listar' , 'permissions' => ['list-unidade-curricular']]);
    Route::post('/'     , ['uses' => 'UnidadeCurricularController@salvar' , 'permissions' => ['create-unidade-curricular']]);
    Route::get ('/criar', ['uses' => 'UnidadeCurricularController@criar'  , 'permissions' => ['create-unidade-curricular']]);
    Route::get ('/{id}' , ['uses' => 'UnidadeCurricularController@mostrar', 'permissions' => ['view-unidade-curricular']]);
    Route::post('/{id}' , ['uses' => 'UnidadeCurricularController@editar' , 'permissions' => ['edit-unidade-curricular']]);

    // Turmas da UC
    Route::group(['prefix' => '{ucId}/turmas'], function()
    {
        Route::post(''          , ['uses' => 'TurmaController@salvar' , 'permissions' => ['create-turma']]);
        Route::get ('/{turmaId}', ['uses' => 'TurmaController@mostrar', 'permissions' => ['view-turma', 'view-own-turma']]);
        Route::post('/{turmaId}', ['uses' => 'TurmaController@editar' , 'permissions' => ['edit-turma', 'edit-own-turma']]);

        // Diários da Turma
        Route::group(['prefix' => '/{turmaId}/diarios'], function() {
            Route::get('/{month?}'           , ['uses' => 'TurmaController@exportar', 'permissions' => ['export-diario', 'export-own-diario']]);
            Route::get('/{month}/envios/{id}', ['uses' => 'TurmaController@verEnvio', 'permissions' => ['send-diario', 'send-own-diario']]);
        });

        // Aulas da Turma
        Route::group(['prefix' => '/{turmaId}/aulas'], function()
        {
            Route::get ('/{data}', ['uses' => 'AulaController@mostrar', 'permissions' => ['view-own-aula', 'view-aula']]);
            Route::post('/{data}', ['uses' => 'AulaController@editar' , 'permissions' => ['edit-own-aula', 'edit-aula']]);
        });
    });
});


// API
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
{
    // Unidades Curriculares
    Route::group(['prefix' => 'unidades_curriculares'], function()
    {
        Route::get   ('/'      , ['uses' => 'UnidadeCurricularController@listar' , 'permissions' => ['list-unidade-curricular']]);
        Route::get   ('/{ucId}', ['uses' => 'UnidadeCurricularController@mostrar', 'permissions' => ['view-unidade-curricular']]);
        Route::delete('/{ucId}', ['uses' => 'UnidadeCurricularController@deletar', 'permissions' => ['delete-unidade-curricular']]);

        // Turmas da UC
        Route::group(['prefix' => '{ucId}/turmas'], function()
        {
            Route::get   ('/'         , ['uses' => 'UnidadeCurricularController@mostrarTurmas', 'permissions' => ['list-turma']]);
            Route::post  ('/'         , ['uses' => 'TurmaController@salvar'                   , 'permissions' => ['create-turma']]);
            Route::get   ('/{turmaId}', ['uses' => 'TurmaController@mostrar'                  , 'permissions' => ['view-turma', 'view-own-turma']]);
            Route::put   ('/{turmaId}', ['uses' => 'TurmaController@editar'                   , 'permissions' => ['edit-turma', 'edit-own-turma']]);
            Route::delete('/{turmaId}', ['uses' => 'TurmaController@deletar'                  , 'permissions' => ['delete-turma']]);

            // Diários da Turma
            Route::group(['prefix' => '/{turmaId}/diarios'], function()
            {
                Route::put ('/{month}'       , ['uses' => 'TurmaController@fecharDiario', 'permissions' => ['close-diario', 'close-own-diario']]);
                Route::post('/{month}/enviar', ['uses' => 'TurmaController@enviarDiario', 'permissions' => ['send-diario', 'send-own-diario']]);
            });

            // Alunos da Turma
            Route::group(['prefix' => '/{turmaId}/alunos'], function()
            {
                Route::get   ('/'           , ['uses' => 'TurmaController@listarAlunos'    , 'permissions' => ['list-alunos-turma', 'list-alunos-own-turma']]);
                Route::post  ('/{matricula}', ['uses' => 'TurmaController@vincularAluno'   , 'permissions' => ['attach-aluno-turma']]);
                Route::put   ('/{matricula}', ['uses' => 'TurmaController@updateAluno'     , 'permissions' => ['update-aluno-turma']]);
                Route::delete('/{matricula}', ['uses' => 'TurmaController@desvincularAluno', 'permissions' => ['detach-aluno-turma']]);
            });

            // Professores da Turma
            Route::group(['prefix' => '/{turmaId}/professores'], function()
            {
                Route::get   ('/'           , ['uses' => 'TurmaController@listarProfessores'   , 'permissions' => ['list-professores-turma', 'list-professores-own-turma']]);
                Route::put   ('/{matricula}', ['uses' => 'TurmaController@vincularProfessor'   , 'permissions' => ['attach-professor-turma']]);
                Route::delete('/{matricula}', ['uses' => 'TurmaController@desvincularProfessor', 'permissions' => ['detach-professor-turma']]);
            });

            // Aulas da Turma
            Route::group(['prefix' => '/{turmaId}/aulas'], function()
            {
                Route::get   ('/'         , ['uses' => 'AulaController@listar'   , 'permissions' => ['list-aula', 'list-own-aulas']]);
                Route::post  ('/'         , ['uses' => 'AulaController@salvar'   , 'permissions' => ['create-aula', 'create-own-aula']]);
                Route::get   ('/{data}'   , ['uses' => 'AulaController@mostrar'  , 'permissions' => ['view-aula', 'view-own-aula']]);
                Route::put   ('/{data}'   , ['uses' => 'AulaController@editar'   , 'permissions' => ['edit-aula', 'edit-own-aula']]);
                Route::delete('/{data}'   , ['uses' => 'AulaController@deletar'  , 'permissions' => ['delete-aula', 'delete-own-aula']]);
                Route::put   ('/{id}/data', ['uses' => 'AulaController@mudarData', 'permissions' => ['edit-aula', 'edit-own-aula']]);

                // chamada da aula
                Route::post  ('/{data}/chamada', ['uses' => 'AulaController@salvarChamada', 'permissions' => ['edit-chamada', 'edit-own-chamada']]);
            });

        });

        // Cursos da UC
        Route::group(['prefix' => '{ucId}/cursos'], function()
        {
            Route::get   ('/'         , ['uses' => 'UnidadeCurricularController@mostrarCursos'   , 'permissions' => ['list-cursos-uc']]);
            Route::put   ('/{cursoId}', ['uses' => 'UnidadeCurricularController@vincularCurso'   , 'permissions' => ['attach-curso-uc']]);
            Route::delete('/{cursoId}', ['uses' => 'UnidadeCurricularController@desvincularCurso', 'permissions' => ['detach-curso-uc']]);
        });

    });

    // Listagem de turmas
    Route::group(['prefix' => 'turmas'], function()
    {
        Route::get('/', ['uses' => 'TurmaController@listar', 'permissions' => ['list-turma']]);
    });

    // Ambientes
    Route::group(['prefix' => 'ambientes'], function()
    {
        Route::get   ('/'    , ['uses' => 'AmbienteController@listar' , 'permissions' => ['list-ambientes']]);
        Route::post  ('/'    , ['uses' => 'AmbienteController@salvar' , 'permissions' => ['create-ambiente']]);
        Route::get   ('/{id}', ['uses' => 'AmbienteController@mostrar', 'permissions' => ['view-ambiente']]);
        Route::put   ('/{id}', ['uses' => 'AmbienteController@editar' , 'permissions' => ['edit-ambiente']]);
        Route::delete('/{id}', ['uses' => 'AmbienteController@deletar', 'permissions' => ['delete-ambiente']]);
    });

    // Tipos Ambientes
    Route::group(['prefix' => 'tipos_ambiente'], function()
    {
        Route::get   ('/'    , ['uses' => 'TipoAmbienteController@listar' , 'permissions' => ['list-tipos-ambiente']]);
        Route::post  ('/'    , ['uses' => 'TipoAmbienteController@salvar' , 'permissions' => ['create-tipo-ambiente']]);
        Route::get   ('/{id}', ['uses' => 'TipoAmbienteController@mostrar', 'permissions' => ['view-tipo-ambiente']]);
        Route::put   ('/{id}', ['uses' => 'TipoAmbienteController@editar' , 'permissions' => ['edit-tipo-ambiente']]);
        Route::delete('/{id}', ['uses' => 'TipoAmbienteController@deletar', 'permissions' => ['delete-tipo-ambiente']]);
    });

    // Cursos
    Route::group(['prefix' => 'cursos'], function()
    {
        Route::get   ('/'    , ['uses' => 'CursoController@listar' , 'permissions' => ['list-cursos']]);
        Route::post  ('/'    , ['uses' => 'CursoController@salvar' , 'permissions' => ['create-curso']]);
        Route::get   ('/{id}', ['uses' => 'CursoController@mostrar', 'permissions' => ['view-curso']]);
        Route::put   ('/{id}', ['uses' => 'CursoController@editar' , 'permissions' => ['edit-curso']]);
        Route::delete('/{id}', ['uses' => 'CursoController@deletar', 'permissions' => ['delete-curso']]);
    });

    Route::group(['prefix' => 'alunos'], function()
    {
        Route::get   ('/'           , ['uses' => 'AlunoController@listar' , 'permissions' => ['list-alunos']]);
        Route::post  ('/'           , ['uses' => 'AlunoController@salvar' , 'permissions' => ['create-aluno']]);
        Route::get   ('/{matricula}', ['uses' => 'AlunoController@mostrar', 'permissions' => ['view-aluno']]);
        Route::put   ('/{matricula}', ['uses' => 'AlunoController@editar' , 'permissions' => ['edit-aluno']]);
        Route::delete('/{matricula}', ['uses' => 'AlunoController@deletar', 'permissions' => ['delete-aluno']]);
    });

    Route::group(['prefix' => 'professores'], function()
    {
        Route::get   ('/'           , ['uses' => 'ProfessorController@listar' , 'permissions' => ['list-professor']]);
        Route::post  ('/'           , ['uses' => 'ProfessorController@salvar' , 'permissions' => ['create-professor']]);
        Route::get   ('/{matricula}', ['uses' => 'ProfessorController@mostrar', 'permissions' => ['view-professor']]);
        Route::put   ('/{matricula}', ['uses' => 'ProfessorController@editar' , 'permissions' => ['edit-professor']]);
        Route::delete('/{matricula}', ['uses' => 'ProfessorController@deletar', 'permissions' => ['delete-professor']]);
    });


    Route::post('/chamada', ['uses' => 'ChamadaController@salvar', 'middleware' => 'oauth:write-chamada']);
    Route::get ('/agenda', ['uses' => 'AgendaController@mostrar'/*, 'middleware' => 'oauth:read-agenda'*/]);
    Route::post('/usuarios/{matricula}/auth', ['uses' => 'UsuarioController@autenticar'/*, 'middleware' => 'oauth:read-usuarios'*/]);

    // OAuth
    // -----------------------------------------------------------------------------
    Route::group(['prefix' => 'oauth'], function()
    {
        Route::post('access_token', function() {
            return Response::json(Authorizer::issueAccessToken());
        });

        Route::get('test', ['middleware' => 'oauth:write-chamada', function() {
            return Response::json(['message' => 'OK']);
        }]);
    });


    // Arduino
    // -----------------------------------------------------------------------------
    Route::post('arduino/config', function() {
        return Response::json([
            'urlOauth'            => 'api/oauth/access_token',
            'urlReport'           => 'api/chamada',
            'readBufferFlushPerc' => 0.8,
            'reportInterval'      => 30000,
            'reportTimeout'       => 5000,
            'bootstrapTimeout'    => 15000
        ]);
    });

    Route::post('arduino/heartbeat', function() {

    });

});

// Controllers
// -----------------------------------------------------------------------------
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
