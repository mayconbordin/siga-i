<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class UsuariosCest extends BaseAcceptanceCest {
    public function listAllUsuarios(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of usuarios');
        $I->amOnPage('/usuarios');

        $I->seeCurrentUrlEquals('/usuarios');

        $I->see('ABNER BORDA FONSECA');
        $I->see('Administrador');
    }

    public function editUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an usuarios');
        $I->amOnPage('/usuarios');

        $I->seeCurrentUrlEquals('/usuarios');

        $I->click('[data-matricula="15726"] .edit');

        $newNome = 'Abner Borda Fonseca';

        $I->waitForElementVisible('#newUsuario', 30);
        $I->wait(1);

        $I->fillField('#newUsuarioNome', $newNome);
        $I->selectOption("#newUsuarioTipo", "2|professor");
        $I->click("#addTipoUsuario");

        $I->waitForElementVisible('li[data-id="2"]');

        $I->wait(2);
        $I->click('#newUsuario .save');

        $I->waitForElementNotVisible('#newUsuario', 30);

        $I->see($newNome);
    }

    public function deleteUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/usuarios');

        $I->seeCurrentUrlEquals('/usuarios');

        $I->click('[data-matricula="15726"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('ABNER BORDA FONSECA');
    }

    public function createUsuario(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an usuario');
        $I->amOnPage('/usuarios');

        $I->seeCurrentUrlEquals('/usuarios');

        $matricula = '10108888';
        $nome = 'Walter White';
        $email = 'walter.white@heisenberg.org';
        $senha = '12345abcde#$';

        $I->click('#openNewUsuario');

        $I->waitForElementVisible('#newUsuario', 30);
        $I->wait(1);

        $I->fillField('#newUsuarioMatricula', $matricula);
        $I->fillField('#newUsuarioNome', $nome);
        $I->fillField('#newUsuarioEmail', $email);
        $I->fillField('#newUsuarioPassword', $senha);
        $I->selectOption("#newUsuarioTipo", "2|professor");
        $I->click("#addTipoUsuario");

        $I->waitForElementVisible('li[data-id="2"]');

        $I->wait(2);
        $I->click('#newUsuario .save');

        $I->waitForElementNotVisible('#newUsuario', 30);

        $I->see($nome);
    }
}