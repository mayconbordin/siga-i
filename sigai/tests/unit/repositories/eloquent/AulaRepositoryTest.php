<?php

use App\Exceptions\NotFoundError;

use Carbon\Carbon;

//use \DB;

class AulaRepositoryTest extends TestCase
{
    protected $aulaRepository;

    function __construct()
    {
        $this->aulaRepository = new \App\Repositories\Eloquent\AulaRepository();
    }

    public function testExists()
	{
        $exists = $this->aulaRepository->exists(2, Carbon::createFromFormat('Y-m-d', '2014-08-05'));
		$this->assertTrue($exists);
	}

    public function testFindByTurmaBetweenDates()
    {
        $aulas = $this->aulaRepository->findByTurmaBetweenDates(2);

        $this->assertEquals(20, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2, $aula->turma_id);
        }
    }

    public function testFindByTurmaBetweenDatesWithStart()
    {
        $aulas = $this->aulaRepository->findByTurmaBetweenDates(2, Carbon::createFromFormat('Y-m-d', '2014-09-01'));

        $this->assertEquals(16, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2, $aula->turma_id);
        }
    }

    public function testFindByTurmaBetweenDatesWithStartAndEnd()
    {
        $start = Carbon::createFromFormat('Y-m-d', '2014-09-01');
        $end   = Carbon::createFromFormat('Y-m-d', '2014-10-01');
        $aulas = $this->aulaRepository->findByTurmaBetweenDates(2, $start, $end);

        $this->assertEquals(5, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2, $aula->turma_id);
        }
    }

    public function testFindByTurmaInMonth()
    {
        $aulas = $this->aulaRepository->findByTurmaInMonth(2, 11);

        $this->assertEquals(4, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2, $aula->turma_id);
            $this->assertEquals(11, $aula->data->month);
        }
    }

    public function testFindById()
    {
        $aulaId  = 1;
        $turmaId = 2;
        $ucId    = 1;

        $aula = $this->aulaRepository->findById($aulaId, $turmaId, $ucId);
    }

    public function testFindByIdInvalid()
    {
        $aulaId  = 1;
        $turmaId = 2;
        $ucId    = 1;

        try {
            $this->aulaRepository->findById($aulaId, $turmaId, 3);
            $this->fail("Deveria ter falhado, a turma com ID $turmaId pertence a UC com ID $ucId");
        } catch (\App\Exceptions\ValidationError $e) {}
    }

    public function testFindByIdNotFound()
    {
        $aulaId  = 1889;
        $turmaId = 2;
        $ucId    = 1;

        try {
            $this->aulaRepository->findById($aulaId, $turmaId, 3);
            $this->fail("Deveria ter falhado, a aula com ID $aulaId não existe.");
        } catch (\App\Exceptions\NotFoundError $e) {}
    }

    public function testFindByData()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-05');
        $turmaId = 2;
        $ucId    = 1;

        $aula = $this->aulaRepository->findByData($data, $turmaId, $ucId);

        $this->assertEquals(1, $aula->id);
        $this->assertEquals($turmaId, $aula->turma_id);
        $this->assertEquals($data->format('Y-m-d'), $aula->data->format('Y-m-d'));
    }

    public function testFindByDataInvalid()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-05');
        $turmaId = 2;
        $ucId    = 1;

        try {
            $aula = $this->aulaRepository->findByData($data, $turmaId, 3);
            $this->fail("Deveria ter falhado, a turma com ID $turmaId pertence a UC com ID $ucId");
        } catch (\App\Exceptions\ValidationError $e) {}
    }

    public function testFindByDataNotFound()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-03');
        $turmaId = 2;
        $ucId    = 1;

        try {
            $aula = $this->aulaRepository->findByData($data, $turmaId, 3);
            $this->fail("Deveria ter falhado, a aula com data ".$data->format('Y-m-d')." não existe.");
        } catch (\App\Exceptions\NotFoundError $e) {}
    }

    public function testFindByDataWithAll()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-05');
        $turmaId = 2;
        $ucId    = 1;

        $aula = $this->aulaRepository->findByDataWithAll($data, $turmaId, $ucId);

        $this->assertEquals(1, $aula->id);
        $this->assertEquals($turmaId, $aula->turma->id);
        $this->assertEquals($ucId, $aula->turma->unidadeCurricular->id);
        $this->assertEquals($data->format('Y-m-d'), $aula->data->format('Y-m-d'));
        $this->assertEquals(26, sizeof($aula->chamadas));
    }

    public function testFindByDataWithAllInvalid()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-05');
        $turmaId = 2;
        $ucId    = 1;

        try {
            $aula = $this->aulaRepository->findByDataWithAll($data, $turmaId, 3);
            $this->fail("Deveria ter falhado, a turma com ID $turmaId pertence a UC com ID $ucId");
        } catch (\App\Exceptions\ValidationError $e) {}
    }

    public function testFindByDataWithAllNotFound()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-03');
        $turmaId = 2;
        $ucId    = 1;

        try {
            $aula = $this->aulaRepository->findByDataWithAll($data, $turmaId, 3);
            $this->fail("Deveria ter falhado, a aula com data ".$data->format('Y-m-d')." não existe.");
        } catch (\App\Exceptions\NotFoundError $e) {}
    }

    public function testFindNextByProfessor()
    {
        $data  = Carbon::createFromFormat('Y-m-d', '2014-10-01');
        $aulas = $this->aulaRepository->findNextByProfessor(49, $data);

        $this->assertEquals(5, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertTrue($aula->turma_id == 2 || $aula->turma_id == 4);
            $this->assertTrue($aula->data->gte($data));
        }
    }

    public function testFindNextByProfessorLimit()
    {
        $data  = Carbon::createFromFormat('Y-m-d', '2014-10-01');
        $aulas = $this->aulaRepository->findNextByProfessor(49, $data, 100);

        $this->assertEquals(22, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertTrue($aula->turma_id == 2 || $aula->turma_id == 4);
            $this->assertTrue($aula->data->gte($data));
        }
    }

    public function testDeleteByData()
    {
        $data    = Carbon::createFromFormat('Y-m-d', '2014-08-05');
        $turmaId = 2;
        $ucId    = 1;

        $this->aulaRepository->deleteByData($data, $turmaId, $ucId);

        try {
            $this->aulaRepository->findByData($data, $turmaId, $ucId);
            $this->fail("Deveria ter falhado, a aula com data ".$data->format('Y-m-d')." não existe.");
        } catch (\App\Exceptions\NotFoundError $e) {}
    }

    public function testInsert()
    {
        $turmaId = 2;
        $ucId    = 1;
        $turma = \App\Models\Turma::where('id', $turmaId)->first();

        $data = [
            'data'           => Carbon::createFromFormat('Y-m-d', '2014-08-06'),
            'conteudo'       => 'teste',
            'horario_inicio' => Carbon::createFromFormat('H:i:s', '18:30:00'),
            'horario_fim'    => Carbon::createFromFormat('H:i:s', '22:30:00'),
            'professor'      => \App\Models\Professor::find(49)
        ];

        $aula = $this->aulaRepository->insert($data, $turma);

        $this->assertNotNull($aula->id);
        $this->assertEquals($data['data']->format('Y-m-d'), $aula->data->format('Y-m-d'));
        $this->assertEquals($data['conteudo'], $aula->conteudo);
        $this->assertEquals($data['horario_inicio']->format('H:i:s'), $aula->horario_inicio->format('H:i:s'));
        $this->assertEquals($data['horario_fim']->format('H:i:s'), $aula->horario_fim->format('H:i:s'));
        $this->assertEquals($data['professor']->id, $aula->professor->id);

        $this->aulaRepository->findById($aula->id, $turmaId, $ucId);
    }

    public function testInsertWithAmbiente()
    {
        $turmaId = 2;
        $ucId    = 1;
        $turma = \App\Models\Turma::where('id', $turmaId)->first();

        $data = [
            'data'           => Carbon::createFromFormat('Y-m-d', '2014-08-06'),
            'conteudo'       => 'teste',
            'horario_inicio' => Carbon::createFromFormat('H:i:s', '18:30:00'),
            'horario_fim'    => Carbon::createFromFormat('H:i:s', '22:30:00'),
            'ambiente'       => \App\Models\Ambiente::find(1),
            'professor'      => \App\Models\Professor::find(49)
        ];

        $aula = $this->aulaRepository->insert($data, $turma);

        $this->assertNotNull($aula->id);
        $this->assertEquals($data['data']->format('Y-m-d'), $aula->data->format('Y-m-d'));
        $this->assertEquals($data['conteudo'], $aula->conteudo);
        $this->assertEquals($data['horario_inicio']->format('H:i:s'), $aula->horario_inicio->format('H:i:s'));
        $this->assertEquals($data['horario_fim']->format('H:i:s'), $aula->horario_fim->format('H:i:s'));
        $this->assertEquals($data['ambiente']->id, $aula->ambiente->id);
        $this->assertEquals($data['professor']->id, $aula->professor->id);

        $this->aulaRepository->findById($aula->id, $turmaId, $ucId);
    }

    public function testInsertExists()
    {
        $turmaId = 2;
        $ucId    = 1;
        $turma = \App\Models\Turma::where('id', $turmaId)->first();

        $data = [
            'data'           => Carbon::createFromFormat('Y-m-d', '2014-08-05'),
            'conteudo'       => 'teste',
            'horario_inicio' => Carbon::createFromFormat('H:i:s', '18:30:00'),
            'horario_fim'    => Carbon::createFromFormat('H:i:s', '22:30:00'),
            'professor'      => \App\Models\Professor::find(49)
        ];

        try {
            $this->aulaRepository->insert($data, $turma);
            $this->fail("Deveria ocorrer um erro, a aula já existe.");
        } catch (\App\Exceptions\ValidationError $e) {
            $errors = $e->getErrors();
            $this->assertTrue(isset($errors['data']));
        }
    }

    public function testInsertOutsidePeriod()
    {
        $turmaId = 2;
        $ucId    = 1;
        $turma = \App\Models\Turma::where('id', $turmaId)->first();

        $data = [
            'data'           => Carbon::createFromFormat('Y-m-d', '2015-08-05'),
            'conteudo'       => 'teste',
            'horario_inicio' => Carbon::createFromFormat('H:i:s', '18:30:00'),
            'horario_fim'    => Carbon::createFromFormat('H:i:s', '22:30:00'),
            'professor'      => \App\Models\Professor::find(49)
        ];

        try {
            $this->aulaRepository->insert($data, $turma);
            $this->fail("Deveria ocorrer um erro, a data aula está fora do período da turma.");
        } catch (\App\Exceptions\ValidationError $e) {
            $errors = $e->getErrors();
            $this->assertTrue(isset($errors['data']));
        }
    }

    public function testUpdate()
    {
        $turmaId = 2;
        $ucId    = 1;

        $data = [
            'data'     => Carbon::createFromFormat('Y-m-d', '2014-08-05'),
            'conteudo' => 'teste',
        ];

        $aula = $this->aulaRepository->update($data, $ucId, $turmaId, $data['data']);

        $this->assertNotNull($aula->id);
        $this->assertEquals($data['data']->format('Y-m-d'), $aula->data->format('Y-m-d'));
        $this->assertEquals($data['conteudo'], $aula->conteudo);
    }

    public function testUpdateChangeDate()
    {
        $turmaId = 2;
        $ucId    = 1;
        $date = Carbon::createFromFormat('Y-m-d', '2014-08-05');

        $data = [
            'data'     => Carbon::createFromFormat('Y-m-d', '2014-08-06'),
            'conteudo' => 'teste',
        ];

        $aula = $this->aulaRepository->update($data, $ucId, $turmaId, $date);

        $this->assertNotNull($aula->id);
        $this->assertEquals($data['data']->format('Y-m-d'), $aula->data->format('Y-m-d'));
        $this->assertEquals($data['conteudo'], $aula->conteudo);
    }

    public function testUpdateChangeDateOutsidePeriod()
    {
        $turmaId = 2;
        $ucId    = 1;
        $date = Carbon::createFromFormat('Y-m-d', '2014-08-05');

        $data = [
            'data'     => Carbon::createFromFormat('Y-m-d', '2015-08-06'),
            'conteudo' => 'teste',
        ];

        try {
            $aula = $this->aulaRepository->update($data, $ucId, $turmaId, $date);
            $this->fail("Deveria receber erro, pois a data está fora do período da turma.");
        } catch (\App\Exceptions\ValidationError $e) {
            $errors = $e->getErrors();
            $this->assertTrue(isset($errors['data']));
        }
    }

    public function testUpdateData()
    {
        $id      = 1;
        $turmaId = 2;
        $ucId    = 1;
        $newDate = Carbon::createFromFormat('Y-m-d', '2014-12-06');

        $aula = $this->aulaRepository->updateData($ucId, $turmaId, $id, $newDate);

        $this->assertNotNull($aula->id);
        $this->assertEquals($newDate->format('Y-m-d'), $aula->data->format('Y-m-d'));
    }

    public function testUpdateDataExists()
    {
        $id      = 1;
        $turmaId = 2;
        $ucId    = 1;
        $newDate = Carbon::createFromFormat('Y-m-d', '2014-08-12');

        try {
            $aula = $this->aulaRepository->updateData($ucId, $turmaId, $id, $newDate);
            $this->fail("Deveria receber falha, a data já existe para esta turma");
        } catch (\App\Exceptions\ValidationError $e) {
            $errors = $e->getErrors();
            $this->assertTrue(isset($errors['data']));
        }
    }

    public function testUpdateDataOutsidePeriod()
    {
        $id      = 1;
        $turmaId = 2;
        $ucId    = 1;
        $newDate = Carbon::createFromFormat('Y-m-d', '2015-08-12');

        try {
            $aula = $this->aulaRepository->updateData($ucId, $turmaId, $id, $newDate);
            $this->fail("Deveria receber erro, pois a data está fora do período da turma.");
        } catch (\App\Exceptions\ValidationError $e) {
            $errors = $e->getErrors();
            $this->assertTrue(isset($errors['data']));
        }
    }

    public function testDissociateAmbiente()
    {
        $aulas = \App\Models\Aula::where('ambiente_id', 1)->get();
        $this->assertEquals(0, sizeof($aulas));

        $ambiente = \App\Models\Ambiente::find(1);
        $this->aulaRepository->dissociateAmbiente($ambiente);

        $aulas = \App\Models\Aula::where('ambiente_id', 1)->get();
        $this->assertEquals(0, sizeof($aulas));
    }

    public function testFindAulaByAlunoDeviceAndAmbienteDeviceAndData()
    {
        $clientId = 'client3id';
        $cardCode = '111111';
        $date     = Carbon::createFromFormat('Y-m-d', '2014-08-05');

        $aulas = $this->aulaRepository->findAulaByAlunoDeviceAndAmbienteDeviceAndData($clientId, $cardCode, $date);

        $this->assertEquals(1, sizeof($aulas));
        $this->assertEquals($date->format('Y-m-d'), $aulas[0]->data->format('Y-m-d'));
    }

    public function testFindAllByProfessorAndMonth()
    {
        $aulas = $this->aulaRepository->findAllByProfessorAndMonth(49, 8, 2014);
        $this->assertEquals(9, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2014, $aula->data->year);
            $this->assertEquals(8, $aula->data->month);
        }

        $aulas = $this->aulaRepository->findAllByProfessorAndMonth(50, 4, 2015);
        $this->assertEquals(14, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2015, $aula->data->year);
            $this->assertEquals(4, $aula->data->month);
        }

        $aulas = $this->aulaRepository->findAllByProfessorAndMonth(null, 4, 2015);
        $this->assertEquals(19, sizeof($aulas));

        foreach ($aulas as $aula) {
            $this->assertEquals(2015, $aula->data->year);
            $this->assertEquals(4, $aula->data->month);
        }
    }
}
