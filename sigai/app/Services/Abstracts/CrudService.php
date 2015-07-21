<?php namespace App\Services\Abstracts;


use App\Repositories\Test\BaseRepositoryContract;
use App\Services\Contracts\CrudServiceContract;

abstract class CrudService extends BaseService implements CrudServiceContract
{
    /**
     * @var BaseRepositoryContract
     */
    protected $repository;

    protected $with = array();
    protected $searchField = null;
    protected $orderBy = null;

    public function __construct(BaseRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function listAll(array $parameters = null)
    {
        $query = array_get($parameters, 'query');
        $field = array_get($parameters, 'field', $this->searchField);

        if ($query == null || $field == null) {
            $results = $this->repository->with($this->with)->all(['*'], $this->orderBy);
        } else {
            $results = $this->repository->with($this->with)->findAllByField($field, $query.'%', 'LIKE');
        }

        return $results;
    }

    public function show($id)
    {
        $result = $this->repository->with($this->with)->find($id);
        return $result;
    }

    public function edit(array $data, $id)
    {
        $result = $this->repository->update($data, $id);
        return $result;
    }

    public function save(array $data)
    {
        $result = $this->repository->create($data);
        return $result;
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    public function paginate()
    {
        return $this->repository->with($this->with)->paginate(15, ['*'], $this->orderBy);
    }
}