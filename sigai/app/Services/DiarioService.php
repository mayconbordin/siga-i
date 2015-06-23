<?php namespace App\Services;

use App\Repositories\Contracts\DiarioEnvioRepositoryContract;
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
use Carbon\Carbon;

class DiarioService implements DiarioServiceContract
{
    protected $auth;
    protected $diarioRepository;
    protected $turmaRepository;
    protected $chamadaRepository;
    protected $usuarioRepository;
    protected $aulaRepository;
    protected $professorRepository;
    protected $diarioEnvioRepository;
    protected $diskDiarios;
    protected $diskLocal;
    
    public function __construct(Guard $auth, DiarioRepositoryContract $diarioRepository,
            TurmaRepositoryContract $turmaRepository, ChamadaRepositoryContract $chamadaRepository,
            UsuarioRepositoryContract $usuarioRepository, AulaRepositoryContract $aulaRepository,
            ProfessorRepositoryContract $professorRepository, DiarioEnvioRepositoryContract $diarioEnvioRepository)
    {
        $this->auth                  = $auth;
        $this->diarioRepository      = $diarioRepository;
        $this->turmaRepository       = $turmaRepository;
        $this->chamadaRepository     = $chamadaRepository;
        $this->usuarioRepository     = $usuarioRepository;
        $this->aulaRepository        = $aulaRepository;
        $this->professorRepository   = $professorRepository;
        $this->diarioEnvioRepository = $diarioEnvioRepository;
        
        $this->diskDiarios           = Storage::disk('diarios');
        $this->diskLocal             = Storage::disk('local');
    }
    
    
    public function closeDiario($ucId, $turmaId, $month)
    {
        $usuario   = $this->auth->user();
        $turma     = $this->turmaRepository->findById($turmaId, $ucId);
        $professor = $this->professorRepository->findByMatricula($usuario->matricula);
        $diario    = $this->diarioRepository->insert($month, $turma, $professor);

        $filename = md5($ucId . '-' . $turmaId . '-' . $month) . '.pdf';

        // save a record on the database about it
        $envio = $this->diarioEnvioRepository->insert([
            'filename'  => $filename,
            'diario'    => $diario,
            'professor' => $professor
        ]);

        // save it
        $this->saveDiario($filename, $ucId, $turmaId, $month);
        
        return $diario;
    }

    public function sendDiario($ucId, $turmaId, $month)
    {
        $now = Carbon::now()->toDateTimeString();

        $usuario   = $this->auth->user();
        $turma     = $this->turmaRepository->findById($turmaId, $ucId);
        $professor = $this->professorRepository->findByMatricula($usuario->matricula);
        $diario    = $this->diarioRepository->findByTurmaAndMonth($turma, $month);

        $filename = md5($ucId . '-' . $turmaId . '-' . $month . '-' . $now) . '.pdf';

        // save a record on the database about it
        $envio = $this->diarioEnvioRepository->insert([
            'filename'  => $filename,
            'diario'    => $diario,
            'professor' => $professor
        ]);

        // save it
        $this->saveDiario($filename, $ucId, $turmaId, $month);

        return $envio;
    }

    public function showDiario($ucId, $turmaId, $month = null)
    {
        $pdf = $this->export($ucId, $turmaId, $month);
        $pdf->Output();
    }
    
    public function saveDiario($filepath, $ucId, $turmaId, $month = null)
    {
        $pdf     = $this->export($ucId, $turmaId, $month);
        $content = $pdf->Output('', 'S');
        
        $this->diskDiarios->put($filepath, $content);
        $this->diskLocal->put($filepath, $content);
    }

    public function getDiarioEnvio($ucId, $turmaId, $month, $envioId)
    {
        $envio = $this->diarioEnvioRepository->findById($envioId);
        $pdf   = $this->diskLocal->get($envio->filename);

        return ['name' => $envio->filename, 'content' => $pdf];
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
                    'professores'     => $turma->professores,
                    'mes'             => (int) $date[1]
                ]);
            }
        }
        
        return $pdf;
    }
}
