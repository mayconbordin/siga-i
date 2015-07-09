<?php

include_once __DIR__.'/BaseResourceCest.php';

class ArduinoCest extends BaseResourceCest
{

    public function getConfiguration(ApiTester $I)
    {
        $I->wantTo("Get the configuration");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/arduino/config');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        dd($I->grabResponse());

        /*$I->expect('at least these two alunos in the response');
        $I->seeResponseJsonArrayHasKey('access_token');
        $I->seeResponseJsonArrayHasKey('token_type');
        $I->seeResponseJsonArrayHasKey('expires_in');*/
    }
}