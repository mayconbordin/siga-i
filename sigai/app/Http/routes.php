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

// Usuários
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'usuarios'], function()
{
    Route::get('/', ['uses' => 'UsuarioController@listar', 'permissions' => ['view-usuarios-page']]);
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

// Dispositivos
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'dispositivos'], function()
{
    Route::get('/', ['uses' => 'OAuthClientController@listar', 'permissions' => ['view-dispositivos-page']]);
});

// Dispositivos do Usuário
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'dispositivos_usuario'], function()
{
    Route::get('/', ['uses' => 'DispositivoController@listar', 'permissions' => ['view-dispositivos-usuario-page']]);
});

// Tipos de Usuário
// -----------------------------------------------------------------------------
Route::group(['prefix' => 'tipos_usuario'], function()
{
    Route::get('/', ['uses' => 'TipoUsuarioController@listar', 'permissions' => ['view-tipos-usuario-page']]);
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

    Route::group(['prefix' => 'dispositivos'], function()
    {
        Route::get   ('/'              , ['uses' => 'OAuthClientController@listar'         , 'permissions' => ['list-dispositivos']]);
        Route::post  ('/'              , ['uses' => 'OAuthClientController@salvar'         , 'permissions' => ['create-dispositivo']]);
        Route::get   ('/{did}'         , ['uses' => 'OAuthClientController@mostrar'        , 'permissions' => ['view-dispositivo']]);
        Route::put   ('/{did}'         , ['uses' => 'OAuthClientController@editar'         , 'permissions' => ['edit-dispositivo']]);
        Route::put   ('/{did}/ambiente', ['uses' => 'OAuthClientController@editarAmbiente' , 'permissions' => ['edit-dispositivo']]);
        Route::delete('/{did}'         , ['uses' => 'OAuthClientController@deletar'        , 'permissions' => ['delete-dispositivo']]);

        Route::get('/{did}/heartbeats' , ['uses' => 'HeartbeatDispositivoController@listar', 'permissions' => ['list-heartbeats']]);
    });

    Route::group(['prefix' => 'tipos_dispositivo'], function()
    {
        Route::get   ('/'    , ['uses' => 'TipoDispositivoController@listar' , 'permissions' => ['list-tipos-dispositivo']]);
        Route::post  ('/'    , ['uses' => 'TipoDispositivoController@salvar' , 'permissions' => ['create-tipo-dispositivo']]);
        Route::get   ('/{id}', ['uses' => 'TipoDispositivoController@mostrar', 'permissions' => ['view-tipo-dispositivo']]);
        Route::put   ('/{id}', ['uses' => 'TipoDispositivoController@editar' , 'permissions' => ['edit-tipo-dispositivo']]);
        Route::delete('/{id}', ['uses' => 'TipoDispositivoController@deletar', 'permissions' => ['delete-tipo-dispositivo']]);
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

    Route::group(['prefix' => 'usuarios'], function()
    {
        Route::get   ('/'    , ['uses' => 'UsuarioController@listar' , 'permissions' => ['list-usuarios']]);
        Route::post  ('/'    , ['uses' => 'UsuarioController@salvar' , 'permissions' => ['create-usuario']]);
        Route::get   ('/{id}', ['uses' => 'UsuarioController@mostrar', 'permissions' => ['view-usuario']]);
        Route::put   ('/{id}', ['uses' => 'UsuarioController@editar' , 'permissions' => ['edit-usuario']]);
        Route::delete('/{id}', ['uses' => 'UsuarioController@deletar', 'permissions' => ['delete-usuario']]);
    });

    Route::group(['prefix' => 'escopos'], function()
    {
        Route::get('/', ['uses' => 'OAuthScopeController@listar', 'permissions' => ['list-escopos']]);
    });

    Route::group(['prefix' => 'tipos_usuario'], function()
    {
        Route::get   ('/'    , ['uses' => 'TipoUsuarioController@listar' , 'permissions' => ['list-tipos-usuario']]);
        Route::post  ('/'    , ['uses' => 'TipoUsuarioController@salvar' , 'permissions' => ['create-tipo-usuario']]);
        Route::get   ('/{id}', ['uses' => 'TipoUsuarioController@mostrar', 'permissions' => ['view-tipo-usuario']]);
        Route::put   ('/{id}', ['uses' => 'TipoUsuarioController@editar' , 'permissions' => ['edit-tipo-usuario']]);
        Route::delete('/{id}', ['uses' => 'TipoUsuarioController@deletar', 'permissions' => ['delete-tipo-usuario']]);
    });

    Route::group(['prefix' => 'dispositivos_usuario'], function()
    {
        Route::get   ('/'    , ['uses' => 'DispositivoController@listar' , 'permissions' => ['list-dispositivos-usuario']]);
        Route::post  ('/'    , ['uses' => 'DispositivoController@salvar' , 'permissions' => ['create-dispositivo-usuario']]);
        Route::get   ('/{id}', ['uses' => 'DispositivoController@mostrar', 'permissions' => ['view-dispositivo-usuario']]);
        Route::put   ('/{id}', ['uses' => 'DispositivoController@editar' , 'permissions' => ['edit-dispositivo-usuario']]);
        Route::delete('/{id}', ['uses' => 'DispositivoController@deletar', 'permissions' => ['delete-dispositivo-usuario']]);
    });


    Route::post('/chamada', ['uses' => 'ChamadaController@salvar', 'middleware' => 'oauth:write-chamada']);
    Route::get ('/agenda', ['uses' => 'AgendaController@mostrar', 'middleware' => 'oauth:read-agenda']);
    Route::get('/usuario', ['uses' => 'UsuarioController@mostrarOAuthUser', 'middleware' => ['oauth:read-usuarios', 'oauth-owner:user']]);

    // OAuth
    // -----------------------------------------------------------------------------
    Route::group(['prefix' => 'oauth'], function()
    {
        Route::post('access_token', ['uses' => 'OAuthController@issueAccessToken']);
        Route::post('verify', ['uses' => 'OAuthController@verifyAccessToken']);
    });

    // Arduino
    // -----------------------------------------------------------------------------
    Route::post('arduino/config', function() {
        return Response::json([
            'urlOauth'            => 'api/oauth/access_token',
            'urlReport'           => 'api/chamada',
            'readBufferFlushPerc' => config('arduino.readBufferFlushPerc'),
            'reportInterval'      => config('arduino.reportInterval'),
            'reportTimeout'       => config('arduino.reportTimeout'),
            'bootstrapTimeout'    => config('arduino.bootstrapTimeout')
        ]);
    });

});

// Controllers
// -----------------------------------------------------------------------------
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
