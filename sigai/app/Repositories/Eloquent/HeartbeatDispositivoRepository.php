<?php namespace App\Repositories\Eloquent;

use App\Models\HeartbeatDispositivo;
use App\Models\OAuthClient;

use App\Repositories\Contracts\HeartbeatDispositivoRepositoryContract;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \DB;
use \Lang;
use \Log;
use \App;

class HeartbeatDispositivoRepository extends App\Repositories\Test\BaseRepository implements HeartbeatDispositivoRepositoryContract
{
    /*public function findById($id)
    {
        $heartbeat = HeartbeatDispositivo::with('dispositivo')->where('id', $id)->first();
	    
	    if ($heartbeat == null) {
	        throw new NotFoundError(Lang::get('heartbeats.not_found'));
	    }

	    return $heartbeat;
    }

    public function listAll()
    {
        $heartbeats = HeartbeatDispositivo::all();
        return $heartbeats;
    }
    
    public function paginate($orderBy = 'id', $perPage = 10)
    {
        $heartbeats = HeartbeatDispositivo::with('dispositivo')->orderBy($orderBy)->paginate($perPage);
	    return $heartbeats;
    }

    public function insert(OAuthClient $dispositivo)
    {
        $heartbeat = new HeartbeatDispositivo;
	    
        $heartbeat->dispositivo()->associate($dispositivo);

	    if (!$heartbeat->save()) {
            throw new ServerError(Lang::get('heartbeats.create_error'));
        }
        
        return $heartbeat;
    }
    
    public function deleteById($id)
    {
        $heartbeat = self::findById($id);

        if ($heartbeat == null) {
            throw new NotFoundError(Lang::get('heartbeats.not_found'));
        }

        DB::beginTransaction();

        try {
            $heartbeat->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('heartbeats.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }*/
    /**
     * @return string
     */
    public function model()
    {
        return 'App\Models\HeartbeatDispositivo';
    }

    /**
     * @return string
     */
    public function name()
    {
        return Lang::choice('heartbeats.title', 1);
    }
}
