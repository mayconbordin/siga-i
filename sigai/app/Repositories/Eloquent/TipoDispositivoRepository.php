<?php namespace App\Repositories\Eloquent;

use App\Models\TipoDispositivo;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\TipoDispositivoRepositoryContract;
use App\Repositories\Contracts\OAuthClientRepositoryContract;
use App\Repositories\Contracts\DispositivoAlunoRepositoryContract;

use \DB;
use \Lang;
use \Log;
use \App;

class TipoDispositivoRepository extends BaseRepository implements TipoDispositivoRepositoryContract
{
    protected $oauthClientRepository;
    protected $dispositivoAlunoRepository;

    public function findById($id)
    {
        $tipo = TipoDispositivo::where('id', $id)->first();
	    
	    if ($tipo == null) {
	        throw new NotFoundError(Lang::get('tipos_dispositivo.not_found'));
	    }

	    return $tipo;
    }
    
    public function findByNome($nome)
    {
        $tipo = TipoDispositivo::where('nome', $nome)->first();
	    
	    if ($tipo == null) {
	        throw new NotFoundError(Lang::get('tipos_dispositivo.not_found'));
	    }

	    return $tipo;
    }
    
    public function searchByName($query)
    {
        $tipos = TipoDispositivo::where('nome', 'LIKE', $query.'%')->get();
        return $tipos;
    }
    
    public function listAll()
    {
        $tipos = TipoDispositivo::all();
        return $tipos;
    }
    
    public function paginate($orderBy = 'nome', $perPage = 10)
    {
        $tipos = TipoDispositivo::orderBy($orderBy)->paginate($perPage);
	    return $tipos;
    }

    public function update(array $data, $id)
    {
        $tipo = self::findById($id);
        $tipo->nome = array_get($data, 'nome', $tipo->nome);

	    if (!$tipo->save()) {
            throw new ServerError(Lang::get('tipos_dispositivo.save_error'));
        }
        
        return $tipo;
    }
    
    public function insert(array $data)
    {
        $tipo = new TipoDispositivo;
        $tipo->nome  = array_get($data, 'nome');

	    if (!$tipo->save()) {
            throw new ServerError(Lang::get('tipos_dispositivo.create_error'));
        }
        
        return $tipo;
    }
    
    public function deleteById($id)
    {
        $tipo = TipoDispositivo::where('id', $id)->with('dispositivos', 'oauthClients')->first();

        if ($tipo == null) {
            throw new NotFoundError(Lang::get('tipos_dispositivo.not_found'));
        }

        DB::beginTransaction();

        try {
            foreach ($tipo->oauthClients as $client) {
                $this->getOAuthClientRepository()->deleteById($client->id);
            }

            foreach ($tipo->dispositivos as $d) {
                $this->getDispositivoAlunoRepository()->deleteById($d->id);
            }

            $tipo->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('tipos_dispositivo.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }

    /**
     * @return OAuthClientRepositoryContract
     */
    public function getOAuthClientRepository()
    {
        if ($this->oauthClientRepository == null) {
            $this->oauthClientRepository = App::getInstance()->make('App\Repositories\Contracts\OAuthClientRepositoryContract');
        }
        return $this->oauthClientRepository;
    }

    /**
     * @param OAuthClientRepositoryContract $oauthClientRepository
     */
    public function setOAuthClientRepository(OAuthClientRepositoryContract $oauthClientRepository)
    {
        $this->oauthClientRepository = $oauthClientRepository;
    }

    /**
     * @return DispositivoAlunoRepositoryContract
     */
    public function getDispositivoAlunoRepository()
    {
        if ($this->dispositivoAlunoRepository == null) {
            $this->dispositivoAlunoRepository = App::getInstance()->make('App\Repositories\Contracts\DispositivoAlunoRepositoryContract');
        }
        return $this->dispositivoAlunoRepository;
    }

    /**
     * @param DispositivoAlunoRepositoryContract $dispositivoAlunoRepository
     */
    public function setDispositivoAlunoRepository($dispositivoAlunoRepository)
    {
        $this->dispositivoAlunoRepository = $dispositivoAlunoRepository;
    }


}
