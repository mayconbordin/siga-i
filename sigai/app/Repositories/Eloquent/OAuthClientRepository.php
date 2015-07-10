<?php namespace App\Repositories\Eloquent;

use App\Models\Ambiente;
use App\Models\OAuthClient;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Models\TipoDispositivo;
use App\Repositories\Contracts\OAuthClientRepositoryContract;
use \DB;
use \Lang;
use \Log;

class OAuthClientRepository extends BaseRepository implements OAuthClientRepositoryContract
{
    public function findById($id)
    {
        $cliente = OAuthClient::with('ambientes', 'tipo', 'heartbeats', 'scopes')->where('id', $id)->first();
	    
	    if ($cliente == null) {
	        throw new NotFoundError(Lang::get('clients.not_found'));
	    }

	    return $cliente;
    }
    
    public function findByNome($nome)
    {
        $cliente = OAuthClient::where('name', $nome)->first();
	    
	    if ($cliente == null) {
	        throw new NotFoundError(Lang::get('clients.not_found'));
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
    
    public function paginate($orderBy = 'id', $perPage = 10)
    {
        $clientes = OAuthClient::with('ambientes', 'tipo', 'heartbeats', 'scopes')
                               ->orderBy($orderBy)
                               ->paginate($perPage);
	    return $clientes;
    }

    public function update(array $data, $id)
    {
        $cliente = self::findById($id);

	    $cliente->name   = array_get($data, 'name', $cliente->name);
	    $cliente->secret = array_get($data, 'secret', $cliente->secret);
        $scopes          = array_get($data, 'scopes', []);

        $this->associateTipo($cliente, $data);
        $this->associateAmbiente($cliente, $data);

        $cliente->scopes()->detach();
        $cliente->scopes()->attach($scopes);

	    if (!$cliente->save()) {
            throw new ServerError(Lang::get('clients.save_error'));
        }
        
        return $cliente;
    }

    public function updateAmbiente($id, Ambiente $ambiente = null)
    {
        $cliente = self::findById($id);

        $cliente->ambientes()->detach();

        if ($ambiente != null) {
            $cliente->ambientes()->attach($ambiente);
        }

        return $cliente;
    }
    
    public function insert(array $data)
    {
        $cliente = new OAuthClient;

        $cliente->id     = array_get($data, 'id');
        $cliente->name   = array_get($data, 'name');
        $cliente->secret = array_get($data, 'secret');
        $scopes          = array_get($data, 'scopes', []);

        $this->associateTipo($cliente, $data);

	    if (!$cliente->save()) {
            throw new ServerError(Lang::get('clients.create_error'));
        }

        $this->associateAmbiente($cliente, $data);
        $cliente->scopes()->detach();
        $cliente->scopes()->attach($scopes);
        
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
            $cliente->scopes()->detach();
            $cliente->heartbeats()->delete();
            $cliente->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('clients.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }

    protected function associateAmbiente(OAuthClient $cliente, array $data)
    {
        $ambiente = array_get($data, 'ambiente', null);

        if ($ambiente != null) {
            if (!($ambiente instanceof Ambiente)) {
                throw new \InvalidArgumentException("Ambiente deve ser do tipo Ambiente");
            }

            $cliente->ambientes()->detach();
            $cliente->ambientes()->attach($ambiente);
        }
    }

    protected function associateTipo(OAuthClient $cliente, array $data)
    {
        $tipo = array_get($data, 'tipo', null);

        if ($tipo != null) {
            if (!($tipo instanceof TipoDispositivo)) {
                throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
            }

            $cliente->tipo()->associate($tipo);
        }
    }
}
