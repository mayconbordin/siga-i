<?php

include_once __DIR__.'/BaseResourceCest.php';

class TurmaProfessorResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/turmas/2/professores';

    public function getAllProfessores(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all professores of an turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('one professor in the response');
        $I->seeResponseContainsJson([['id' => 49, 'matricula' => '1234']]);
        $I->seeResponseJsonArrayHasExactly(1);
    }

    public function attachProfessor(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '31019';

        $I->wantTo("Attach an professor to the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('professor to be in the response ');
        $I->seeResponseContainsJson(['matricula' => $matricula, 'nome' => 'Gustavo B. Brand']);

        $I->sendGET($this->endpoint);
        $I->expect('to see the new professor on the turma');
        $I->seeResponseContainsJson([['matricula' => $matricula]]);
    }

    public function attachProfessorAlreadyAttached(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '1234';

        $I->wantTo("Attach an professor already attached to the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(409);
        $I->seeResponseIsJson();
    }

    public function deleteAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '1234';

        $I->wantTo("Delete an professor of the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->expect('not to see the professor aluno on the turma');
        $I->dontSeeResponseContainsJson([['matricula' => $matricula]]);
    }
}