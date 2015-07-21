<?php

use AspectMock\Test as t;
use \Mockery as m;

use App\Services\ChamadaService;

use Illuminate\Auth\Guard;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Filesystem\FilesystemAdapter;

use \DB;
use \Storage;

use Carbon\Carbon;

class ChamadaServiceTest extends TestCase
{
    protected $data = [
        'device_id' => 'client3id',
        'card_id'   => '111111',
        'timestamp' => '2014-08-05 18:20:00'
    ];

    public function testSaveSingleChamada()
    {
        $aula  = $this->mockAula();
        $aluno = $this->mockAluno();
        $usuario = $this->mockUsuario();

        $chamadaRepository = m::mock('App\Repositories\Contracts\ChamadaRepositoryContract');
        $chamadaRepository->shouldReceive('findByAulaAndAluno')
                          ->once()->with($aula->id, $aluno->id)->andThrow(new \App\Exceptions\NotFoundError());
        $chamadaRepository->shouldReceive('insertOrUpdate')->once()->with($aluno, m::any(), $aula);

        $aulaRepository = m::mock('App\Repositories\Contracts\AulaRepositoryContract');
        $aulaRepository->shouldReceive('findAulaByAlunoDeviceAndAmbienteDeviceAndData')
                       ->once()->with($this->data['device_id'], $this->data['card_id'], m::type(Carbon::class))->andReturn([$aula]);

        $alunoRepository = m::mock('App\Repositories\Contracts\AlunoRepositoryContract');
        $alunoRepository->shouldReceive('findByMatricula')
                        ->once()->with($usuario->matricula)->andReturn($aluno);

        $userRepository = m::mock('App\Repositories\Contracts\UserRepositoryContract');
        $userRepository->shouldReceive('findByDispositivo')
            ->once()->with($this->data['card_id'])->andReturn($usuario);


        $service = new ChamadaService($chamadaRepository, $aulaRepository, $alunoRepository, $userRepository);
        $service->saveSingleChamada($this->data);
    }

    protected function mockAula()
    {
        $aula = m::mock('App\Models\Aula');
        $aula->shouldReceive('getAttribute')->with('id')
            ->andReturn(1);
        $aula->shouldReceive('getAttribute')->with('data')
            ->andReturn(Carbon::create(2014, 8, 5));
        $aula->shouldReceive('getAttribute')->with('horario_inicio')
            ->andReturn(Carbon::createFromTime(18, 30, 0));
        $aula->shouldReceive('getAttribute')->with('horario_fim')
            ->andReturn(Carbon::createFromTime(22, 50, 0));

        return $aula;
    }

    protected function mockAluno()
    {
        $aluno = m::mock('App\Models\Aluno');
        $aluno->shouldReceive('getAttribute')
            ->with('id')
            ->andReturn(1);

        return $aluno;
    }

    protected function mockUsuario()
    {
        $usuario = m::mock('App\Models\User');
        $usuario->shouldReceive('getAttribute')
            ->with('id')
            ->andReturn(1);
        $usuario->shouldReceive('getAttribute')
            ->with('matricula')
            ->andReturn('15726');

        return $usuario;
    }
}