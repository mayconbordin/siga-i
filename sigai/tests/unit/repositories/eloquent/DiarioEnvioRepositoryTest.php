<?php

use AspectMock\Test;

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\DiarioEnvioRepository;
use App\Repositories\Eloquent\DiarioRepository;
use App\Models\Turma;
use App\Models\Professor;

use Carbon\Carbon;

use \DB;

class DiarioEnvioRepositoryTest extends TestCase
{
    protected $diarioEnvioRepository;
    protected $diarioRepository;

    public function __construct()
    {
        $this->diarioEnvioRepository = new DiarioEnvioRepository();
        $this->diarioRepository      = new DiarioRepository();
    }

    public function testInsert()
    {
        $month     = 7;
        $turma     = \App\Models\Turma::where('id', 2)->first();
        $professor = \App\Models\Professor::where('id', 49)->first();

        $diario = $this->diarioRepository->insert($month, $turma, $professor);

        $data = [
            'filename'  => md5($turma->id . "-" .$month) . '.pdf',
            'professor' => $professor,
            'diario'    => $diario
        ];

        $envio = $this->diarioEnvioRepository->insert($data);

        $this->assertNotNull($envio->id);
        $this->assertEquals($data['filename'], $envio->filename);
        $this->assertEquals($diario->id, $envio->diario->id);
        $this->assertEquals($professor->id, $envio->professor->id);
    }


    public function testFindById()
    {
        $month     = 7;
        $turma     = \App\Models\Turma::where('id', 2)->first();
        $professor = \App\Models\Professor::where('id', 49)->first();

        $diario = $this->diarioRepository->insert($month, $turma, $professor);

        $data = [
            'filename'  => md5($turma->id . "-" .$month) . '.pdf',
            'professor' => $professor,
            'diario'    => $diario
        ];

        $e = $this->diarioEnvioRepository->insert($data);

        $envio = $this->diarioEnvioRepository->findById($e->id);

        $this->assertEquals($e->id, $envio->id);
        $this->assertEquals($data['filename'], $envio->filename);
        $this->assertEquals($diario->id, $envio->diario->id);
        $this->assertEquals($professor->id, $envio->professor->id);
    }
}