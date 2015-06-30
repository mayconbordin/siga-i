<?php

include_once __DIR__.'/BaseResourceCest.php';

class AmbienteResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/ambientes';

    public function getAllAmbientes(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all ambientes");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two ambientes in the response');
        $I->seeResponseContainsJson([['id' => 1, 'tipo' => ['id' => 1]], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(16);
    }

    public function getAmbientesWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all ambientes with name starting with 'sala'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'sala']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two ambientes in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 1]]);
        $I->seeResponseJsonArrayHasAtLeast(10);
    }

    /*public function getAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $I->wantTo("Get a single ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the ambiente in the response');
        $I->seeResponseContainsJson(['id' => $id, 'sigla' => 'ADS']);
    }

    public function createAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'nome'                  => 'Engenharia de Software',
            'sigla'                 => 'ES',
            'coordenador_matricula' => '1234'
        ];

        $I->wantTo("Create a ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the ambiente in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome'], 'sigla' => $data['sigla']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new ambiente in the list of ambientes');
        $I->seeResponseContainsJson([['nome' => $data['nome']]]);
    }

    public function editAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $data = [
            'nome'                  => 'Análise de Sistemas e Desenvolvimento',
            'sigla'                 => 'ASD',
            'coordenador_matricula' => '1234'
        ];

        $I->wantTo("Update a ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the ambiente in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome'], 'sigla' => $data['sigla']]);
    }

    public function deleteAmbiente(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $I->wantTo("Delete a ambiente");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted ambiente in the list of ambientes');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }*/
}