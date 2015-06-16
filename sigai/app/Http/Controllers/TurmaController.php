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

use Carbon\Carbon;
use \Input;
use \Lang;
use \DB;

use App\Services\Contracts\DiarioServiceContract;

class TurmaController extends Controller {

    protected $service;
    
    public function __construct(DiarioServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');
        
        
        
        $this->service = $service;
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
	    
	        return redirect()->action('TurmaController@mostrar', [$ucId, $id])
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
	    $professor = \Auth::user();

	    $turma = TurmaRepository::findByIdWith($turmaId, $ucId, [
	        'unidadeCurricular', 'professores', 'professores.usuario']);
	    $data = ChamadaRepository::findFaltasByTurmaPerPeriod($turmaId, $month);

	    $pdf = new ChamadaPDFExport('L');
	    
	    foreach ($data->cursos as $curso) {
	        
	        $coordenador = UsuarioRepository::findById($curso->coordenador_id);
	    
	        foreach ($curso->chamada as $period => $faltas) {
	            $date = explode('-', $period);
	            $aulas = AulaRepository::findByTurmaInMonth($turmaId, $date[1]);
	        
	            $pdf->init();
                $pdf->setTitle("CURSO SUPERIOR DE TECNOLOGIA EM " . $curso->nome);
                $pdf->setInformation($turma);
                $pdf->setTable($faltas, $data->dates[$period]);
            
            
                $pdf->init();
                
                
                $pdf->setConteudoTable($aulas, [
                    'professor'       => $professor->nome,
                    'coordenador'     => $coordenador->nome,
                    'superintendente' => 'Ane Lise Pereira da Costa Dalcul',
                    'professores'     => $turma->professores,
                    'mes'             => (int) $date[1]
                ]);
            }
        }

        $pdf->Output();
	}

}
