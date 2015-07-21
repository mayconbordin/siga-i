<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class AmbientesCest extends BaseAcceptanceCest {
    public function listAllAmbientes(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of ambientes');
        $I->amOnPage('/ambientes');

        $I->seeCurrentUrlEquals('/ambientes');

        $I->see('sala 101');
        $I->see('sala 102');
    }

    public function editAmbiente(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an ambientes');
        $I->amOnPage('/ambientes');

        $I->seeCurrentUrlEquals('/ambientes');

        $I->click('[data-id="1"] .edit');

        $newNome = 'SALA101';

        $I->waitForElementVisible('#formAmbiente', 30);
        $I->wait(1);

        $I->fillField('#formAmbienteNome', $newNome);
        $I->selectOption("#formAmbienteTipo", "1");

        $I->wait(2);
        $I->click('#formAmbiente .save');

        $I->waitForElementNotVisible('#formAmbiente', 30);

        $I->see($newNome);
    }

    public function editAmbienteNewTipo(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an ambientes');
        $I->amOnPage('/ambientes');

        $I->seeCurrentUrlEquals('/ambientes');

        $I->click('[data-id="1"] .edit');

        $newNome = 'SALA101';

        $I->waitForElementVisible('#formAmbiente', 30);
        $I->wait(1);

        $I->fillField('#formAmbienteNome', $newNome);

        $I->click("#openNewTipoAmbiente");
        $I->waitForElementVisible('#formTipoAmbiente', 30);
        $I->wait(1);

        $I->fillField("#formTipoAmbienteNome", "Nova Sala de Aula");
        $I->wait(2);
        $I->click('#formTipoAmbiente .save');

        $I->waitForElementNotVisible('#formTipoAmbiente', 30);

        $I->wait(2);
        $I->click('#formAmbiente .save');

        $I->waitForElementNotVisible('#formAmbiente', 30);

        $I->see($newNome);
        $I->see("Nova Sala de Aula");
    }

    public function deleteAmbiente(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/ambientes');

        $I->seeCurrentUrlEquals('/ambientes');

        $I->click('[data-id="1"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('sala 101');
    }

    public function createAmbiente(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an ambiente');
        $I->amOnPage('/ambientes');

        $I->seeCurrentUrlEquals('/ambientes');

        $nome = 'SALA-TESTE';
        $tipo = '1';

        $I->click('#openNewAmbiente');

        $I->waitForElementVisible('#formAmbiente', 30);
        $I->wait(1);

        $I->fillField('#formAmbienteNome', $nome);
        $I->selectOption('#formAmbienteTipo', $tipo);

        $I->wait(2);
        $I->click('#formAmbiente .save');

        $I->waitForElementNotVisible('#formAmbiente', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see($nome);
    }
}