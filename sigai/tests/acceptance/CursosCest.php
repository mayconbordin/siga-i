<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class CursosCest extends BaseAcceptanceCest {
    public function listAllCursos(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of cursos');
        $I->amOnPage('/cursos');

        $I->seeCurrentUrlEquals('/cursos');

        $I->see('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS');
        $I->see('AUTOMAÇÃO INDUSTRIAL');
    }

    public function editCurso(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an cursos');
        $I->amOnPage('/cursos');

        $I->seeCurrentUrlEquals('/cursos');

        $I->click('[data-id="2"] .edit');

        $newSigla = 'TTT';
        $newNome  = 'TESTE TESTE';

        $I->waitForElementVisible('#newCurso', 30);

        $I->fillField('#newCursoSigla', $newSigla);
        $I->fillField('#newCursoNome', $newNome);

        $I->wait(2);
        $I->click('#newCurso .save');

        $I->waitForElementNotVisible('#newCurso', 30);

        $I->see($newSigla);
        $I->see($newNome);
    }

    public function deleteCurso(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/cursos');

        $I->seeCurrentUrlEquals('/cursos');

        $I->click('[data-id="2"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS');
        $I->dontSee('ADS');
    }

    public function createCurso(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an curso');
        $I->amOnPage('/cursos');

        $I->seeCurrentUrlEquals('/cursos');

        $nome  = 'TESTE TESTE';
        $sigla = 'TTT';
        $coord = '1234';

        $I->click('#openNewCurso');

        $I->waitForElementVisible('#newCurso', 30);

        $I->fillField('#newCursoNome', $nome);
        $I->fillField('#newCursoSigla', $sigla);
        $I->fillField('#newCursoCoordenador', $coord);

        $I->waitForElementVisible('ul.typeahead');
        $I->click('ul.typeahead li[data-value="1234"]');

        $I->wait(2);
        $I->click('#newCurso .save');

        $I->waitForElementNotVisible('#newCurso', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see($sigla);
        $I->see($nome);
    }
}