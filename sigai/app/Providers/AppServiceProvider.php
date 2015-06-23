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
		$this->app->bind('Illuminate\Contracts\Auth\Registrar', 'App\Services\Registrar');
		
		$this->app->bind('App\Services\Contracts\DiarioServiceContract', 'App\Services\DiarioService');
	}

}
