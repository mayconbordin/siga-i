<?php

include_once __DIR__.'/BaseResourceCest.php';

class TipoUsuarioResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/tipos_usuario';

    public function getAllTiposUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $I->wantTo("Get a list of all tipos de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('at least these two tipos de usuario in the response');
        $I->seeResponseContainsJson([['name' => 'admin'], ['name' => 'aluno']]);
        $I->seeResponseJsonArrayHasAtLeast(4);
    }

    public function getTipoUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Get a single tipo de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de usuario in the response');
        $I->seeResponseContainsJson(['id' => $id, 'name' => 'aluno']);
    }

    public function createTipoUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'name' => 'Superuser'
        ];

        $I->wantTo("Create a tipo de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de usuario in the response');
        $I->seeResponseContainsJson(['name' => $data['name']]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new tipo de usuario in the list of tipos de usuario');
        $I->seeResponseContainsJson([['name' => $data['name']]]);
    }

    public function createTipoUsuarioWithPermissions(ApiTester $I)
    {
        $this->authenticate($I);

        $data = [
            'name' => 'Superuser',
            'permissions' => [1,2,3]
        ];

        $I->wantTo("Create a tipo de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de usuario in the response');
        $I->seeResponseContainsJson(['name' => $data['name']]);
        $I->seeResponseContainsJson(['permissions' => [['id' => 1], ['id' => 2], ['id' => 3]]]);

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the new tipo de usuario in the list of tipos de usuario');
        $I->seeResponseContainsJson([['name' => $data['name']]]);
    }

    public function editTipoUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $data = [
            'name' => 'Student'
        ];

        $I->wantTo("Update a tipo de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPUT($this->endpoint."/$id", $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('to see the information about the tipo de usuario in the response');
        $I->seeResponseContainsJson(['id' => $id, 'name' => $data['name']]);
    }

    public function deleteTipoUsuario(ApiTester $I)
    {
        $this->authenticate($I);

        $id = 1;

        $I->wantTo("Delete a tipo de usuario");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendDELETE($this->endpoint."/$id");

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->expect('NOT to see the deleted tipo de usuario in the list of tipos de usuario');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }
}