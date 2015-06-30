<?php namespace App\Repositories\Eloquent;

use App\Models\Ambiente;
use App\Models\TipoAmbiente;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\AmbienteRepositoryContract;

use \DB;
use \Lang;
use \Log;
use \App;

class AmbienteRepository extends BaseRepository implements AmbienteRepositoryContract
{
    protected $turmaRepository;
    protected $aulaRepository;

    public function findById($id)
    {
        $ambiente = Ambiente::where('id', $id)->first();
	    
	    if ($ambiente == null) {
	        throw new NotFoundError(Lang::get('ambientes.not_found'));
	    }

	    return $ambiente;
    }
    
    public function findByNome($nome)
    {
        $ambiente = Ambiente::where('nome', $nome)->first();
	    
	    if ($ambiente == null) {
	        throw new NotFoundError(Lang::get('ambientes.not_found'));
	    }

	    return $ambiente;
    }
    
    public function searchByName($query)
    {
        $ambientes = Ambiente::where('nome', 'LIKE', $query.'%')->get();
        return $ambientes;
    }
    
    public function listAll()
    {
        $ambientes = Ambiente::all();
        return $ambientes;
    }
    
    public function paginate($orderBy = 'nome', $perPage = 10)
    {
        $ambientes = Ambiente::with('tipo')->orderBy($orderBy)->paginate($perPage);
	    return $ambientes;
    }

    public function update(array $data, $id)
    {
        $ambiente = self::findById($id);
        $ambiente->nome = array_get($data, 'nome', $ambiente->nome);

        $tipo = array_get($data, 'tipo', $ambiente->tipo);

        if (!($tipo instanceof TipoAmbiente)) {
            throw new \InvalidArgumentException("Tipo deve ser do tipo TipoAmbiente");
        }

        $ambiente->tipo()->associate($tipo);

	    if (!$ambiente->save()) {
            throw new ServerError(Lang::get('ambientes.save_error'));
        }
        
        return $ambiente;
    }
    
    public function insert(array $data)
    {
        $ambiente = new Ambiente;
        $ambiente->nome  = array_get($data, 'nome');

        $tipo = array_get($data, 'tipo');

        if (!($tipo instanceof TipoAmbiente)) {
            throw new \InvalidArgumentException("Tipo deve ser do tipo TipoAmbiente");
        }

        $ambiente->tipo()->associate($tipo);

	    if (!$ambiente->save()) {
            throw new ServerError(Lang::get('ambientes.create_error'));
        }
        
        return $ambiente;
    }
    
    public function deleteById($id)
    {
        $ambiente = Ambiente::where('id', $id)->first();

        if ($ambiente == null) {
            throw new NotFoundError(Lang::get('ambientes.not_found'));
        }

        DB::beginTransaction();

        try {
            // disassocia o ambiente das turmas e aulas
            $this->getTurmaRepository()->dissociateAmbiente($ambiente);
            $this->getAulaRepository()->dissociateAmbiente($ambiente);

            $ambiente->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServerError(Lang::get('ambientes.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }


    /**
     * @return TurmaRepositoryContract
     */
    public function getTurmaRepository()
    {
        if ($this->turmaRepository == null) {
            $this->turmaRepository = App::getInstance()->make('App\Repositories\Contracts\TurmaRepositoryContract');
        }
        return $this->turmaRepository;
    }

    /**
     * @return AulaRepositoryContract
     */
    public function getAulaRepository()
    {
        if ($this->aulaRepository == null) {
            $this->aulaRepository = App::getInstance()->make('App\Repositories\Contracts\AulaRepositoryContract');
        }
        return $this->aulaRepository;
    }

    public function setTurmaRepository(TurmaRepositoryContract $turmaRepository)
    {
        $this->turmaRepository = $turmaRepository;
    }

    public function setAulaRepository(AulaRepositoryContract $aulaRepository)
    {
        $this->aulaRepository = $aulaRepository;
    }
}
