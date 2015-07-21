<?php namespace App\Repositories\Test;

use App\Exceptions\ServerError;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Exceptions\NotFoundError;

use App\Repositories\Contracts\UserRepositoryContract;
use \DB;
use Illuminate\Database\Eloquent\Model;
use \Log;
use \Lang;
use \Hash;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    protected $alunoRepository;
    protected $professorRepository;

    protected $relations = ['roles', 'dispositivos'];

    public function model()
    {
        return 'App\Models\User';
    }

    public function name()
    {
        return Lang::choice('usuarios.title', 1);
    }

    public function findAllByRolePaginated($role, $orderCol = 'nome', $orderDir = 'asc', $perPage = 15, $columns = array('*'))
    {
        $users = $this->model->select('usuarios.*')->with('roles')
            ->join('role_user', 'role_user.user_id', '=', 'usuarios.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.name', $role)
            ->orderBy($orderCol, $orderDir)
            ->paginate($perPage, $columns);

        $this->resetModel();

        return $this->parserResult($users);
    }

    public function findByDispositivo($codigo)
    {
        $model = $this->model->select('usuarios.*')
            ->join('dispositivos AS d', 'd.usuario_id', '=', 'usuarios.id')
            ->where('d.codigo', $codigo)
            ->first();

        if ($model == null) {
            throw new NotFoundError($this->getMessage('not_found'));
        }

        return $model;
    }

    public function transformAttributes(array $attributes)
    {
        $password = array_get($attributes, 'password', null);

        if ($password != null && strlen($password) > 0) {
            array_set($attributes, 'password', Hash::make($password));
        }

        return $attributes;
    }

    protected function deleteRelated(Model $model)
    {
        try {
            $this->getAlunoRepository()->deleteByMatricula($model->matricula);
        } catch (NotFoundError $e) {}

        try {
            $this->getProfessorRepository()->deleteByMatricula($model->matricula);
        } catch (NotFoundError $e) {}

        parent::deleteRelated($model);
    }

    /**
     * @return AlunoRepositoryContract
     */
    public function getAlunoRepository()
    {
        if ($this->alunoRepository == null) {
            $this->alunoRepository = $this->application->make('App\Repositories\Contracts\AlunoRepositoryContract');
        }
        return $this->alunoRepository;
    }

    public function setAlunoRepository(AlunoRepositoryContract $alunoRepository)
    {
        $this->alunoRepository = $alunoRepository;
    }

    /**
     * @return ProfessorRepositoryContract
     */
    public function getProfessorRepository()
    {
        if ($this->professorRepository == null) {
            $this->professorRepository = $this->application->make('App\Repositories\Contracts\ProfessorRepositoryContract');
        }
        return $this->professorRepository;
    }

    public function setTurmaRepository(ProfessorRepositoryContract $professorRepository)
    {
        $this->professorRepository = $professorRepository;
    }
}