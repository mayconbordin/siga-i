<?php

include_once __DIR__.'/BaseResourceCest.php';

use \DB;
use Carbon\Carbon;

class AuthResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/auth';

    public function registerUser(ApiTester $I)
    {
        $data = [
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345'
        ];

        $I->wantTo("Create a usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint.'/register', $data);

        dd($I->grabResponse());

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the usuario in the response');
        $I->seeResponseContainsJson(['nome' => $data['nome'], 'email' => $data['email']]);

        $result = json_decode($I->grabResponse(), true);
        dd($result);

    }
}