<?php namespace App\Repositories\Eloquent;


use App\Models\DiarioEnvio;
use App\Repositories\Contracts\DiarioEnvioRepositoryContract;

class DiarioEnvioRepository extends BaseRepository implements DiarioEnvioRepositoryContract
{
    public function insert(array $data)
    {
        $envio = new DiarioEnvio;
        $envio->filename = array_get($data, 'filename');
        $envio->diario()->associate(array_get($data, 'diario'));
        $envio->professor()->associate(array_get($data, 'professor'));

        if (!$envio->save()) {
            throw new ServerError(Lang::get('diarios_envio.create_error'));
        }

        return $envio;
    }

}