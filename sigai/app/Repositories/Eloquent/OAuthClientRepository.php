<?php namespace App\Repositories\Eloquent;

use App\Models\OAuthClient;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\OAuthClientRepositoryContract;
use \DB;
use \Lang;
use \Log;

class OAuthClientRepository extends BaseRepository implements OAuthClientRepositoryContract
{
    public function findById($id)
    {
        $cliente = OAuthClient::where('id', $id)->first();
	    
	    if ($cliente == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $cliente;
    }
    
    public function findByNome($nome)
    {
        $cliente = OAuthClient::where('name', $nome)->first();
	    
	    if ($cliente == null) {
	        throw new NotFoundError(Lang::get('cursos.not_found'));
	    }

	    return $cliente;
    }
    
    public function searchByName($query)
    {
        $clientes = OAuthClient::where('name', 'LIKE', $query.'%')->get();
        return $clientes;
    }
    
    public function listAll()
    {
        $clientes = OAuthClient::all();
        return $clientes;
    }
    
    public function paginate($orderBy = 'name', $perPage = 10)
    {
        $clientes = OAuthClient::orderBy($orderBy)->paginate($perPage);
	    return $clientes;
    }

    public function update(array $data, $id)
    {
        $cliente = self::findById($id);

	    $cliente->name   = array_get($data, 'name', $cliente->name);
	    $cliente->secret = array_get($data, 'secret', $cliente->secret);

	    if (!$cliente->save()) {
            throw new ServerError(Lang::get('clients.save_error'));
        }
        
        return $cliente;
    }
    
    public function insert(array $data)
    {
        $cliente = new OAuthClient;

        $cliente->id     = array_get($data, 'id');
        $cliente->name   = array_get($data, 'name');
        $cliente->secret = array_get($data, 'secret');

	    if (!$cliente->save()) {
            throw new ServerError(Lang::get('clients.create_error'));
        }
        
        return $cliente;
    }
    
    public function deleteById($id)
    {
        $cliente = self::findById($id);

        if ($cliente == null) {
            throw new NotFoundError(Lang::get('clients.not_found'));
        }

        DB::beginTransaction();

        try {
            $cliente->ambientes()->detach();
            $cliente->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('clients.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }
}
