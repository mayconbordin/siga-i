<?php namespace App\Repositories\Eloquent;

use App\Models\Aluno;
use App\Models\DispositivoAluno;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Models\TipoDispositivo;
use App\Repositories\Contracts\DispositivoAlunoRepositoryContract;
use \DB;
use \Lang;
use \Log;

class DispositivoAlunoRepository extends BaseRepository implements DispositivoAlunoRepositoryContract
{
    public function findById($id)
    {
        $dispositivo = DispositivoAluno::with('tipo', 'aluno')->where('id', $id)->first();
	    
	    if ($dispositivo == null) {
	        throw new NotFoundError(Lang::get('dispositivos.not_found'));
	    }

	    return $dispositivo;
    }

    public function findByCodigo($codigo)
    {
        $dispositivo = DispositivoAluno::where('codigo', $codigo)->first();

	    if ($dispositivo == null) {
	        throw new NotFoundError(Lang::get('dispositivos.not_found'));
	    }

	    return $dispositivo;
    }

    public function searchByCodigo($query)
    {
        $dispositivos = DispositivoAluno::where('codigo', 'LIKE', $query.'%')->get();
        return $dispositivos;
    }
    
    public function listAll()
    {
        $dispositivos = DispositivoAluno::all();
        return $dispositivos;
    }
    
    public function paginate($orderBy = 'id', $perPage = 10)
    {
        $dispositivos = DispositivoAluno::with('tipo', 'aluno')->orderBy($orderBy)->paginate($perPage);
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

        $aluno = array_get($data, 'aluno', $dispositivo->aluno);

        if ($aluno != null) {
            if (!($aluno instanceof Aluno)) {
                throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
            }

            $dispositivo->aluno()->associate($aluno);
        }

	    if (!$dispositivo->save()) {
            throw new ServerError(Lang::get('dispositivos.save_error'));
        }
        
        return $dispositivo;
    }
    
    public function insert(array $data)
    {
        $dispositivo = new DispositivoAluno;
        $dispositivo->codigo = array_get($data, 'codigo');

        $tipo  = array_get($data, 'tipo');
        $aluno = array_get($data, 'aluno');

        if (!($tipo instanceof TipoDispositivo)) {
            throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
        }

        $dispositivo->tipo()->associate($tipo);

        if (!($aluno instanceof Aluno)) {
            throw new \InvalidArgumentException("Tipo deve ser do tipo TipoDispositivo");
        }

        $dispositivo->aluno()->associate($aluno);

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
