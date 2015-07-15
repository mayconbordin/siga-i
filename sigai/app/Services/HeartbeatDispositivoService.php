<?php namespace App\Services;

use App\Http\Requests\Request;
use App\Repositories\Contracts\HeartbeatDispositivoRepositoryContract;
use App\Repositories\Contracts\OAuthClientRepositoryContract;
use App\Repositories\Contracts\UsuarioRepositoryContract;
use App\Services\Contracts\HeartbeatDispositivoServiceContract;

class HeartbeatDispositivoService implements HeartbeatDispositivoServiceContract
{
    protected $repository;
    protected $dispositivoRepository;

    public function __construct(HeartbeatDispositivoRepositoryContract $repository, OAuthClientRepositoryContract $dispositivoRepository)
    {
        $this->repository            = $repository;
        $this->dispositivoRepository = $dispositivoRepository;
    }

    public function listAll(array $parameters = null)
    {
        $dispositivoId = array_get($parameters, 'dispositivo_id');

        if ($dispositivoId == null) {
            $heartbeats = $this->repository->all();
        } else {
            $dispositivo = $this->dispositivoRepository->findById($dispositivoId);
            $heartbeats = $dispositivo->heartbeats;
        }

        return $heartbeats;
    }

    public function listByDevice($dispositivoId)
    {
        $heartbeats = $this->repository->findAllByOauthClientIdOrderByCreatedAtLimit($dispositivoId, 'desc', 5);
        return $heartbeats;
    }

    public function show($id)
    {
        $heartbeat = $this->repository->find($id);
        return $heartbeat;
    }

    public function save($dispositivoId)
    {
        $dispositivo = $this->dispositivoRepository->findById($dispositivoId);
        $heartbeat   = $this->repository->create(['oauth_client_id' => $dispositivo]);

        return $heartbeat;
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
}