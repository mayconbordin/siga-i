<?php

include_once __DIR__.'/BaseResourceCest.php';

class OAuthCest extends BaseResourceCest
{

    public function getAccessToken(ApiTester $I)
    {
        $I->wantTo("Get an OAuth access token");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/oauth/access_token', [
            'client_id'     => 'client1id',
            'client_secret' => 'client1secret',
            'grant_type'    => 'client_credentials'
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two alunos in the response');
        $I->seeResponseJsonArrayHasKey('access_token');
        $I->seeResponseJsonArrayHasKey('token_type');
        $I->seeResponseJsonArrayHasKey('expires_in');
    }

    public function testAccessToken(ApiTester $I)
    {
        $I->wantTo("Get an OAuth access token");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/oauth/access_token', [
            'client_id'     => 'client1id',
            'client_secret' => 'client1secret',
            'grant_type'    => 'client_credentials'
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
        $I->sendGET('/oauth/test');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}