<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\RoleRepository;

use App\Models\Role;

use Carbon\Carbon;

use Illuminate\Foundation\Application;

class RoleRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new RoleRepository(Application::getInstance());
    }

    public function testFindById()
    {
        $role = $this->repository->find(1);
        $this->assertEquals("aluno", $role->name);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->find(1000);
            $this->fail("Deveria ter retornado erro, role procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByName()
    {
        $roles = $this->repository->findAllByName('aluno');
        $this->assertEquals(1, sizeof($roles));
        $this->assertEquals(1, $roles[0]->id);
    }

    public function testListAll()
    {
        $roles = $this->repository->all();
        $this->assertEquals(4, sizeof($roles));
    }

    public function testPaginate()
    {
        $roles = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($roles));
        $this->assertEquals(1, $roles->currentPage());
        $this->assertEquals(2, $roles->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $roles = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($roles));
        $this->assertEquals(2, $roles->currentPage());
        $this->assertEquals(2, $roles->perPage());
    }

    public function testInsert()
    {
        $data = [
            'name' => 'teste',
            'display_name' => 'Teste'
        ];

        $role = $this->repository->create($data);

        $this->assertNotNull($role->id);
        $this->assertEquals($data['name'], $role->name);
        $this->assertEquals($data['display_name'], $role->display_name);
    }

    public function testInsertWithPermissions()
    {
        $data = [
            'name' => 'teste',
            'display_name' => 'Teste',
            'permissions' => [1,2,3,4,5]
        ];

        $role = $this->repository->create($data);

        $this->assertNotNull($role->id);
        $this->assertEquals($data['name'], $role->name);
        $this->assertEquals($data['display_name'], $role->display_name);

        $this->assertEquals(sizeof($data['permissions']), sizeof($role->perms));
    }

    public function testUpdateWithPermissions()
    {
        $data = [
            'name' => 'aluno',
            'display_name' => 'Teste',
            'permissions' => [1,2,3,4,5]
        ];

        $role = $this->repository->update($data, 1);

        $this->assertNotNull($role->id);
        $this->assertEquals($data['name'], $role->name);
        $this->assertEquals($data['display_name'], $role->display_name);

        $this->assertEquals(sizeof($data['permissions']), sizeof($role->perms));
    }

    public function testDeleteById()
    {
        $this->repository->delete(1);

        $users = DB::table('role_user')->where('role_id', 1)->get();
        $this->assertEquals(0, sizeof($users));

        $perms = DB::table('permission_role')->where('role_id', 1)->get();
        $this->assertEquals(0, sizeof($perms));

        try {
            $this->repository->find(1);
            $this->fail("Deveria ter ocorrido falha, este role não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->delete(1000);
            $this->fail("Deveria ter ocorrido falha, este role não existe.");
        } catch (NotFoundError $e) {}
    }
}