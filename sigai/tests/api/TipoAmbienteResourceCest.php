<?php

include_once __DIR__.'/BaseResourceCest.php';

class TipoAmbienteResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/tipos_ambiente';

    public function getAllTiposAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all tipos de ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two tipos de ambiente in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(2);
    }

    public function getTiposAmbienteWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all tipos de ambiente with name starting with 'sala'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'sala']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least one tipos de ambiente in the response');
        $I->seeResponseContainsJson([['id' => 1]]);
        $I->seeResponseJsonArrayHasAtLeast(1);
    }

    public function getTipoAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Get a single tipo de ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de ambiente in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => 'sala de aula']);
    }

    public function createTipoAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'nome' => 'Escritório'
        ];

        $I->wantTo("Create a tipo de ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de ambiente in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new tipo de ambiente in the list of tipos de ambiente');
        $I->seeResponseContainsJson([['nome' => $data['nome']]]);
    }

    public function editTipoAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $data = [
            'nome' => 'SALA DE AULA'
        ];

        $I->wantTo("Update a tipo de ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de ambiente in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => $data['nome']]);
    }

    public function deleteTipoAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Delete a tipo de ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted tipo de ambiente in the list of tipos de ambiente');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}