<?php

include_once __DIR__.'/BaseResourceCest.php';

class ProfessorResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/professores';

    public function getAllProfessores(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all professores");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two professores in the response');
        $I->seeResponseContainsJson([['id' => 49], ['id' => 50]]);
        $I->seeResponseJsonArrayHasAtLeast(7);
    }

    public function getProfessoresWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all professores with name starting with the letter 'G'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'g']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two professores in the response');
        $I->seeResponseContainsJson([['id' => 50], ['id' => 53]]);
        $I->seeResponseJsonArrayHasAtLeast(2);
    }

    public function getProfessoresExcludingTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all professores except those from turma with ID 1");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['turmaId' => 1]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two professores in the response');
        $I->dontSeeResponseContainsJson([['id' => 50], ['id' => 51]]);
        $I->seeResponseJsonArrayHasAtLeast(5);
    }

    public function getProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '1234';

        $I->wantTo("Get a single professor");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the professor in the response');
        $I->seeResponseContainsJson(['id' => 49, 'matricula' => $matricula]);
    }

    public function createProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'matricula'       => '48999998744',
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345',
            'curso_origem_id' => 1
        ];

        $I->wantTo("Create a professor");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint,$data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the professor in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new professor in the list of professors');
        $I->seeResponseContainsJson([['matricula' => $data['matricula']]]);
    }

    public function editProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '1234';

        $data = [
            'matricula'       => $matricula,
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345',
            'curso_origem_id' => 1
        ];

        $I->wantTo("Update a professor");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$matricula", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the professor in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);
    }

    public function deleteProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '1234';

        $I->wantTo("Delete a professor");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted professor in the list of professors');
        $I->dontSeeResponseContainsJson([['matricula' => $matricula]]);
    }
}