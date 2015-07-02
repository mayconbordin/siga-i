<?php namespace App\Services;

use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Services\Contracts\OwnershipResolverContract;
use App\Services\Contracts\User;
use Illuminate\Routing\Route;

class OwnershipResolver implements OwnershipResolverContract
{
    protected $turmaRepository;
    protected $professorTurmaPermissions = [
        'edit-own-turma',
        'view-own-turma',

        'view-own-aula',
        'edit-own-aula',
        'create-own-aula',
        'delete-own-aula',
        'list-own-aulas',

        'view-own-controle-faltas',

        'export-own-diario',
        'send-own-diario',
        'close-own-diario',

        'view-own-chamada',
        'edit-own-chamada',

        'list-alunos-own-turma',
        'list-professores-own-turma',

    ];
    protected $alunoTurmaPermissions = ['view-own-aula'];


    public function __construct(TurmaRepositoryContract $turmaRepository)
    {
        $this->turmaRepository = $turmaRepository;
    }

    /**
     * Verify if the user has the given permission for the resource.
     *
     * @param  string $permission
     * @param  \App\Models\User $user
     * @param  Route $route
     * @return bool
     */
    public function hasOwnership($permission, $user, Route $route)
    {
        $isOwner = false;

        if (in_array($permission, $this->professorTurmaPermissions)) {
            $isOwner = $this->turmaRepository->hasProfessor($route->getParameter("turmaId"), $user->id);
        }

        if ($isOwner === true) return true;

        if (in_array($permission, $this->alunoTurmaPermissions)) {
            $isOwner =  $this->turmaRepository->hasAluno($route->getParameter("turmaId"), $user->id);
        }

        return $isOwner;
    }
}