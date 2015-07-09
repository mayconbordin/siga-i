<?php namespace App\Services;

use App\Repositories\Contracts\OAuthClientRepositoryContract;
use App\Services\Contracts\OAuthClientServiceContract;

class OAuthClientService implements OAuthClientServiceContract
{
    protected $repository;

    public function __construct(OAuthClientRepositoryContract $repository)
    {
        $this->repository = $repository;
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
        $ambiente = $this->repository->update($data, $id);

        return $ambiente;
    }

    public function save(array $data)
    {
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