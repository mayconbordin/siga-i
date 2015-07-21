<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class DispositivosCest extends BaseAcceptanceCest {
    public function listAllDispositivos(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of dispositivos');
        $I->amOnPage('/dispositivos');

        $I->seeCurrentUrlEquals('/dispositivos');

        $I->see('client1id');
        $I->see('client2id');
    }

    public function editDispositivo(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an dispositivo');
        $I->amOnPage('/dispositivos');

        $I->seeCurrentUrlEquals('/dispositivos');

        $I->click('[data-id="client1id"] .edit');

        $newId = 'client1id-NEW';
        $newNome = 'Cliente-1 New';

        $I->waitForElementVisible('#formDispositivo', 30);
        $I->wait(1);

        $I->fillField('#formDispositivoName', $newNome);
        $I->fillField('#formDispositivoId', $newId);
        $I->click("#generateDispositivoSecret");

        $I->wait(2);
        $I->click('#formDispositivo .save');

        $I->waitForElementNotVisible('#formDispositivo', 30);

        $I->see($newNome);
    }

    public function editDispositivoComplete(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an dispositivo');
        $I->amOnPage('/dispositivos');

        $I->seeCurrentUrlEquals('/dispositivos');

        $I->click('[data-id="client1id"] .edit');

        $newId = 'client1id-NEW';
        $newNome = 'Cliente-1 New';

        $I->waitForElementVisible('#formDispositivo', 30);
        $I->wait(1);

        $I->fillField('#formDispositivoName', $newNome);
        $I->fillField('#formDispositivoId', $newId);
        $I->click("#generateDispositivoSecret");
        $I->selectOption("#formDispositivoTipo", "2");

        $I->fillField("#formDispositivoAmbiente", "sala 102");
        $I->waitForElementVisible('#formDispositivo ul.typeahead');
        $I->click('#formDispositivo ul.typeahead li[data-value="2"]');
        $I->wait(2);

        $I->selectOption("#formDispositivoPermissao", "read-agenda");
        $I->click("#addPermissaoDispositivo");

        $I->seeElement('li[data-id="read-agenda"]');

        $I->wait(2);
        $I->click('#formDispositivo .save');

        $I->waitForElementNotVisible('#formDispositivo', 30);

        $I->see($newNome);
    }

    public function deleteDispositivo(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/dispositivos');

        $I->seeCurrentUrlEquals('/dispositivos');

        $I->click('[data-id="client1id"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('client1id');
    }

    public function createDispositivo(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->resizeWindow(1535, 789);

        $I->wantTo('create an dispositivo');
        $I->amOnPage('/dispositivos');

        $I->seeCurrentUrlEquals('/dispositivos');

        $id = 'arduino-01';
        $nome = 'Arduino 01';

        $I->click('#openNewDispositivo');

        $I->waitForElementVisible('#formDispositivo', 30);
        $I->wait(1);

        $I->fillField('#formDispositivoName', $nome);
        $I->fillField('#formDispositivoId', $id);
        $I->click("#generateDispositivoSecret");

        $I->click("#openNewTipoDispositivo");
        $I->waitForElementVisible("#formTipoDispositivo", 30);
        $I->wait(1);

        $I->fillField("#formTipoDispositivoNome", "Leitor RFID");
        $I->wait(2);
        $I->click('#formTipoDispositivo .save');

        $I->waitForElementNotVisible('#formTipoDispositivo', 30);

        $I->fillField("#formDispositivoAmbiente", "sala 102");
        $I->waitForElementVisible('#formDispositivo ul.typeahead');
        $I->click('#formDispositivo ul.typeahead li[data-value="2"]');
        $I->wait(2);

        $I->selectOption("#formDispositivoPermissao", "read-agenda");
        $I->click("#addPermissaoDispositivo");

        $I->seeElement('li[data-id="read-agenda"]');

        $I->wait(2);
        $I->click('#formDispositivo .save');

        $I->waitForElementNotVisible('#formDispositivo', 30);

        $I->see($nome);
    }
}