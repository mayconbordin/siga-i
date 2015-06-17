<?php

use App\Exceptions\NotFoundError;

use Carbon\Carbon;

use \DB;

class ChamadaRepositoryTest extends TestCase
{
    protected $chamadaRepository;

    function __construct()
    {
        $this->chamadaRepository = new \App\Repositories\Eloquent\ChamadaRepository();
    }

    public function testeFindByAulaAndAluno()
    {
        $aulaId  = 21;
        $alunoId = 1;

        $chamada = $this->chamadaRepository->findByAulaAndAluno($aulaId, $alunoId);

        $this->assertEquals($aulaId, $chamada->aula_id);
        $this->assertEquals($alunoId, $chamada->aluno_id);
    }

    public function testeFindByAulaAndAlunoNotFound()
    {
        $aulaId  = 1000;
        $alunoId = 1;

        try {
            $chamada = $this->chamadaRepository->findByAulaAndAluno($aulaId, $alunoId);
            $this->fail("Deveria retornar um erro, a aula com ID $aulaId não existe.");
        } catch (NotFoundError $e) { }
    }

    public function testInsertOrUpdateExisting()
    {
        $aula  = \App\Models\Aula::where('id', 21)->first();
        $aluno = \App\Models\Aluno::where('id', 1)->first();

        $periods = [true, false, false, true];

        $chamada = $this->chamadaRepository->insertOrUpdate($aluno, $periods, $aula);

        $this->assertEquals($aula->id, $chamada->aula_id);
        $this->assertEquals($aluno->id, $chamada->aluno_id);
        $this->assertEquals($periods[0], $chamada->p1);
        $this->assertEquals($periods[1], $chamada->p2);
        $this->assertEquals($periods[2], $chamada->p3);
        $this->assertEquals($periods[3], $chamada->p4);
    }

    public function testInsertOrUpdateNew()
    {
        $aula  = \App\Models\Aula::where('id', 113)->first();
        $aluno = \App\Models\Aluno::where('id', 1)->first();

        $periods = [true, false, false, true];

        $chamada = $this->chamadaRepository->insertOrUpdate($aluno, $periods, $aula);

        $this->assertEquals($aula->id, $chamada->aula_id);
        $this->assertEquals($aluno->id, $chamada->aluno_id);
        $this->assertEquals($periods[0], $chamada->p1);
        $this->assertEquals($periods[1], $chamada->p2);
        $this->assertEquals($periods[2], $chamada->p3);
        $this->assertEquals($periods[3], $chamada->p4);
    }

    public function testInsertOrUpdateInvalid()
    {
        $aula  = \App\Models\Aula::where('id', 113)->first();
        $aluno = \App\Models\Aluno::where('id', 1)->first();

        $periods = [true, "one", false, "three"];

        try {
            $chamada = $this->chamadaRepository->insertOrUpdate($aluno, $periods, $aula);
            $this->fail("Deveria ter ocorrido erro de validação, os períodos contém valores inválidos.");
        } catch (\App\Exceptions\ValidationError $e) {}
    }

    public function testInsertOrUpdateAll()
    {
        $aula  = \App\Models\Aula::where('id', 21)->first();

        $data = [
            ['aluno' => \App\Models\Aluno::where('id', 1)->first(), 'periods' => [true, false, false, true]],
            ['aluno' => \App\Models\Aluno::where('id', 1)->first(), 'periods' => [true, false, false, true]],
        ];

        $chamadas = $this->chamadaRepository->insertOrUpdateAll($data, $aula);

        foreach ($chamadas as $i => $chamada) {
            $this->assertEquals($aula->id, $chamada->aula_id);
            $this->assertEquals($data[$i]['aluno']->id, $chamada->aluno_id);
            $this->assertEquals($data[$i]['periods'][0], $chamada->p1);
            $this->assertEquals($data[$i]['periods'][1], $chamada->p2);
            $this->assertEquals($data[$i]['periods'][2], $chamada->p3);
            $this->assertEquals($data[$i]['periods'][3], $chamada->p4);
        }

        $this->chamadaRepository->findByAulaAndAluno($aula->id, $data[0]['aluno']->id);
        $this->chamadaRepository->findByAulaAndAluno($aula->id, $data[1]['aluno']->id);
    }

    public function testFindFaltasByTurma()
    {
        $turmaId = 2;
        $result = $this->chamadaRepository->findFaltasByTurma($turmaId);

        $this->assertEquals(26, sizeof($result['faltas']));
        $this->assertEquals(5, sizeof($result['periods']));

        $year = 2014;
        $month = 8;

        // verifica se todos os meses foram listados
        foreach ($result['periods'] as $period) {
            $this->assertEquals($year, (int) $period['year']);
            $this->assertEquals($month, (int) $period['month']);
            $month++;
        }

        // verifica se a porcentagem de faltas foi calculada corretamente
        foreach ($result['faltas'] as $matricula => $aluno) {
            $this->assertEquals($matricula, $aluno->matricula);
            $this->assertEquals(5, sizeof($aluno->faltas));

            $p = ($aluno->total_faltas * 100)/$aluno->total_periodos;

            $this->assertEquals($p, $aluno->pFaltas);
        }
    }

    public function testFindFaltasByTurmaPerPeriod()
    {
        $turmaId = 2;
        $result = $this->chamadaRepository->findFaltasByTurmaPerPeriod($turmaId);

        $dates = ['2014-8' => 4, '2014-9' => 5, '2014-10' => 2];

        // verifica se as datas existem
        $this->assertEquals(array_keys($dates), array_keys($result->dates));

        // verifica se a quantidade de dias em cada mês está correta
        foreach ($result->dates as $key => $days) {
            $this->assertEquals($dates[$key], sizeof($days));
        }

        // verifica se possui o número correto de cursos
        $this->assertEquals(3, sizeof($result->cursos));

        // verifica se cada curso tem o número correto de períodos
        foreach ($result->cursos as $curso) {
            $this->assertEquals(3, sizeof($curso->chamada));
        }
    }
}