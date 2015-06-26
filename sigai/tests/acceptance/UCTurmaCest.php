<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class UCTurmaCest extends BaseAcceptanceCest {
    public function viewTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to an turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->see('S049 - Modelagem de Banco de Dados');
        $I->see('S049');
    }

    public function editTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('#turmaEditBtn');

        $I->waitForElementChange('#turmaNome', function(\WebDriverElement $el) {
            return $el->isEnabled();
        }, 5);

        $newNome = 'TT089 - TESTE';

        $I->fillField('#turmaNome', $newNome);
        $I->click('#turmaForm button[type="submit"]');

        $I->see('Turma salva com sucesso');
        $I->see($newNome);
    }

    public function listAulasOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('list aulas of an turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#aulas"]');

        $I->waitForElementVisible('#aulas');

        $numRows = $I->executeJS('return $("#aulas table>tbody tr").length');
        $I->assertEquals(20, $numRows);
    }

    public function removeAulaOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('remove aula of an turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#aulas"]');

        $I->waitForElementVisible('#aulas');

        $I->click('tr[data-data="2014-08-05"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('05/08/2014');
    }

    public function listAlunosOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('list alunos of an turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#alunos"]');

        $I->waitForElementVisible('#alunos');

        $numRows = $I->executeJS('return $("#alunos table>tbody tr").length');
        $I->assertEquals(26, $numRows);

        $I->see('ABNER BORDA FONSECA');
        $I->see('CRISTIANO DE MOURA');
    }

    public function detachAlunoOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('detach an aluno of a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#alunos"]');

        $I->waitForElementVisible('#alunos');

        $I->click('tr[data-matricula="15726"] .detach');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('ABNER BORDA FONSECA');
    }

    public function editAlunoOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an aluno of a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#alunos"]');

        $I->waitForElementVisible('#alunos');

        $I->click('tr[data-matricula="15726"] .edit');

        $I->waitForElementVisible('#vincularAluno', 30);
        $I->selectOption('#alunoStatus', 'Cancelado');

        $I->wait(1);
        $I->click('#vincularAluno .save');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $status = $I->grabTextFrom('tr[data-matricula="15726"] td:nth-child(4)');
        $I->assertEquals('cancelado', trim($status));
    }

    public function attachAlunoOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('attach an aluno of a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#alunos"]');

        $I->waitForElementVisible('#alunos');

        $I->click('#vincularAlunoBtn');

        $I->waitForElementVisible('#vincularAluno', 30);

        $I->selectOption('#alunoStatus', 'Normal');
        $I->selectOption('#alunoCursoOrigem', 'AUTOMAÇÃO INDUSTRIAL');
        $I->fillField('#alunoNomeOrMatricula', "20525");

        $I->waitForElementVisible('#vincularAluno ul.typeahead', 30);
        $I->click('#vincularAluno ul.typeahead li[data-value="20525"]');

        $I->wait(2);
        $I->click('#vincularAluno .save');

        $I->waitForElementNotVisible('#vincularAluno', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see("ALAN PINHEIRO DOS SANTOS");
    }

    public function detachProfessorOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('detach an professor of a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#professores"]');

        $I->waitForElementVisible('#professores');

        $I->click('tr[data-matricula="1234"] .detach');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSeeElement('tr[data-matricula="1234"]');
    }

    public function attachProfessorOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('attach an professor of a turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#professores"]');

        $I->waitForElementVisible('#professores');

        $I->click('#vincularProfessorBtn');

        $I->waitForElementVisible('#vincularProfessor', 30);

        $I->fillField('#professorNomeOrMatricula', "2345");

        $I->waitForElementVisible('#vincularProfessor ul.typeahead', 30);
        $I->click('#vincularProfessor ul.typeahead li[data-value="2345"]');

        $I->wait(2);
        $I->click('#vincularProfessor .save');

        $I->waitForElementNotVisible('#vincularProfessor', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see("Gustavo B. Brand");
        $I->seeElement('tr[data-matricula="2345"]');
    }

    public function closeDiarioOfTurma(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('close a diario of an turma');
        $I->amOnPage('/unidades_curriculares/1/turmas/2');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2');

        $I->click('a[href="#diarios"]');

        $I->waitForElementVisible('#diarios');

        $I->click('#closeDiarioBtn');

        $I->waitForElementVisible('#closeDiario', 30);
        $I->selectOption('#closeDiarioMes', 'Agosto');

        $I->wait(2);
        $I->click('#closeDiario .save');

        $I->waitForElementNotVisible('#closeDiario', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see("Agosto");

        $I->waitForElement('#diario-1');

        $numRows = $I->executeJS('return $("#diario-1 table>tbody tr").length');
        $I->assertEquals(1, $numRows);

        $I->click('tr[data-mes="8"] .send');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $numRows = $I->executeJS('return $("#diario-1 table>tbody tr").length');
        $I->assertEquals(2, $numRows);
    }
}