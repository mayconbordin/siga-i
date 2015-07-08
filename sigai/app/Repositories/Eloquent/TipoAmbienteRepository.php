<?php namespace App\Repositories\Eloquent;

use App\Models\TipoAmbiente;
use App\Models\TipoTipoAmbiente;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\TipoAmbienteRepositoryContract;
use App\Repositories\Contracts\AmbienteRepositoryContract;

use \DB;
use \Lang;
use \Log;
use \App;

class TipoAmbienteRepository extends BaseRepository implements TipoAmbienteRepositoryContract
{
    protected $ambienteRepository;

    public function findById($id)
    {
        $tipoAmbiente = TipoAmbiente::where('id', $id)->first();
	    
	    if ($tipoAmbiente == null) {
	        throw new NotFoundError(Lang::get('tipos_ambiente.not_found'));
	    }

	    return $tipoAmbiente;
    }
    
    public function findByNome($nome)
    {
        $tipoAmbiente = TipoAmbiente::where('nome', $nome)->first();
	    
	    if ($tipoAmbiente == null) {
	        throw new NotFoundError(Lang::get('tipos_ambiente.not_found'));
	    }

	    return $tipoAmbiente;
    }
    
    public function searchByName($query)
    {
        $tiposAmbiente = TipoAmbiente::where('nome', 'LIKE', $query.'%')->get();
        return $tiposAmbiente;
    }
    
    public function listAll()
    {
        $tiposAmbiente = TipoAmbiente::all();
        return $tiposAmbiente;
    }
    
    public function paginate($orderBy = 'nome', $perPage = 10)
    {
        $tiposAmbiente = TipoAmbiente::orderBy($orderBy)->paginate($perPage);
	    return $tiposAmbiente;
    }

    public function update(array $data, $id)
    {
        $tipoAmbiente = self::findById($id);
        $tipoAmbiente->nome = array_get($data, 'nome', $tipoAmbiente->nome);

	    if (!$tipoAmbiente->save()) {
            throw new ServerError(Lang::get('tipos_ambiente.save_error'));
        }
        
        return $tipoAmbiente;
    }
    
    public function insert(array $data)
    {
        $tipoAmbiente = new TipoAmbiente;
        $tipoAmbiente->nome  = array_get($data, 'nome');

	    if (!$tipoAmbiente->save()) {
            throw new ServerError(Lang::get('tipos_ambiente.create_error'));
        }
        
        return $tipoAmbiente;
    }
    
    public function deleteById($id)
    {
        $tipoAmbiente = TipoAmbiente::where('id', $id)->with('ambientes')->first();

        if ($tipoAmbiente == null) {
            throw new NotFoundError(Lang::get('tipos_ambiente.not_found'));
        }

        DB::beginTransaction();

        try {
            foreach ($tipoAmbiente->ambientes as $ambiente) {
                $this->getAmbienteRepository()->deleteById($ambiente->id);
            }

            $tipoAmbiente->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('tipos_ambiente.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }

    /**
     * @return AmbienteRepositoryContract
     */
    public function getAmbienteRepository()
    {
        if ($this->ambienteRepository == null) {
            $this->ambienteRepository = App::getInstance()->make('App\Repositories\Contracts\AmbienteRepositoryContract');
        }
        return $this->ambienteRepository;
    }

    /**
     * @param AmbienteRepositoryContract $ambienteRepository
     */
    public function setAmbienteRepository(AmbienteRepositoryContract $ambienteRepository)
    {
        $this->ambienteRepository = $ambienteRepository;
    }


}
