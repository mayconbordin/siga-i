<?php

include_once __DIR__.'/BaseResourceCest.php';

class TurmaAlunoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/turmas/2/alunos';

    public function getAllAlunos(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all alunos of an turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('these two alunos in the response');
        $I->seeResponseContainsJson([['id' => 1, 'matricula' => '15726'], ['id' => 2, 'matricula' => '15722']]);
        $I->expect('26 alunos in total');
        $I->seeResponseJsonArrayHasExactly(26);
    }

    public function attachAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '20562';

        $I->wantTo("Attach an aluno to the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula", ['status' => 'normal', 'curso_origem_id' => 1]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('aluno to be in the response with status');
        $I->seeResponseContainsJson(['aluno' => ['matricula' => $matricula, 'status' => 'normal']]);

        $I->sendGET($this->endpoint);
        $I->expect('to see the new aluno on the turma');
        $I->seeResponseContainsJson([['matricula' => $matricula]]);
    }

    public function attachAlunoWithInvalidData(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '20562';

        $I->wantTo("Attach an aluno with invalid data to the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula", ['status' => 'anormal', 'curso_origem_id' => 1]);

        $I->seeResponseCodeIs(422);
        $I->seeResponseIsJson();

        $I->expect('status to be in the response errors');
        $I->seeResponseJsonArrayHasKey('status');
    }

    public function attachAlunoAlreadyAttached(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $I->wantTo("Attach an aluno already attached to the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula", ['status' => 'normal', 'curso_origem_id' => 1]);

        $I->seeResponseCodeIs(409);
        $I->seeResponseIsJson();
    }

    public function updateAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $I->wantTo("Update an aluno of the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$matricula", ['status' => 'cancelado', 'curso_origem_id' => 1]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('aluno to be in the response with status');
        $I->seeResponseContainsJson(['matricula' => $matricula, 'status' => 'cancelado']);
    }

    public function deleteAluno(ApiTester $I)
    {
        $this->authenticate($I);

        $matricula = '15726';

        $I->wantTo("Delete an aluno of the turma");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$matricula");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->expect('not to see the deleted aluno on the turma');
        $I->dontSeeResponseContainsJson([['matricula' => $matricula]]);
    }
}