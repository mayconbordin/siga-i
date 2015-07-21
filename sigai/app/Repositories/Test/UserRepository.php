<?php namespace App\Repositories\Test;

use App\Exceptions\ServerError;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Exceptions\NotFoundError;

use App\Repositories\Contracts\UserRepositoryContract;
use \DB;
use \Log;
use \Lang;
use \Hash;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    protected $alunoRepository;
    protected $professorRepository;

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


    public function create(array $attributes)
    {
        $roles = array_pull($attributes, 'roles', []);
        $model = parent::create($attributes);

        if (!is_array($roles) || array_filter($roles, 'is_numeric') !== $roles) {
            throw ValidationError::withSingleError('roles', Lang::get('tipos_usuario.not_array'));
        }

        $model->roles()->attach($roles);

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $roles = array_pull($attributes, 'roles', []);
        $model = parent::update($attributes, $id);

        if (!is_array($roles) || array_filter($roles, 'is_numeric') !== $roles) {
            throw ValidationError::withSingleError('roles', Lang::get('tipos_usuario.not_array'));
        }

        $model->roles()->detach();
        $model->roles()->attach($roles);

        return $model;
    }

    public function delete($id)
    {
        $user = $this->find($id);

        DB::beginTransaction();

        try {
            try {
                $this->getAlunoRepository()->deleteByMatricula($user->matricula);
            } catch (NotFoundError $e) {}

            try {
                $this->getProfessorRepository()->deleteByMatricula($user->matricula);
            } catch (NotFoundError $e) {}

            $user->dispositivos()->delete();
            $user->roles()->detach();
            $user->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError($this->getMessage('remove_error'));
        }

        DB::commit();
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