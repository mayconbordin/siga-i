<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class ProfessoresCest extends BaseAcceptanceCest {
    public function listAllProfessores(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of professores');
        $I->amOnPage('/professores');

        $I->seeCurrentUrlEquals('/professores');

        $I->see('Alexandre Gaspary Haupt');
        $I->see('Valderi R. Q. Leithardt');

        $I->dontSeeElement('.pagination');
    }

    public function editProfessor(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an professor');
        $I->amOnPage('/professores');

        $I->seeCurrentUrlEquals('/professores');

        $I->click('[data-matricula="5678"] .edit');

        $newMatricula = '567888888800';
        $newNome = 'TESTE TESTE';

        $I->waitForElementVisible('#newProfessor', 30);

        $I->fillField('#newProfessorMatricula', $newMatricula);
        $I->fillField('#newProfessorNome', $newNome);
        $I->click('#newProfessor .save');

        $I->waitForElementNotVisible('#newProfessor', 30);

        $I->see($newMatricula);
        $I->see($newNome);
    }

    public function deleteProfessor(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an professor');
        $I->amOnPage('/professores');

        $I->seeCurrentUrlEquals('/professores');

        $I->click('[data-matricula="5678"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('Guilherme Dal Bianco');
        $I->dontSee('5678');
    }

    public function createProfessor(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an aluno');
        $I->amOnPage('/professores');

        $I->seeCurrentUrlEquals('/professores');

        $matricula = '157269888888';
        $nome      = 'TESTE TESTE';
        $email     = 'teste17777@gmail.com';
        $senha     = '12345';

        $I->click('#openNewProfessor');

        $I->waitForElementVisible('#newProfessor', 30);

        $I->fillField('#newProfessorMatricula', $matricula);
        $I->fillField('#newProfessorNome', $nome);
        $I->fillField('#newProfessorEmail', $email);
        $I->fillField('#newProfessorPassword', $senha);
        $I->selectOption('#newProfessorCursoOrigem', 'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS');
        $I->click('#newProfessor .save');

        $I->waitForElementNotVisible('#newProfessor', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see($matricula);
        $I->see($nome);
    }
}