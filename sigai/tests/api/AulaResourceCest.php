<?php

include_once __DIR__.'/BaseResourceCest.php';

class AulaResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/turmas/2/aulas';

    public function getAllAulas(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all aulas of an turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two aulas in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(20);
    }

    public function getAula(ApiTester $I)
    {
        $this->authenticate($I);

        $data = '2014-08-05';

        $I->wantTo("Get a single aula");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$data");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the aula information to be in the response');
        $I->seeResponseContainsJson(['data' => '05/08/2014']);
    }

    public function createAula(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'data'     => '06/08/2014',
            'conteudo' => 'Conteudo aqui ...'
        ];

        $I->wantTo("Create a new aula");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the aula information to be in the response');
        $I->seeResponseContainsJson(['data' => $data['data'], 'conteudo' => $data['conteudo']]);
    }

    public function editAula(ApiTester $I)
    {
        $this->authenticate($I);

        $date = '2014-08-05';

        $data = [
            'data'     => '06/08/2014',
            'conteudo' => 'Conteudo aqui ...'
        ];

        $I->wantTo("Edit an aula");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$date", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the aula information to be in the response');
        $I->seeResponseContainsJson(['data' => $data['data'], 'conteudo' => $data['conteudo']]);
    }

    public function deleteAula(ApiTester $I)
    {
        $this->authenticate($I);

        $data = '2014-08-05';

        $I->wantTo("Delete an aula");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$data");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);

        $I->expect('not to see the deleted aula in the list of aulas');
        $I->dontSeeResponseContainsJson([['data' => '05/08/2014']]);
    }

    public function editAulaData(ApiTester $I)
    {
        $this->authenticate($I);

        $data = ['data' => '05/08/2014'];
        $id = 1;

        $I->wantTo("Edit only the date of an aula");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id/data", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the aula information to be in the response');
        $I->seeResponseContainsJson(['data' => $data['data']]);
    }

    public function updateChamada(ApiTester $I)
    {
        $this->authenticate($I);

        $chamadas = [
            ["matricula" => 20569,"periods" => [true,false,false,true]],
            ["matricula" => 16049,"periods" => [true,true,true,true]]
        ];

        $data = '2014-08-05';

        $I->wantTo("Update the chamada");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$data/chamada", ['chamada' => $chamadas]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}