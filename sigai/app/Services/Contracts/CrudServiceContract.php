<?php namespace App\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface CrudServiceContract
{
    /**
     * List all records, optionally filtering them according to the parameters.
     *
     * @param array $parameters [query=string]
     * @return array
     */
    public function listAll(array $parameters = null);

    /**
     * Show a single record by ID.
     *
     * @param mixed $id
     * @return Model
     */
    public function show($id);

    /**
     * Update a single record by ID.
     *
     * @param array $data
     * @param mixed $id
     * @return Model
     */
    public function edit(array $data, $id);

    /**
     * Create a new record.
     *
     * @param array $data
     * @return Model
     */
    public function save(array $data);

    /**
     * Delete a single record by ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Paginate the list of records.
     *
     * @return LengthAwarePaginator
     */
    public function paginate();
}