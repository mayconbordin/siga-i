<?php namespace App\Services;

use App\Repositories\Contracts\OAuthScopeRepositoryContract;
use App\Services\Contracts\OAuthScopeServiceContract;

class OAuthScopeService implements OAuthScopeServiceContract
{
    protected $repository;

    public function __construct(OAuthScopeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        $scopes = $this->repository->listAll();
        return $scopes;
    }

    public function show($id)
    {
        $scope = $this->repository->findById($id);
        return $scope;
    }

    public function edit(array $data, $id)
    {
        $scope = $this->repository->update($data, $id);
        return $scope;
    }

    public function save(array $data)
    {
        $scope = $this->repository->insert($data);
        return $scope;
    }

    public function delete($id)
    {
        $this->repository->deleteById($id);
    }

    public function paginate()
    {
        $scopes = $this->repository->paginate();
        return $scopes;
    }
}