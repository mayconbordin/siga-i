<?php

include_once __DIR__.'/BaseResourceCest.php';

class OAuthCest extends BaseResourceCest
{

    public function getAccessToken(ApiTester $I)
    {
        $I->wantTo("Get an OAuth access token");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
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
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => 'client1id',
            'client_secret' => 'client1secret',
            'grant_type'    => 'client_credentials',
            'scope'         => 'write-chamada'
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
        $I->sendGET('/api/oauth/test');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function testAccessTokenWrongGrantType(ApiTester $I)
    {
        $I->wantTo("Get an OAuth access token");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => 'client2id',
            'client_secret' => 'client2secret',
            'grant_type'    => 'client_credentials',
            'scope'         => 'read-usuarios'
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
        $I->sendGET('/api/usuario');

        $I->seeResponseCodeIs(401);
        $I->seeResponseIsJson();
    }

    public function testAccessTokenWithPasswordGrant(ApiTester $I)
    {
        $I->wantTo("Get an OAuth access token with a password grant");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => 'client2id',
            'client_secret' => 'client2secret',
            'grant_type'    => 'password',
            'scope'         => 'read-usuarios',
            'username'      => '1234',
            'password'      => '12345'
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
        $I->sendGET('/api/usuario');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['matricula' => "1234", "roles" => [['name' => 'professor'], ['name' => 'coordenador']]]);
    }

    public function testAccessTokenWithPasswordGrantWrongUserPassword(ApiTester $I)
    {
        $I->wantTo("Try to get an OAuth access token with a password grant with a wrong password");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => 'client2id',
            'client_secret' => 'client2secret',
            'grant_type'    => 'password',
            'scope'         => 'read-usuarios',
            'username'      => '1234',
            'password'      => '1234588888'
        ]);

        $I->seeResponseCodeIs(401);
        $I->seeResponseIsJson();
    }
}