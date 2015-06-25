<?php

include_once __DIR__.'/BaseResourceCest.php';

class UCCursoResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/cursos';

    public function getAllCursos(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all cursos of an unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('three cursos in the response');
        $I->seeResponseContainsJson([['id' => 2], ['id' => 3], ['id' => 5]]);
    }

    public function attachCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Attach an curso to the unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('curso to be in the response ');
        $I->seeResponseContainsJson(['id' => $id]);

        $I->sendGET($this->endpoint);
        $I->expect('to see the new curso on the unidade curricular');
        $I->seeResponseContainsJson([['id' => $id]]);
    }

    public function attachCursoAlreadyAttached(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 2;

        $I->wantTo("Attach an curso already attached to the unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id");

        $I->seeResponseCodeIs(409);
        $I->seeResponseIsJson();
    }

    public function detachCurso(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 3;

        $I->wantTo("Detach the curso");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->expect('not to see the curso on the unidade curricular');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}