<?php

include_once __DIR__.'/BaseResourceCest.php';

class AlunoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/alunos';

    public function getAllAlunos(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all alunos");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two alunos in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(48);
    }

    public function getAlunosWithQuery(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all alunos with name starting with the letter 'A'");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['query' => 'a']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two alunos in the response');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2]]);
        $I->seeResponseJsonArrayHasAtLeast(9);
    }

    public function getAlunosExcludingTurma(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all alunos except those from turma with ID 2");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['turmaId' => 2]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two alunos in the response');
        $I->seeResponseContainsJson([['id' => 27], ['id' => 28]]);
        $I->seeResponseJsonArrayHasAtLeast(22);
    }

    public function getAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $I->wantTo("Get a single aluno");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the aluno in the response');
        $I->seeResponseContainsJson(['id' => 1, 'matricula' => $matricula]);
    }

    public function createAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'matricula'       => '48999998744',
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345'
        ];

        $I->wantTo("Create a aluno");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint,$data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the aluno in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new aluno in the list of alunos');
        $I->seeResponseContainsJson([['matricula' => $data['matricula']]]);
    }

    public function editAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $data = [
            'matricula'       => $matricula,
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345'
        ];

        $I->wantTo("Update a aluno");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$matricula", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the aluno in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);
    }

    public function deleteAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $I->wantTo("Delete a aluno");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted aluno in the list of alunos');
        $I->dontSeeResponseContainsJson([['matricula' => $matricula]]);
    }
}