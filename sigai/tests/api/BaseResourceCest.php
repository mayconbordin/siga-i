<?php

abstract class BaseResourceCest {
    protected function authenticate(ApiTester $I, $email = '0000', $password = '12345')
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('auth/login', ['email' => $email, 'password' => $password]);
    }

    protected function authenticateOAuth(ApiTester $I, $scope, $client = 'client1id', $secret = 'client1secret')
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/api/oauth/access_token', [
            'client_id'     => $client,
            'client_secret' => $secret,
            'grant_type'    => 'client_credentials',
            'scope'         => $scope
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $json = json_decode($I->grabResponse());

        $I->haveHttpHeader('Authorization', 'Bearer '.$json->access_token);
    }
}