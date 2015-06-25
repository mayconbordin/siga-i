<?php

include_once __DIR__.'/BaseResourceCest.php';

class UnidadeCurricularResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares';

    public function getAllUnidadesCurriculares(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all unidades curriculares");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["id" => 1, "nome" => "S049 - Modelagem de Banco de Dados", "carga_horaria" => 70, "sigla" => "S049"]);

        $I->expect('at least five items in root array');
        $I->seeResponseContainsJson([['id' => 1], ['id' => 2], ['id' => 3], ['id' => 4], ['id' => 5]]);
    }

    public function getSingleUnidadeCurricular(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a single unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/1");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["id" => 1, "nome" => "S049 - Modelagem de Banco de Dados", "carga_horaria" => 70, "sigla" => "S049"]);
    }

    public function deleteSingleUnidadeCurricular(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Delete a single unidade curricular");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/1");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint."/1");

        $I->expect("to see that the unidade curricular was deleted");
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
    }
}