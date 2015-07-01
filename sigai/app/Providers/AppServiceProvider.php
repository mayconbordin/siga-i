<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CustomValidator;

use \Validator;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		//$this->app->bind('Illuminate\Contracts\Auth\Registrar', 'App\Services\Registrar');
		
		$this->app->bind('App\Services\Contracts\DiarioServiceContract', 'App\Services\DiarioService');
        $this->app->bind('App\Services\Contracts\UnidadeCurricularServiceContract', 'App\Services\UnidadeCurricularService');
        $this->app->bind('App\Services\Contracts\TurmaServiceContract', 'App\Services\TurmaService');
        $this->app->bind('App\Services\Contracts\ProfessorServiceContract', 'App\Services\ProfessorService');
        $this->app->bind('App\Services\Contracts\CursoServiceContract', 'App\Services\CursoService');
        $this->app->bind('App\Services\Contracts\AlunoServiceContract', 'App\Services\AlunoService');
        $this->app->bind('App\Services\Contracts\AulaServiceContract', 'App\Services\AulaService');
        $this->app->bind('App\Services\Contracts\UsuarioServiceContract', 'App\Services\UsuarioService');
        $this->app->bind('App\Services\Contracts\AmbienteServiceContract', 'App\Services\AmbienteService');
        $this->app->bind('App\Services\Contracts\ChamadaServiceContract', 'App\Services\ChamadaService');
	}

}
