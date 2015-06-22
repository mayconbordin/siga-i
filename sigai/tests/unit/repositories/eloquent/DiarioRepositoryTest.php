<?php

use AspectMock\Test;

use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\DiarioRepository;
use App\Models\Turma;
use App\Models\Professor;

use Carbon\Carbon;

use \DB;

class DiarioRepositoryTest extends TestCase
{
    protected $diarioRepository;

    public function __construct()
    {
        $this->diarioRepository = new DiarioRepository();
    }

    public function testInsert()
    {
        $month     = 7;
        $turma     = \App\Models\Turma::where('id', 2)->first();
        $professor = \App\Models\Professor::where('id', 49)->first();

        $diario = $this->diarioRepository->insert($month, $turma, $professor);

        $this->assertEquals($month, $diario->mes);
        $this->assertEquals($turma->id, $diario->turma->id);
        $this->assertEquals($professor->id, $diario->professor->id);

        try {
            $this->diarioRepository->insert($month, $turma, $professor);
            $this->fail("Não deveria conseguir adicionar o mesmo diário duas vezes.");
        } catch (\App\Exceptions\ConflictError $e) {}
    }

    public function testFindByTurmaAndMonth()
    {
        $turma = Turma::where('id', 2)->first();
        $professor = \App\Models\Professor::where('id', 49)->first();

        for ($month=7; $month<=12; $month++) {
            $this->diarioRepository->insert($month, $turma, $professor);
        }

        $diario = $this->diarioRepository->findByTurmaAndMonth($turma, 7);

        $this->assertEquals(7, $diario->mes);
        $this->assertEquals($turma->id, $diario->turma->id);
        $this->assertEquals($professor->id, $diario->professor->id);
    }

    public function testInsertAheadOfTime()
    {
        $turmaDouble = Test::double('App\Models\Turma', ['isActive' => true]);

        $month     = 7;
        $today     = Carbon::createFromFormat('Y-m-d', '2014-02-10');
        $turma     = Turma::where('id', 2)->first();
        $professor = Professor::where('id', 49)->first();

        try {
            $diario = $this->diarioRepository->insert($month, $turma, $professor, $today);
            $this->fail("Diário deveria ter sido rejeitado.");
        } catch (\App\Exceptions\BadRequest $e) {}

        $turmaDouble->verifyInvoked('isActive');
    }

    public function testFindAllByTurmaEmpty()
    {
        $turma = Turma::where('id', 2)->first();

        $diarios = $this->diarioRepository->findAllByTurma($turma);

        $this->assertEquals(0, sizeof($diarios));
    }

    public function testFindAllByTurmaFill()
    {
        $turma = Turma::where('id', 2)->first();
        $professor = \App\Models\Professor::where('id', 49)->first();

        for ($month=7; $month<=12; $month++) {
            $this->diarioRepository->insert($month, $turma, $professor);
        }

        $diarios = $this->diarioRepository->findAllByTurma($turma);

        $this->assertEquals(6, sizeof($diarios));
    }

    public function testFindDiariosToClose()
    {
        $professor = \App\Models\Professor::where('id', 50)->first();
        $today = Carbon::createFromFormat('Y-m-d', '2015-05-01');
        $diarios = $this->diarioRepository->findDiariosToClose($professor, $today);

        $this->assertEquals(3, sizeof($diarios));
    }

    public function testFindDiariosToCloseByTurmaInactive()
    {
        $turma = Turma::where('id', 2)->first();
        $today = Carbon::createFromFormat('Y-m-d', '2015-05-01');
        $diarios = $this->diarioRepository->findDiariosToCloseByTurma($turma, $today);

        $this->assertEquals(6, sizeof($diarios));

        // verifica se os meses correspondem ao segundo semestre
        for ($i=0,$j=7; $i <6; $i++,$j++) {
            $this->assertEquals($j, $diarios[$i]);
        }
    }

    public function testFindDiariosToCloseByTurmaActive()
    {
        $turma = Turma::where('id', 3)->first();
        $today = Carbon::createFromFormat('Y-m-d', '2015-05-01');
        $diarios = $this->diarioRepository->findDiariosToCloseByTurma($turma, $today);

        $this->assertEquals(4, sizeof($diarios));

        // verifica se os meses correspondem ao interval 2-5
        for ($i=0,$j=2; $i <4; $i++,$j++) {
            $this->assertEquals($j, $diarios[$i]);
        }
    }

    public function testExists()
    {
        $result = $this->diarioRepository->exists(2, 7);
        $this->assertFalse($result);
    }

    public function testExistsTrue()
    {
        $this->diarioRepository->insert(7, Turma::where('id', 2)->first(), Professor::where('id', 49)->first());

        $result = $this->diarioRepository->exists(2, 7);
        $this->assertTrue($result);
    }
}