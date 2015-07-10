<?php

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\HeartbeatDispositivoRepository;
use App\Repositories\Eloquent\TurmaRepository;
use App\Repositories\Eloquent\ProfessorRepository;

use App\Models\HeartbeatDispositivo;

use Carbon\Carbon;

use \DB;

class HeartbeatDispositivoRepositoryTest extends TestCase
{
    protected $repository;

    function __construct()
    {
        $this->repository = new HeartbeatDispositivoRepository();
    }

    public function testFindById()
    {
        $heartbeat = $this->repository->findById(1);
        $this->assertEquals("client1id", $heartbeat->dispositivo->id);
    }

    public function testFindByIdNotFound()
    {
        try {
            $this->repository->findById(1000);
            $this->fail("Deveria ter retornado erro, heartbeat procurado não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testListAll()
    {
        $heartbeats = $this->repository->listAll();
        $this->assertEquals(160, sizeof($heartbeats));
    }

    public function testPaginate()
    {
        $heartbeats = $this->repository->paginate('id', 10);
        $this->assertEquals(10, sizeof($heartbeats));
        $this->assertEquals(1, $heartbeats->currentPage());
        $this->assertEquals(10, $heartbeats->perPage());
    }

    public function testPaginateSecondPage()
    {
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return 2;
        });

        $heartbeats = $this->repository->paginate('id', 10);
        $this->assertEquals(10, sizeof($heartbeats));
        $this->assertEquals(2, $heartbeats->currentPage());
        $this->assertEquals(10, $heartbeats->perPage());
    }

    public function testInsert()
    {
        $dispositivo = \App\Models\OAuthClient::find('client1id');

        $now = Carbon::now();
        $heartbeat = $this->repository->insert($dispositivo);

        $this->assertNotNull($heartbeat->id);
        $this->assertEquals($dispositivo->id, $heartbeat->dispositivo->id);
        $this->assertEquals($now->year, $heartbeat->created_at->year);
        $this->assertEquals($now->month, $heartbeat->created_at->month);
        $this->assertEquals($now->day, $heartbeat->created_at->day);
        $this->assertEquals($now->hour, $heartbeat->created_at->hour);
    }

    public function testDeleteById()
    {
        $this->repository->deleteById(1);

        try {
            $this->repository->deleteById(1);
            $this->fail("Deveria ter ocorrido falha, este heartbeat não existe.");
        } catch (NotFoundError $e) {}
    }

    public function testDeleteByIdNotFound()
    {
        try {
            $this->repository->deleteById(1000);
            $this->fail("Deveria ter ocorrido falha, este heartbeat não existe.");
        } catch (NotFoundError $e) {}
    }
}