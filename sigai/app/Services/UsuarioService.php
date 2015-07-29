<?php namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UsuarioRepositoryContract;

use App\Services\Abstracts\CrudService;
use App\Services\Contracts\UsuarioServiceContract;
use App\Repositories\Test\UserRepository as URepo;

use Illuminate\Foundation\Application;

use \Hash;

class UsuarioService extends CrudService implements UsuarioServiceContract
{
    //protected $repository;
    //protected $usuarioRepository;
    protected $with = ['roles'];
    protected $searchField = 'nome';
    protected $orderBy = 'matricula';

    public function __construct(UsuarioRepositoryContract $repository, Application $app)
    {
        parent::__construct(new URepo($app));

        //$this->repository = $repository;

        //$this->usuarioRepository = new URepo($app);
    }

    public function listAll(array $parameters = null)
    {
        $role = array_get($parameters, 'role', null);

        if ($role == null) {
            $users = $this->repository->with('roles')->orderBy('nome')->paginate();
        } else {
            $users = $this->repository->findAllByRolePaginated($role);
        }

        return $users;
    }

    public function all(array $parameters = null)
    {
        $query = array_get($parameters, 'query', null);

        if ($query == null) {
            $users = $this->repository->all(['*'], 'nome');
        } else {
            $users = $this->repository->findAllByField('nome', $query.'%', 'LIKE');
        }

        return $users;
    }

    public function isPasswordValid(User $usuario, $password)
    {
        return Hash::check($password, $usuario->password);
    }

    public function edit(array $data, $id)
    {
        $newPasswd = array_pull($data, 'new_password', null);

        if ($newPasswd != null) {
            $data['password'] = $newPasswd;
        }

        return parent::edit($data, $id);
    }

    public function getByMatriculaAndAuthenticate($matricula, $password)
    {
        $user = $this->repository->findByMatricula($matricula);

        if ($user == null) {
            return null;
        }

        return $this->isPasswordValid($user, $password) ? $user : null;
    }

    public function getByMatricula($matricula)
    {
        $user = $this->repository->findByMatricula($matricula);
        return $user;
    }
}