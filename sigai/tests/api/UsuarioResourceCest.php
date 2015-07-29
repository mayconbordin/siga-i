<?php

include_once __DIR__.'/BaseResourceCest.php';

use \DB;
use Carbon\Carbon;

class UsuarioResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/usuarios';

    /*public function authUser(ApiTester $I)
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
    }*/

    public function getAllUsuarios(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all usuarios");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two usuarios in the response');
        $I->seeResponseContainsJson(['total' => 56, 'per_page' => 15, 'current_page' => 1, 'data' => [['id' => '1'], ['id' => '2']]]);
        $I->seeResponseJsonArrayHasAtLeast(7);
    }

    public function getUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 49;

        $I->wantTo("Get a single usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the usuario in the response');
        $I->seeResponseContainsJson(['id' => $id, 'matricula' => "1234", "roles" => [['id' => 2], ['id' => 3]]]);
    }

    public function createUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'matricula'       => '48999998744',
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345',
            'roles'           => [1]
        ];

        $I->wantTo("Create a usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the usuario in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);
        $I->seeResponseContainsJson(['roles' => [['id' => 1]]]);

        $result = json_decode($I->grabResponse(), true);

        $I->sendGET($this->endpoint."/".$result['usuario']['id']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new usuario in the list of usuarios');
        $I->seeResponseContainsJson(['matricula' => $data['matricula']]);
    }

    public function editUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 49;

        $data = [
            'matricula'       => "1234",
            'nome'            => 'José da Silva',
            'email'           => 'jose.silva.2015@gmail.com',
            'password'        => '12345'
        ];

        $I->wantTo("Update a usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the usuario in the response');
        $I->seeResponseContainsJson(['matricula' => $data['matricula'], 'nome' => $data['nome'], 'email' => $data['email']]);
    }

    public function deleteUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 49;

        $I->wantTo("Delete a usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint."/$id");
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
    }
}