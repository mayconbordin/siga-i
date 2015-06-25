<?php

include_once __DIR__.'/BaseResourceCest.php';

class TurmaResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/turmas';

    public function getAllTurmas(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two turmas in the response');
        $I->seeResponseContainsJson(['rows' => [['id' => '1'], ['id' => '2']]]);

        $I->expect('these parameters in the response');
        $I->seeResponseContainsJson(['total' => 6, 'per_page' => 10, 'current_page' => 1]);

        $json = json_decode($I->grabResponse(), true);

        // get list of IDs of turmas
        $idOfTurmas = array_map(function($turma) {
            return (int) $turma['id'];
        }, $json['rows']);

        $I->expect('turmas to be sorted by their IDs');
        $I->assertArrayIsSorted($idOfTurmas);
        //$I->assertEquals(range(1, 6), $idOfTurmas);
    }

    public function getAllTurmasWithLimit(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas with two per page");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['limit' => 2]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('exactly these two turmas in the response');
        $I->seeResponseContainsJson(['rows' => [['id' => '1'], ['id' => '2']]]);

        $I->expect('these parameters in the response');
        $I->seeResponseContainsJson(['total' => 6, 'per_page' => 2, 'current_page' => 1, 'last_page' => 3]);
    }

    public function getAllTurmasSortingByName(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas sorted by name");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['sort' => 'nome']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse(), true);

        $names = array_map(function($turma) {
            return $turma['nome'];
        }, $json['rows']);

        $I->expect('turmas to be sorted by their names');
        $I->assertArrayIsSorted($names);
    }

    public function getAllTurmasSortingByNameDescending(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas sorted by name descending");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['sort' => 'nome', 'order' => 'desc']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse(), true);

        $names = array_map(function($turma) {
            return $turma['nome'];
        }, $json['rows']);

        $I->expect('turmas to be sorted by their names');
        $I->assertArrayIsSorted($names, 'desc');
    }

    public function getAllTurmasSearchByName(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas that match the searched name");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['field' => 'nome', 'search' => 's049']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('exactly these two turmas in the response');
        $I->seeResponseContainsJson(['rows' => [['id' => '2'], ['id' => '3']]]);
    }

    public function getAllTurmasSearchByProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all turmas that match the searched professor");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['field' => 'professores', 'search' => 'valderi']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('exactly these three turmas in the response');
        $I->seeResponseContainsJson(['rows' => [['id' => '2'], ['id' => '4'], ['id' => '5']]]);
    }

}