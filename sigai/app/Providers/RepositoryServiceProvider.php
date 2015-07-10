<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $entities = [
        "Aluno", "Aula", "Chamada", "Curso", "DiarioEnvio", "Diario", "Professor", "Turma", "UnidadeCurricular", "Usuario",
        "Ambiente", "TipoAmbiente", "OAuthClient", "TipoDispositivo", "DispositivoAluno", "OAuthScope"
    ];

    public function register()
    {
        foreach ($this->entities as $entity) {
            $this->app->bind(
                'App\Repositories\Contracts\\'.$entity.'RepositoryContract',
                'App\Repositories\Eloquent\\'.$entity.'Repository'
            );
        }
    }
}
