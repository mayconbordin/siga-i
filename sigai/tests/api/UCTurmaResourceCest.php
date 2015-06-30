<?php

include_once __DIR__.'/BaseResourceCest.php';

class UCTurmaResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/turmas';

    public function getAllTurmas(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas of an unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('two turmas in the response');
        $I->seeResponseContainsJson([['id' => 2], ['id' => 3]]);
    }

    public function getTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 3;

        $I->wantTo("Get a turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the turma information in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => 'S049N']);
    }

    public function createTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'nome'           => 'S049-N2',
            'data_inicio'    => '01/02/2015',
            'data_fim'       => '20/07/2015',
            'horario_inicio' => '18:30:00',
            'horario_fim'    => '22:30:00',
            'ambiente_id'    => 1
        ];

        $I->wantTo("Create a new turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('two turmas in the response');
        $I->seeResponseContainsJson(['nome' => 'S049-N2']);
    }

    public function editTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 3;
        $data = [
            'nome'           => 'S049-N2',
            'data_inicio'    => '01/02/2015',
            'data_fim'       => '20/07/2015',
            'horario_inicio' => '18:30:00',
            'horario_fim'    => '22:30:00',
            'ambiente_id'    => 1
        ];

        $I->wantTo("Edit a turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('two turmas in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => 'S049-N2']);
    }

    public function deleteTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 3;

        $I->wantTo("Delete a turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint."/$id");

        $I->expect('that the turma has been deleted');
        $I->seeResponseCodeIs(404);
    }
}