<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\OAuthClientRepository;

use App\Models\OAuthClient;

use Carbon\Carbon;

use \DB;

class OAuthClientRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new OAuthClientRepository();
    }

    public function testFindById()
    {
        $client = $this->repository->findById("client1id");
        $this->assertEquals("client1id", $client->id);
        $this->assertEquals("client1", $client->name);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->findById("10");
            $this->fail("Deveria ter retornado erro, cliente procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByNome()
    {
        $cliente = $this->repository->findByNome("client1");
        $this->assertEquals("client1id", $cliente->id);
    }

    public function testSearchByName()
    {
        $clientes = $this->repository->searchByName("client");
        $this->assertEquals(4, sizeof($clientes));

        $this->assertEquals("client1id", $clientes[0]->id);
        $this->assertEquals("client2id", $clientes[1]->id);
    }

    public function testListAll()
    {
        $clientes = $this->repository->listAll();
        $this->assertEquals(4, sizeof($clientes));
    }

    public function testPaginate()
    {
        $clientes = $this->repository->paginate('name', 2);
        $this->assertEquals(2, sizeof($clientes));
        $this->assertEquals(1, $clientes->currentPage());
        $this->assertEquals(2, $clientes->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $clientes = $this->repository->paginate('name', 2);
        $this->assertEquals(2, sizeof($clientes));
        $this->assertEquals(2, $clientes->currentPage());
        $this->assertEquals(2, $clientes->perPage());
    }

    public function testUpdate()
    {
        $data = [
            'name'   => 'Arduino 01',
            'secret' => '2e6f9b0d5885b6010f9167787445617f553a735f'
        ];

        $cliente = $this->repository->update($data, "client1id");

        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['secret'], $cliente->secret);
    }

    public function testUpdateWithScope()
    {
        $data = [
            'name'   => 'Arduino 01',
            'secret' => '2e6f9b0d5885b6010f9167787445617f553a735f',
            'scopes' => ['write-chamada']
        ];

        $cliente = $this->repository->update($data, "client1id");

        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['secret'], $cliente->secret);

        $scope = $cliente->scopes()->find('write-chamada');
        $this->assertNotNull($scope);
    }

    public function testInsert()
    {
        $data = [
            'id'     => '10-AD-4A-E8-52-EA',
            'name'   => 'Arduino 01',
            'secret' => '2e6f9b0d5885b6010f9167787445617f553a735f'
        ];

        $cliente = $this->repository->insert($data);

        $this->assertNotNull($cliente->id);
        $this->assertEquals($data['secret'], $cliente->secret);
        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['id'], $cliente->id);
    }

    public function testInsertWithScope()
    {
        $data = [
            'id'     => '10-AD-4A-E8-52-EA',
            'name'   => 'Arduino 01',
            'secret' => '2e6f9b0d5885b6010f9167787445617f553a735f',
            'scopes' => ['write-chamada']
        ];

        $cliente = $this->repository->insert($data);

        $this->assertNotNull($cliente->id);
        $this->assertEquals($data['secret'], $cliente->secret);
        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['id'], $cliente->id);

        $scope = $cliente->scopes()->find('write-chamada');
        $this->assertNotNull($scope);
    }

    public function testInsertWithTipo()
    {
        $data = [
            'id'     => '10-AD-4A-E8-52-EA',
            'name'   => 'Arduino 01',
            'secret' => '2e6f9b0d5885b6010f9167787445617f553a735f',
            'tipo'   => \App\Models\TipoDispositivo::find(1)
        ];

        $cliente = $this->repository->insert($data);

        $this->assertNotNull($cliente->id);
        $this->assertEquals($data['secret'], $cliente->secret);
        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['id'], $cliente->id);
        $this->assertEquals($data['tipo']->id, $cliente->tipo->id);
    }

    public function testDeleteById()
    {
        $id = "client1id";
        $cliente = OAuthClient::where('id', $id)->first();

        // verifica estado antes de remoção
        $this->assertEquals(1, sizeof($cliente->ambientes));

        // remove o cliente
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $ambientes = DB::table('dispositivos_ambiente')->where('oauth_client_id', $id)->get();

        // verifica se o cliente foi removido completamente
        $this->assertEquals(0, sizeof($ambientes));
    }

    public function testDeleteWithHeartbeatsById()
    {
        $id = "client1id";

        // insert some random heartbeats
        DB::table('heartbeats_dispositivo')->insert([
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(1)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(2)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(3)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(4)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(5)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(6)],
            ['oauth_client_id' => $id, 'created_at' => Carbon::now()->addMinutes(7)]
        ]);


        $cliente = OAuthClient::with('ambientes', 'heartbeats', 'scopes')->where('id', $id)->first();

        // verifica estado antes de remoção
        $this->assertEquals(1, sizeof($cliente->ambientes));
        $this->assertEquals(1, sizeof($cliente->scopes));
        $this->assertGreaterThanOrEqual(48,sizeof($cliente->heartbeats));

        // remove o cliente
        $this->repository->deleteById($id);

        // pesquisa o banco de dados novamente
        $ambientes  = DB::table('dispositivos_ambiente')->where('oauth_client_id', $id)->get();
        $heartbeats = DB::table('heartbeats_dispositivo')->where('oauth_client_id', $id)->get();
        $scopes     = DB::table('oauth_client_scopes')->where('client_id', $id)->get();

        // verifica se o cliente foi removido completamente
        $this->assertEquals(0, sizeof($ambientes));
        $this->assertEquals(0, sizeof($heartbeats));
        $this->assertEquals(0, sizeof($scopes));
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById(100);
            $this->fail("Deveria ter ocorrido falha, este cliente não existe.");
        } catch (NotFoundError $e) {}
    }
}