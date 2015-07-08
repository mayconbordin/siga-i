<?php namespace App\Services;

use App\Repositories\Contracts\AmbienteRepositoryContract;
use App\Repositories\Contracts\TipoAmbienteRepositoryContract;
use App\Services\Contracts\AmbienteServiceContract;

class AmbienteService implements AmbienteServiceContract
{
    protected $repository;
    protected $tipoRepository;

    public function __construct(AmbienteRepositoryContract $repository, TipoAmbienteRepositoryContract $tipoRepository)
    {
        $this->repository     = $repository;
        $this->tipoRepository = $tipoRepository;
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');

        if ($query == null) {
            $ambientes = $this->repository->listAll();
        } else {
            $ambientes = $this->repository->searchByName($query);
        }

        return $ambientes;
    }

    public function show($id)
    {
        $ambiente = $this->repository->findById($id);
        return $ambiente;
    }

    public function edit(array $data, $id)
    {
        $data['tipo'] = $this->tipoRepository->findById($data['tipo_ambiente_id']);
        $ambiente = $this->repository->update($data, $id);

        return $ambiente;
    }

    public function save(array $data)
    {
        $data['tipo'] = $this->tipoRepository->findById($data['tipo_ambiente_id']);
        $ambiente = $this->repository->insert($data);

        return $ambiente;
    }

    public function delete($id)
    {
        $this->repository->deleteById($id);
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
}