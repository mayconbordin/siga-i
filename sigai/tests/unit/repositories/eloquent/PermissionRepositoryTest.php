<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\PermissionRepository;

use App\Models\Permission;

use Carbon\Carbon;

use Illuminate\Foundation\Application;
use \DB;

class PermissionRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new PermissionRepository(Application::getInstance());
    }

    public function testFindById()
    {
        $permission = $this->repository->find(1);
        $this->assertEquals("create-aluno", $permission->name);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->find(1000);
            $this->fail("Deveria ter retornado erro, permissao procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByName()
    {
        $permissions = $this->repository->findAllByField('name', '%aluno%', 'like');
        $this->assertEquals(10, sizeof($permissions));
    }

    public function testListAll()
    {
        $permissions = $this->repository->all();
        $this->assertGreaterThanOrEqual(106, sizeof($permissions));
    }

    public function testPaginate()
    {
        $permissions = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($permissions));
        $this->assertEquals(1, $permissions->currentPage());
        $this->assertEquals(2, $permissions->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $permissions = $this->repository->paginate(2);
        $this->assertEquals(2, sizeof($permissions));
        $this->assertEquals(2, $permissions->currentPage());
        $this->assertEquals(2, $permissions->perPage());
    }

    public function testInsert()
    {
        $data = [
            'name' => 'teste',
            'display_name' => 'Teste'
        ];

        $permission = $this->repository->create($data);

        $this->assertNotNull($permission->id);
        $this->assertEquals($data['name'], $permission->name);
        $this->assertEquals($data['display_name'], $permission->display_name);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'create-aluno',
            'display_name' => 'Criar aluno',
        ];

        $permission = $this->repository->update($data, 1);

        $this->assertNotNull($permission->id);
        $this->assertEquals($data['name'], $permission->name);
        $this->assertEquals($data['display_name'], $permission->display_name);
    }

    public function testDeleteById()
    {
        $this->repository->delete(1);


        try {
            $this->repository->find(1);
            $this->fail("Deveria ter ocorrido falha, este permissao não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->delete(1000);
            $this->fail("Deveria ter ocorrido falha, este permissao não existe.");
        } catch (NotFoundError $e) {}
    }
}