<?php namespace App\Services;


use App\Repositories\Contracts\DispositivoRepositoryContract;
use App\Services\Abstracts\CrudService;
use App\Services\Contracts\DispositivoServiceContract;

class DispositivoService extends CrudService implements DispositivoServiceContract
{
    protected $with = ['usuario', 'tipo'];

    function __construct(DispositivoRepositoryContract $repository)
    {
        parent::__construct($repository);
    }
}