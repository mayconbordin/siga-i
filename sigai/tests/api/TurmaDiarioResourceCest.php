<?php

include_once __DIR__.'/BaseResourceCest.php';

class TurmaDiarioResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/unidades_curriculares/1/turmas/2/diarios';

    public function closeDiario(ApiTester $I)
    {
        $this->authenticate($I, '1234');

        $month = 8;

        $I->wantTo("Close a diário for month $month");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$month");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the information about the new diário in the response');
        $I->seeResponseContainsJson(['diario' => ['mes' => "$month", 'turma' => ['nome' => 'S049'], 'professor' => ['id' => 49]]]);
    }

    public function sendDiario(ApiTester $I)
    {
        $this->authenticate($I, '1234');

        $month = 8;

        $I->wantTo("Close a diário for month $month and send it again");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$month");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse(), true);
        $id   = $json['diario']['id'];

        $I->sendPOST($this->endpoint."/$month/enviar");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('the information about the new diário in the response');
        $I->seeResponseJsonArrayHasKey('envio');
    }
}