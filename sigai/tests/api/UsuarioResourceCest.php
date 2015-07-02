<?php

include_once __DIR__.'/BaseResourceCest.php';

use \DB;
use Carbon\Carbon;

class UsuarioResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/usuarios';

    public function authUser(ApiTester $I)
    {
        //$this->authenticateOAuth($I, 'write-chamada');

        $matricula = '1234';

        $I->wantTo("Authenticate the user and get his information");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula/auth", ['password' => '12345']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->seeResponseContainsJson(['id' => 49, 'roles' => [['name' => 'professor'], ['name' => 'coordenador']]]);
    }

    public function authUserWrongPassword(ApiTester $I)
    {
        //$this->authenticateOAuth($I, 'write-chamada');

        $matricula = '1234';

        $I->wantTo("Authenticate the user with wrong password");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula/auth", ['password' => '123458888']);

        $I->seeResponseCodeIs(401);
        $I->seeResponseIsJson();
    }

    public function authUserDontExist(ApiTester $I)
    {
        //$this->authenticateOAuth($I, 'write-chamada');

        $matricula = '123488888';

        $I->wantTo("Authenticate a user that do not exist");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint."/$matricula/auth", ['password' => '123458888']);

        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
    }
}