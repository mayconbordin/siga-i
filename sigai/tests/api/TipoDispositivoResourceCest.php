<?php

include_once __DIR__.'/BaseResourceCest.php';

class TipoDispositivoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/tipos_dispositivo';

    public function getAllTiposDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all tipos de dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two tipos de dispositivo in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(3);
    }

    public function getTiposDispositivoWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all tipos de dispositivo with name starting with 'a'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'a']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least one tipos de dispositivo in the response');
        $I->seeResponseContainsJson([['id' => 1]]);
        $I->seeResponseJsonArrayHasAtLeast(1);
    }

    public function getTipoDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Get a single tipo de dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => 'arduino']);
    }

    public function createTipoDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'nome' => 'Door Lock'
        ];

        $I->wantTo("Create a tipo de dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de dispositivo in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new tipo de dispositivo in the list of tipos de dispositivo');
        $I->seeResponseContainsJson([['nome' => $data['nome']]]);
    }

    public function editTipoDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $data = [
            'nome' => 'ARDUINO'
        ];

        $I->wantTo("Update a tipo de dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $id, 'nome' => $data['nome']]);
    }

    public function deleteTipoDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Delete a tipo de dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted tipo de dispositivo in the list of tipos de dispositivo');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}