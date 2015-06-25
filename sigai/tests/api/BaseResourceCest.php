<?php

abstract class BaseResourceCest {
    protected function authenticate(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('auth/login', ['email' => '1234', 'password' => '12345']);
    }
}