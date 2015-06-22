<?php namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\UnidadeCurricular;

use App\Http\Requests\SalvarTurmaRequest;

use App\Repositories\AlunoRepository;
use App\Repositories\CursoRepository;
use App\Repositories\AulaRepository;
use App\Repositories\UsuarioRepository;
use App\Repositories\TurmaRepository;
use App\Repositories\ChamadaRepository;
use App\Repositories\UnidadeCurricularRepository;
use App\Repositories\DiarioRepository;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;

use App\Exporters\ChamadaPDFExport;

use App\Services\Contracts\DiarioServiceContract;
use Carbon\Carbon;
use \Input;
use \Lang;
use \DB;

class TurmaController extends Controller {

    protected $diarioService;
    
    public function __construct(DiarioServiceContract $diarioService)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->diarioService = $diarioService;
    }
    
    public function listar()
    {
        return view('turmas.index');
    }

	public function mostrar($ucId, $id)
	{
        try {
            $turma  = TurmaRepository::findByIdWithAll($id, $ucId);
            $ucs    = UnidadeCurricularRepository::listAll();
            $faltas = ChamadaRepository::findFaltasByTurma($turma->id);
            $cursos = CursoRepository::listAll();
            $alunos = AlunoRepository::findByTurmaWithPivot($turma->id);
            $diariosToClose = DiarioRepository::findDiariosToCloseByTurma($turma);
            
            $diarios = DiarioRepository::findAllByTurma($turma);

            return view('turmas.criar_mostrar', [
		        'turma'                => $turma,
		        'unidadeCurricular'    => $turma->unidadeCurricular,
		        'unidadesCurriculares' => $ucs,
		        'faltas'               => $faltas['faltas'],
		        'periods'              => $faltas['periods'],
		        'cursos'               => $cursos,
		        'alunos'               => $alunos,
		        'diariosToClose'       => $diariosToClose,
		        'diarios'              => $diarios
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
	        $turma = TurmaRepository::update($request->all(), $ucId, $id);
	    
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
	        $turma = TurmaRepository::insert($request->all(), $ucId);
	    
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

}
