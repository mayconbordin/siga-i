<?php namespace App\Services;

use App\Repositories\Contracts\TipoAmbienteRepositoryContract;
use App\Services\Contracts\TipoAmbienteServiceContract;

class TipoAmbienteService implements TipoAmbienteServiceContract
{
    protected $repository;

    public function __construct(TipoAmbienteRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');

        if ($query == null) {
            $tiposAmbiente = $this->repository->listAll();
        } else {
            $tiposAmbiente = $this->repository->searchByName($query);
        }

        return $tiposAmbiente;
    }

    public function show($id)
    {
        $tipoAmbiente = $this->repository->findById($id);
        return $tipoAmbiente;
    }

    public function edit(array $data, $id)
    {
        $tipoAmbiente = $this->repository->update($data, $id);
        return $tipoAmbiente;
    }

    public function save(array $data)
    {
        $tipoAmbiente = $this->repository->insert($data);
        return $tipoAmbiente;
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