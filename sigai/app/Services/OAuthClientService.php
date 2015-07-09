<?php namespace App\Services;

use App\Models\OAuthClient;
use App\Repositories\Contracts\AmbienteRepositoryContract;
use App\Repositories\Contracts\OAuthClientRepositoryContract;
use App\Repositories\Contracts\TipoDispositivoRepositoryContract;
use App\Services\Contracts\OAuthClientServiceContract;
use Carbon\Carbon;

class OAuthClientService implements OAuthClientServiceContract
{
    protected $repository;
    protected $tipoRepository;
    protected $ambienteRepository;

    protected $heartbeatInterval;

    public function __construct(OAuthClientRepositoryContract $repository, TipoDispositivoRepositoryContract $tipoRepository,
                                AmbienteRepositoryContract $ambienteRepository)
    {
        $this->repository         = $repository;
        $this->tipoRepository     = $tipoRepository;
        $this->ambienteRepository = $ambienteRepository;

        $this->heartbeatInterval = config('arduino.heartbeatInterval', 15);
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');

        if ($query == null) {
            $clientes = $this->repository->listAll();
        } else {
            $clientes = $this->repository->searchByName($query);
        }

        return $clientes;
    }

    public function show($id)
    {
        $cliente = $this->repository->findById($id);
        return $cliente;
    }

    public function edit(array $data, $id)
    {
        $this->parseData($data);
        $this->repository->update($data, $id);

        $client = $this->repository->findById($id);
        $this->defineStatus($client);

        return $client;
    }

    public function editAmbiente(array $data, $id)
    {
        $ambienteId = array_get($data, 'ambiente_id', null);

        $ambiente = ($ambienteId != null) ? $this->ambienteRepository->findById($ambienteId) : null;
        $client = $this->repository->updateAmbiente($id, $ambiente);

        return $client;
    }

    public function save(array $data)
    {
        $this->parseData($data);
        $tmp = $this->repository->insert($data);

        $client = $this->repository->findById($tmp->id);
        $this->defineStatus($client);

        return $client;
    }

    public function delete($id)
    {
        $this->repository->deleteById($id);
    }

    public function paginate()
    {
        $clients = $this->repository->paginate();

        foreach ($clients as $client) {
            $this->defineStatus($client);
        }

        return $clients;
    }

    protected function parseData(array &$data)
    {
        $tipoId     = array_get($data, 'tipo_dispositivo_id', null);
        $ambienteId = array_get($data, 'ambiente_id', null);

        if ($tipoId != null) {
            $data['tipo'] = $this->tipoRepository->findById($tipoId);
        }

        if ($ambienteId != null) {
            $data['ambiente'] = $this->ambienteRepository->findById($ambienteId);
        }
    }

    protected function defineStatus(OAuthClient $client)
    {
        $now  = Carbon::now();
        $last = null;

        foreach ($client->heartbeats as $heartbeat) {
            if ($last == null || $heartbeat->created_at->gt($last)) {
                $last = $heartbeat->created_at;
            }
        }

        if ($last == null) {
            $client->status = OAuthClient::STATUS_UNKNOWN;
        } else if ($now->diffInMinutes($last) > $this->heartbeatInterval) {
            $client->status = OAuthClient::STATUS_OFFLINE;
        } else {
            $client->status = OAuthClient::STATUS_OK;
        }
    }
}