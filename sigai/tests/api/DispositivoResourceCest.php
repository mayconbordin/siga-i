<?php

include_once __DIR__.'/BaseResourceCest.php';

class DispositivoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/dispositivos';

    public function getAllDispositivos(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all dispositivos");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two dispositivos in the response');
        $I->seeResponseContainsJson([['id' => 'client1id', 'tipo' => ['nome' => 'arduino']], ['id' => 'client3id']]);
        $I->seeResponseJsonArrayHasAtLeast(4);
    }

    public function getDispositivosWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all dispositivos with name starting with 'client'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'client']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two dispositivos in the response');
        $I->seeResponseContainsJson([['id' => 'client1id'], ['id' => 'client3id']]);
        $I->seeResponseJsonArrayHasAtLeast(4);
    }

    public function getDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 'client1id';

        $I->wantTo("Get a single dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $id, 'name' => 'client1']);
    }

    public function getHeartbeatsDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 'client1id';

        $I->wantTo("Get a single dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id/heartbeats");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->seeResponseJsonArrayHasAtLeast(5);
    }

    public function createDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'id'                  => 'AF-CE-09-DD-0C-F5',
            'name'                => 'Arduino-123',
            'secret'              => 'ed85fccdba9b34951107b175d74443b6b4789765',
            'tipo_dispositivo_id' => 1,
            'ambiente_id'         => 4
        ];

        $I->wantTo("Create a dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $data['id'], 'name' => $data['name'], 'tipo' => ['id' => $data['tipo_dispositivo_id']]]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new dispositivo in the list of dispositivos');
        $I->seeResponseContainsJson([['id' => $data['id']]]);
    }

    public function createDispositivoWithoutAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'id'                  => 'UbiPri-v3.0',
            'name'                => 'UbiPri',
            'secret'              => 'ed85fccdba9b34951107b175d74443b6b4789765',
            'tipo_dispositivo_id' => 2
        ];

        $I->wantTo("Create a dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $data['id'], 'name' => $data['name'], 'tipo' => ['id' => $data['tipo_dispositivo_id']]]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new dispositivo in the list of dispositivos');
        $I->seeResponseContainsJson([['id' => $data['id']]]);
    }

    public function editDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 'client1id';

        $data = [
            'id'                  => $id,
            'name'                => 'Client One',
            'secret'              => 'db9654e23201855c7f376b395abac30f45f980b4',
            'tipo_dispositivo_id' => 1
        ];

        $I->wantTo("Update a dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $id, 'name' => $data['name'], 'secret' => $data['secret'], 'tipo' => ['id' => $data['tipo_dispositivo_id']]]);
    }

    public function editDispositivoChangeAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 'client1id';

        $data = [
            'ambiente_id' => 1
        ];

        $I->wantTo("Update a dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id/ambiente", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the dispositivo in the response');
        $I->seeResponseContainsJson(['id' => $id]);


        $I->sendGET($this->endpoint."/$id");
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the ambiente where the dispositivo is in the response');
        $I->seeResponseContainsJson(['id' => $id, 'ambientes' => [['id' => $data['ambiente_id']]]]);
    }

    public function deleteDispositivo(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 'client1id';

        $I->wantTo("Delete a dispositivo");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted dispositivo in the list of dispositivos');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}