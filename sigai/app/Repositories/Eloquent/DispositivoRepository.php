<?php namespace App\Repositories\Eloquent;

use App\Models\Dispositivo;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Models\TipoDispositivo;
use App\Models\User;
use App\Repositories\Contracts\DispositivoRepositoryContract;

use \DB;
use \Lang;
use \Log;

class DispositivoRepository extends \App\Repositories\Test\BaseRepository implements DispositivoRepositoryContract
{
    protected $relations = ['tipo', 'usuario'];

    /**
     * @return string
     */
    public function model()
    {
        return Dispositivo::class;
    }

    /**
     * @return string
     */
    public function name()
    {
        return Lang::choice('dispositivos.title', 1);
    }
}
