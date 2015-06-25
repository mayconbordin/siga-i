<?php

include_once __DIR__.'/BaseResourceCest.php';

class CursoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/cursos';

    public function getAllCursos(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all cursos");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two cursos in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(5);
    }

    public function getCursosWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all cursos with name starting with the letter 'S'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'S']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two cursos in the response');
        $I->seeResponseContainsJson([['id' => 4], ['id' => 5]]);
        $I->seeResponseJsonArrayHasAtLeast(2);
    }

    public function getCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $I->wantTo("Get a single curso");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the curso in the response');
        $I->seeResponseContainsJson(['id' => $id, 'sigla' => 'ADS']);
    }

    public function createCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'nome'                  => 'Engenharia de Software',
            'sigla'                 => 'ES',
            'coordenador_matricula' => '1234'
        ];

        $I->wantTo("Create a curso");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the curso in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome'], 'sigla' => $data['sigla']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new curso in the list of cursos');
        $I->seeResponseContainsJson([['nome' => $data['nome']]]);
    }

    public function editCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $data = [
            'nome'                  => 'Análise de Sistemas e Desenvolvimento',
            'sigla'                 => 'ASD',
            'coordenador_matricula' => '1234'
        ];

        $I->wantTo("Update a curso");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the curso in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome'], 'sigla' => $data['sigla']]);
    }

    public function deleteCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $I->wantTo("Delete a curso");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted curso in the list of cursos');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}