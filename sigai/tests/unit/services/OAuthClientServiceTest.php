<?php

use \Mockery as m;
use AspectMock\Test as t;

use App\Models\HeartbeatDispositivo;
use App\Models\OAuthClient;

use Carbon\Carbon;

class OAuthClientServiceTest extends TestCase
{
    /**
     * @var \App\Services\OAuthClientService
     */
    protected $service;

    /**
     * @var \App\Repositories\Eloquent\OAuthClientRepository
     */
    protected $oauthClientRepository;

    /**
     * @var \App\Repositories\Eloquent\TipoDispositivoRepository
     */
    protected $tipoRepository;

    /**
     * @var \App\Repositories\Eloquent\AmbienteRepository
     */
    protected $ambienteRepository;

    protected static function getMethod($name)
    {
        $class = new ReflectionClass('App\Services\OAuthClientService');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    protected function makeService()
    {
        $this->oauthClientRepository = m::mock('App\Repositories\Eloquent\OAuthClientRepository');
        $this->tipoRepository        = m::mock('App\Repositories\Eloquent\TipoDispositivoRepository');
        $this->ambienteRepository    = m::mock('App\Repositories\Eloquent\AmbienteRepository');
        $this->service               = new \App\Services\OAuthClientService($this->oauthClientRepository, $this->tipoRepository, $this->ambienteRepository);
    }

    public function testDefineStatusOffline()
    {
        $foo = self::getMethod('defineStatus');
        self::makeService();

        $now = Carbon::create(2015, 7, 10, 2, 0, 0);

        $heartbeats = [
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(20)]),
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(30)]),
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(50)]),

        ];

        // mock do cliente
        $client = m::mock('App\Models\OAuthClient');
        $client->shouldReceive('getAttribute')
            ->with('heartbeats')
            ->andReturn($heartbeats);
        $client->shouldReceive('setAttribute')
            ->with('status', OAuthClient::STATUS_OFFLINE);

        // mock do timestamp
        $carbon = m::mock('Carbon\Carbon')->makePartial();
        $carbon->shouldReceive('now')->andReturn($now);

        $foo->invokeArgs($this->service, [$client]);
    }

    public function testDefineStatusOk()
    {
        $foo = self::getMethod('defineStatus');
        self::makeService();

        $now = Carbon::create(2015, 7, 10, 2, 0, 0);

        $heartbeats = [
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(5)]),
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(20)]),
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(30)]),
            new HeartbeatDispositivo(['created_at' => $now->copy()->subMinutes(50)]),

        ];

        // mock do cliente
        $client = m::mock('App\Models\OAuthClient');
        $client->shouldReceive('getAttribute')
            ->with('heartbeats')
            ->andReturn($heartbeats);
        $client->shouldReceive('setAttribute')
            ->with('status', OAuthClient::STATUS_OK);

        $foo->invokeArgs($this->service, [$client, $now]);
    }

    public function testDefineStatusUnknown()
    {
        $foo = self::getMethod('defineStatus');
        self::makeService();

        $now = Carbon::create(2015, 7, 10, 2, 0, 0);

        $heartbeats = [];

        // mock do cliente
        $client = m::mock('App\Models\OAuthClient');
        $client->shouldReceive('getAttribute')
            ->with('heartbeats')
            ->andReturn($heartbeats);
        $client->shouldReceive('setAttribute')
            ->with('status', OAuthClient::STATUS_UNKNOWN);

        $foo->invokeArgs($this->service, [$client, $now]);
    }
}