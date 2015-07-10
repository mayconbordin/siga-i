<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\OAuthScopeRepository;

use App\Models\OAuthScope;

use Carbon\Carbon;

use \DB;

class OAuthScopeRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new OAuthScopeRepository();
    }

    public function testFindById()
    {
        $client = $this->repository->findById("write-chamada");
        $this->assertEquals("write-chamada", $client->id);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->findById("write-aluno");
            $this->fail("Deveria ter retornado erro, escopo procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testListAll()
    {
        $scopes = $this->repository->listAll();
        $this->assertEquals(3, sizeof($scopes));
    }

    public function testPaginate()
    {
        $scopes = $this->repository->paginate('id', 2);
        $this->assertEquals(2, sizeof($scopes));
        $this->assertEquals(1, $scopes->currentPage());
        $this->assertEquals(2, $scopes->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $scopes = $this->repository->paginate('id', 2);
        $this->assertEquals(1, sizeof($scopes));
        $this->assertEquals(2, $scopes->currentPage());
        $this->assertEquals(2, $scopes->perPage());
    }

    public function testUpdate()
    {
        $data = [
            'id'          => 'write-chamada',
            'description' => 'Permissão de escrita da chamada'
        ];

        $scope = $this->repository->update($data, "write-chamada");

        $this->assertEquals($data['id'], $scope->id);
        $this->assertEquals($data['description'], $scope->description);
    }

    public function testInsert()
    {
        $data = [
            'id'          => 'read-chamada',
            'description' => 'Leitura da chamada'
        ];

        $scope = $this->repository->insert($data);

        $this->assertEquals($data['id'], $scope->id);
        $this->assertEquals($data['description'], $scope->description);
    }

    public function testDeleteById()
    {
        $id = "write-chamada";
        $scope = OAuthScope::with('clients')->where('id', $id)->first();

        // verifica estado antes de remoção
        $this->assertEquals(3, sizeof($scope->clients));

        // remove o cliente
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $clients = DB::table('oauth_client_scopes')->where('scope_id', $id)->get();

        // verifica se o escopo foi removido completamente
        $this->assertEquals(0, sizeof($clients));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById("read-chamada");
            $this->fail("Deveria ter ocorrido falha, este escopo não existe.");
        } catch (NotFoundError $e) {}
    }
}