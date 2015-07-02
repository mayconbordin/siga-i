<?php

abstract class BaseResourceCest {
    protected function authenticate(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('auth/login', ['email' => '1234', 'password' => '12345']);
    }

    protected function authenticateOAuth(ApiTester $I, $scope)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => 'client1id',
            'client_secret' => 'client1secret',
            'grant_type'    => 'client_credentials',
            'scope'         => $scope
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
    }
}