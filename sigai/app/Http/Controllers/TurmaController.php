<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarTurmaRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use App\Services\Contracts\CursoServiceContract;
use App\Services\Contracts\DiarioServiceContract;
use App\Services\Contracts\TurmaServiceContract;
use App\Services\Contracts\UnidadeCurricularServiceContract;

use \Input;
use \Lang;
use \DB;

class TurmaController extends Controller
{
    protected $service;
    protected $diarioService;
    protected $ucService;
    protected $cursoService;
    
    public function __construct(TurmaServiceContract $service, DiarioServiceContract $diarioService,
                                UnidadeCurricularServiceContract $ucService, CursoServiceContract $cursoService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service       = $service;
        $this->diarioService = $diarioService;
        $this->ucService     = $ucService;
        $this->cursoService  = $cursoService;
    }
    
    public function listar()
    {
        return view('turmas.index');
    }

	public function mostrar($ucId, $id)
	{
        try {
            $ucs    = $this->ucService->listAll();
            $cursos = $this->cursoService->listAll();
            $data   = $this->service->showFull($ucId, $id);

            return view('turmas.criar_mostrar', [
		        'turma'                => $data->turma,
		        'unidadeCurricular'    => $data->turma->unidadeCurricular,
		        'unidadesCurriculares' => $ucs,
		        'faltas'               => $data->faltas['faltas'],
		        'periods'              => $data->faltas['periods'],
		        'cursos'               => $cursos,
		        'alunos'               => $data->alunos,
		        'diariosToClose'       => $data->diariosToClose,
		        'diarios'              => $data->diarios
		    ]);
        } catch (NotFoundError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        } catch (ValidationError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        }
	}
	
	public function editar(SalvarTurmaRequest $request, $ucId, $id)
	{
	    try {
            $turma = $this->service->edit($request->all(), $ucId, $id);
	    
	        return redirect()->action('TurmaController@mostrar', [$turma->unidade_curricular_id, $id])
	                         ->with('success', Lang::get('turmas.saved'));
	    } catch (NotFoundError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        } catch (ValidationError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        } catch (ServerError $e) {
             return redirect()->action('TurmaController@mostrar', [$ucId, $id])
	                          ->with('error', Lang::get('turmas.save_error'));
        }
	}
	
	public function salvar(SalvarTurmaRequest $request, $ucId)
	{
	    try {
            $turma = $this->service->save($request->all(), $ucId);

	        return redirect()->action('TurmaController@mostrar', [$ucId, $turma->id])
	                         ->with('success', Lang::get('turmas.saved'));
	    } catch (NotFoundError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        } catch (ValidationError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
                             ->with('error', $e->getMessage());
        } catch (ServerError $e) {
             return redirect()->action('UnidadeCurricularController@mostrar', [$ucId])
	                          ->with('error', Lang::get('turmas.create_error'));
        }
	}

	public function exportar($ucId, $turmaId, $month = null)
	{
        $this->diarioService->showDiario($ucId, $turmaId, $month);
	}

    public function verEnvio($ucId, $turmaId, $month, $envioId)
    {
        $pdf = $this->diarioService->getDiarioEnvio($ucId, $turmaId, $month, $envioId);

        return response($pdf['content'], 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$pdf['name'],
        ]);
    }
}
