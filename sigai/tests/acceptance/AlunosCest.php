<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class AlunosCest extends BaseAcceptanceCest {
    public function listAllAlunos(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of alunos');
        $I->amOnPage('/alunos');

        $I->seeCurrentUrlEquals('/alunos');

        $I->see('ABNER BORDA FONSECA');
        $I->see('ARTHUR HENRIQUE MENDES BERTE');

        $I->click('ul.pagination li:nth-child(3) a');

        $I->seeCurrentUrlEquals('/alunos?page=2');
        $I->see('BRUNO DA SILVA BRIXIUS');
        $I->see('FAGNER DAVID NUNES');
    }

    public function editAluno(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an aluno');
        $I->amOnPage('/alunos');

        $I->seeCurrentUrlEquals('/alunos');

        $I->click('[data-matricula="15726"] .edit');

        $newMatricula = '157269888888';
        $newNome = 'TESTE TESTE';

        $I->waitForElementVisible('#newAluno', 30);

        $I->fillField('#newAlunoMatricula', $newMatricula);
        $I->fillField('#newAlunoNome', $newNome);

        $I->wait(2);
        $I->click('#newAluno .save');

        $I->waitForElementNotVisible('#newAluno', 30);

        $I->see($newMatricula);
        $I->see($newNome);
    }

    public function deleteAluno(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an aluno');
        $I->amOnPage('/alunos');

        $I->seeCurrentUrlEquals('/alunos');

        $I->click('[data-matricula="15726"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('ABNER BORDA FONSECA');
        $I->dontSee('15726');
    }

    public function createAluno(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an aluno');
        $I->amOnPage('/alunos');

        $I->seeCurrentUrlEquals('/alunos');

        $matricula = '157269888888';
        $nome      = 'TESTE TESTE';
        $email     = 'teste17777@gmail.com';
        $senha     = '12345';

        $I->click('#openNewAluno');

        $I->waitForElementVisible('#newAluno', 30);

        $I->fillField('#newAlunoMatricula', $matricula);
        $I->fillField('#newAlunoNome', $nome);
        $I->fillField('#newAlunoEmail', $email);
        $I->fillField('#newAlunoPassword', $senha);

        $I->wait(2);
        $I->click('#newAluno .save');

        $I->waitForElementNotVisible('#newAluno', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see($matricula);
        $I->see($nome);
    }
}