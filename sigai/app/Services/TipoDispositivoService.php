<?php namespace App\Services;

use App\Repositories\Contracts\TipoDispositivoRepositoryContract;
use App\Services\Contracts\TipoDispositivoServiceContract;

class TipoDispositivoService implements TipoDispositivoServiceContract
{
    protected $repository;

    public function __construct(TipoDispositivoRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');

        if ($query == null) {
            $tipos = $this->repository->listAll();
        } else {
            $tipos = $this->repository->searchByName($query);
        }

        return $tipos;
    }

    public function show($id)
    {
        $tipo = $this->repository->findById($id);
        return $tipo;
    }

    public function edit(array $data, $id)
    {
        $tipo = $this->repository->update($data, $id);
        return $tipo;
    }

    public function save(array $data)
    {
        $tipo = $this->repository->insert($data);
        return $tipo;
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