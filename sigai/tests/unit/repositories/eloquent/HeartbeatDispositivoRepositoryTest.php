<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\HeartbeatDispositivoRepository;
use App\Repositories\Eloquent\TurmaRepository;
use App\Repositories\Eloquent\ProfessorRepository;

use App\Models\HeartbeatDispositivo;

use Carbon\Carbon;

use \DB;
use \App;

class HeartbeatDispositivoRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new HeartbeatDispositivoRepository(App::getInstance());
    }

    public function testFindById()
    {
        $heartbeat = $this->repository->find(1);
        $this->assertEquals("client1id", $heartbeat->dispositivo->id);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->find(1000);
            $this->fail("Deveria ter retornado erro, heartbeat procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testFindByDispositivo()
    {
        //$heartbeats = $this->repository->orderBy('created_at', 'desc')->findAllByField('oauth_client_id', "client1id");
        //$this->repository->findAllByInId([49, 50, 51]);

        $heartbeats = $this->repository->findAllByOauthClientIdOrderByCreatedAtLimit('client1id', 'desc', 10);
        $this->assertEquals(10, sizeof($heartbeats));

        $copy = array_merge([], $heartbeats->all());
        usort($copy, function($a, $b) {
            return $b['created_at']->getTimestamp() - $a['created_at']->getTimestamp();
        });

        $copyDates = array_map(function($item) {
            return $item->created_at->format('Y-m-d');
        }, $copy);

        $originalDates = array_map(function($item) {
            return $item->created_at->format('Y-m-d');
        }, $heartbeats->all());

        $this->assertEquals($copyDates, $originalDates);
    }

    public function testListAll()
    {
        $heartbeats = $this->repository->all();
        $this->assertEquals(160, sizeof($heartbeats));
    }

    public function testPaginate()
    {
        $heartbeats = $this->repository->paginate(10);
        $this->assertEquals(10, sizeof($heartbeats));
        $this->assertEquals(1, $heartbeats->currentPage());
        $this->assertEquals(10, $heartbeats->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $heartbeats = $this->repository->paginate(10);
        $this->assertEquals(10, sizeof($heartbeats));
        $this->assertEquals(2, $heartbeats->currentPage());
        $this->assertEquals(10, $heartbeats->perPage());
    }

    public function testInsert()
    {
        $dispositivo = \App\Models\OAuthClient::find('client1id');

        $now = Carbon::now();
        $heartbeat = $this->repository->create(['oauth_client_id' => $dispositivo->id]);

        $this->assertNotNull($heartbeat->id);
        $this->assertEquals($dispositivo->id, $heartbeat->dispositivo->id);
        $this->assertEquals($now->year, $heartbeat->created_at->year);
        $this->assertEquals($now->month, $heartbeat->created_at->month);
        $this->assertEquals($now->day, $heartbeat->created_at->day);
        $this->assertEquals($now->hour, $heartbeat->created_at->hour);
    }

    public function testDeleteById()
    {
        $this->repository->delete(1);

        try {
            $this->repository->delete(1);
            $this->fail("Deveria ter ocorrido falha, este heartbeat não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->delete(1000);
            $this->fail("Deveria ter ocorrido falha, este heartbeat não existe.");
        } catch (NotFoundError $e) {}
    }
}