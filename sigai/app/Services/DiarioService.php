<?php namespace App\Services;

use App\Services\Contracts\DiarioServiceContract;
use App\Repositories\Contracts\DiarioRepositoryContract;
use App\Repositories\Contracts\TurmaRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Repositories\Contracts\UsuarioRepositoryContract;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;

use App\Exporters\ChamadaPDFExport;

use Illuminate\Contracts\Auth\Guard;
use \Storage;

class DiarioService implements DiarioServiceContract
{
    protected $auth;
    protected $diarioRepository;
    
    public function __construct(Guard $auth, DiarioRepositoryContract $diarioRepository,
            TurmaRepositoryContract $turmaRepository, ChamadaRepositoryContract $chamadaRepository,
            UsuarioRepositoryContract $usuarioRepository, AulaRepositoryContract $aulaRepository,
            ProfessorRepositoryContract $professorRepository)
    {
        $this->auth = $auth;
        $this->diarioRepository    = $diarioRepository;
        $this->turmaRepository     = $turmaRepository;
        $this->chamadaRepository   = $chamadaRepository;
        $this->usuarioRepository   = $usuarioRepository;
        $this->aulaRepository      = $aulaRepository;
        $this->professorRepository = $professorRepository;
        
        $this->diskDiarios = Storage::disk('diarios');
    }
    
    
    public function closeDiario($ucId, $turmaId, $month)
    {
        $usuario   = $this->auth->user();
        $turma     = $this->turmaRepository->findById($turmaId, $ucId);
        $professor = $this->professorRepository->findByMatricula($usuario->matricula);
        $diario    = $this->diarioRepository->insert($month, $turma, $professor);
        
        // send the document
        // save a record on the database about it
        // save it locally
        
        return $diario;
    }
    
    
    public function showDiario($ucId, $turmaId, $month = null)
    {
        $pdf = $this->export($ucId, $turmaId, $month);
        $pdf->Output();
    }
    
    public function saveDiario($filepath, $ucId, $turmaId, $month = null)
    {
        $pdf = $this->export($ucId, $turmaId, $month);
        $content = $pdf->Output('', 'S');
        
        $this->diskDiarios->put($filepath, $content);
    }
    
    protected function export($ucId, $turmaId, $month = null)
    {
        $professor = $this->auth->user();
	    $turma = $this->turmaRepository->findByIdWith($turmaId, $ucId, ['unidadeCurricular', 'professores', 'professores.usuario']);
	    $data  = $this->chamadaRepository->findFaltasByTurmaPerPeriod($turmaId, $month);

	    $pdf = new ChamadaPDFExport('L');
	    
	    foreach ($data->cursos as $curso) {
	        
	        $coordenador = $this->usuarioRepository->findById($curso->coordenador_id);
	    
	        foreach ($curso->chamada as $period => $faltas) {
	            $date = explode('-', $period);
	            $aulas = $this->aulaRepository->findByTurmaInMonth($turmaId, $date[1]);
	        
	            $pdf->init();
                $pdf->setTitle("CURSO SUPERIOR DE TECNOLOGIA EM " . $curso->nome);
                $pdf->setInformation($turma);
                $pdf->setTable($faltas, $data->dates[$period]);
            
            
                $pdf->init();
                
                
                $pdf->setConteudoTable($aulas, [
                    'professor'       => $professor->nome,
                    'coordenador'     => $coordenador->nome,
                    'superintendente' => 'Ane Lise Pereira da Costa Dalcul',
                    'professores'     => $turma->professores
                ]);
            }
        }
        
        return $pdf;
    }
}
