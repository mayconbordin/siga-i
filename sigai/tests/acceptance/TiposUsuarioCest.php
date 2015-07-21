<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class TiposUsuarioCest extends BaseAcceptanceCest {
    public function listAllTiposUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of tipos of usuario');
        $I->amOnPage('/tipos_usuario');

        $I->seeCurrentUrlEquals('/tipos_usuario');

        $I->see('aluno');
        $I->see('professor');
    }

    public function editTipoUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an tipo of usuario');
        $I->amOnPage('/tipos_usuario');

        $I->seeCurrentUrlEquals('/tipos_usuario');

        $I->click('[data-id="1"] .edit');

        $newNome = 'Student';
        $newDesc = 'Tipo de usuário estudante';

        $I->waitForElementVisible('#formTipoUsuario', 30);
        $I->wait(1);

        $I->fillField('#formTipoUsuarioName', $newNome);
        $I->fillField('#formTipoUsuarioDescription', $newDesc);

        $I->selectOption("#formTipoUsuarioPermissao", "38|list-own-aulas");
        $I->click("#addPermissaoTipoUsuario");
        $I->waitForElementVisible('li[data-id="38"]');

        $I->wait(2);
        $I->click('#formTipoUsuario .save');

        $I->waitForElementNotVisible('#formTipoUsuario', 30);

        $I->see($newNome);
        $I->see($newDesc);
    }

    public function deleteTipoUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/tipos_usuario');

        $I->seeCurrentUrlEquals('/tipos_usuario');

        $I->click('[data-id="1"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('aluno');
    }

    public function createTipoUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an tipo usuario');
        $I->amOnPage('/tipos_usuario');

        $I->seeCurrentUrlEquals('/tipos_usuario');

        $newNome = 'Master';
        $newDesc = 'Tipo de usuário master';

        $I->click('#openNewTipoUsuario');

        $I->waitForElementVisible('#formTipoUsuario', 30);
        $I->wait(1);

        $I->fillField('#formTipoUsuarioName', $newNome);
        $I->fillField('#formTipoUsuarioDescription', $newDesc);

        $I->selectOption("#formTipoUsuarioPermissao", "26|create-aula");
        $I->click("#addPermissaoTipoUsuario");
        $I->waitForElementVisible('li[data-id="26"]');

        $I->wait(2);
        $I->click('#formTipoUsuario .save');

        $I->waitForElementNotVisible('#formTipoUsuario', 30);

        $I->see($newNome);
        $I->see($newDesc);
    }
}