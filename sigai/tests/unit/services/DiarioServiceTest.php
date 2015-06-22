<?php

use AspectMock\Test as t;
use App\Models\User;
use App\Services\DiarioService;

use Illuminate\Auth\Guard;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Filesystem\FilesystemAdapter;

use \DB;
use \Storage;

use \Mockery as m;

class DiarioServicTest extends TestCase
{
    public function testCloseDiario()
    {
        $ucId    = 1;
        $turmaId = 2;
        $month   = 7;

        // Mock dos objetos model
        $user = m::mock('App\Models\User');
        $user->shouldReceive('getAttribute')
            ->with('matricula')
            ->andReturn('1234');

        $auth = m::mock('Illuminate\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn($user);

        $turma = m::mock('App\Models\Turma');
        $professor = m::mock('App\Models\Professor');

        $filename = md5($ucId . '-' . $turmaId . '-' . $month) . '.pdf';

        // Mock dos repositórios e o que eles esperam receber
        $diarioRepository = m::mock('App\Repositories\Eloquent\DiarioRepository');
        $diarioRepository->shouldReceive('insert')->once()->with($month, $turma, $professor)->andReturn(null);

        $turmaRepository = m::mock('App\Repositories\Eloquent\TurmaRepository');
        $turmaRepository->shouldReceive('findById')->once()->with($turmaId, $ucId)->andReturn($turma);

        $chamadaRepository     = m::mock('App\Repositories\Eloquent\ChamadaRepository');
        $usuarioRepository     = m::mock('App\Repositories\Eloquent\UsuarioRepository');
        $aulaRepository        = m::mock('App\Repositories\Eloquent\AulaRepository');

        $professorRepository = m::mock('App\Repositories\Eloquent\ProfessorRepository');
        $professorRepository->shouldReceive('findByMatricula')->once()->with($user->matricula)->andReturn($professor);

        $diarioEnvioRepository = m::mock('App\Repositories\Eloquent\DiarioEnvioRepository');
        $diarioEnvioRepository->shouldReceive('insert')
                              ->once()
                              ->with(['filename' => $filename, 'diario' => null, 'professor' => $professor])
                              ->andReturn(null);

        // Mock de um filesystem
        $fs = m::mock('Illuminate\Filesystem\FilesystemAdapter');
        $fs->shouldReceive('put')->twice()->andReturn(null);

        // Mock do gerenciador de storage
        $storage = t::double('Illuminate\Filesystem\FilesystemManager', ['disk' => $fs]);

        // Mock do pdf
        $pdf = m::mock('App\Exporters\ChamadaPDFExport');
        $pdf->shouldReceive('Output')->once()->andReturn(null);
        $pdf->shouldReceive('_destroy')->passthru();

        // Cria o serviço de diário
        $diarioService = new DiarioService($auth, $diarioRepository, $turmaRepository, $chamadaRepository,
            $usuarioRepository, $aulaRepository, $professorRepository, $diarioEnvioRepository);

        t::double($diarioService, ['export' => $pdf]);

        $diarioService->closeDiario($ucId, $turmaId, $month);


        $storage->verifyInvokedMultipleTimes('disk', 2);
    }
}