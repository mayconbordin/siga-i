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

class DispositivoRepository extends BaseRepository implements DispositivoRepositoryContract
{
    public function findById($id)
    {
        $dispositivo = Dispositivo::with('tipo', 'usuario')->where('id', $id)->first();
	    
	    if ($dispositivo == null) {
	        throw new NotFoundError(Lang::get('dispositivos.not_found'));
	    }

	    return $dispositivo;
    }

    public function findByCodigo($codigo)
    {
        $dispositivo = Dispositivo::where('codigo', $codigo)->first();

	    if ($dispositivo == null) {
	        throw new NotFoundError(Lang::get('dispositivos.not_found'));
	    }

	    return $dispositivo;
    }

    public function searchByCodigo($query)
    {
        $dispositivos = Dispositivo::where('codigo', 'LIKE', $query.'%')->get();
        return $dispositivos;
    }
    
    public function listAll()
    {
        $dispositivos = Dispositivo::all();
        return $dispositivos;
    }
    
    public function paginate($orderBy = 'id', $perPage = 10)
    {
        $dispositivos = Dispositivo::with('tipo', 'usuario')->orderBy($orderBy)->paginate($perPage);
	    return $dispositivos;
    }

    public function update(array $data, $id)
    {
        $dispositivo = self::findById($id);

	    $dispositivo->codigo = array_get($data, 'codigo', $dispositivo->codigo);

        $tipo = array_get($data, 'tipo', $dispositivo->tipo);

        if ($tipo != null) {
            if (!($tipo instanceof TipoDispositivo)) {
                throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
            }

            $dispositivo->tipo()->associate($tipo);
        }

        $usuario = array_get($data, 'usuario', $dispositivo->usuario);

        if ($usuario != null) {
            if (!($usuario instanceof User)) {
                throw new \InvalidArgumentException("Usuário deve ser do tipo App\\Models\\User");
            }

            $dispositivo->usuario()->associate($usuario);
        }

	    if (!$dispositivo->save()) {
            throw new ServerError(Lang::get('dispositivos.save_error'));
        }
        
        return $dispositivo;
    }
    
    public function insert(array $data)
    {
        $dispositivo = new Dispositivo;
        $dispositivo->codigo = array_get($data, 'codigo');

        $tipo  = array_get($data, 'tipo');
        $usuario = array_get($data, 'usuario');

        if (!($tipo instanceof TipoDispositivo)) {
            throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
        }

        $dispositivo->tipo()->associate($tipo);

        if (!($usuario instanceof User)) {
            throw new \InvalidArgumentException("Usuário deve ser do tipo App\\Models\\User");
        }

        $dispositivo->usuario()->associate($usuario);

	    if (!$dispositivo->save()) {
            throw new ServerError(Lang::get('dispositivos.create_error'));
        }
        
        return $dispositivo;
    }
    
    public function deleteById($id)
    {
        $dispositivo = self::findById($id);

        if ($dispositivo == null) {
            throw new NotFoundError(Lang::get('dispositivos.not_found'));
        }

        DB::beginTransaction();

        try {
            $dispositivo->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('dispositivos.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }
}
