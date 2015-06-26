<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class TurmasCest extends BaseAcceptanceCest {
    public function listAllTurmas(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of turmas');
        $I->amOnPage('/turmas');

        $I->seeCurrentUrlEquals('/turmas');

        $I->waitForElementVisible('#turmas tbody tr');

        $I->see('S032N');
        $I->see('S049');

        $numRows = $I->executeJS('return $("#turmas tbody tr").length');

        $I->assertEquals(6, $numRows);
    }

    public function filterTurmasByName(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('filter list of turmas by name');
        $I->amOnPage('/turmas');

        $I->seeCurrentUrlEquals('/turmas');

        $I->waitForElementVisible('#turmas tbody tr');

        $I->fillField('.bootstrap-table .search input', 'S04');
        $I->waitForJS("return $.active == 0;", 60);
        $I->waitForElementVisible('#turmas tbody tr');

        $I->see('S049N');
        $I->see('S049');

        $numRows = $I->executeJS('return $("#turmas tbody tr").length');

        $I->assertEquals(2, $numRows);
    }

    public function filterTurmasByDataInicio(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('filter list of turmas by start date');
        $I->amOnPage('/turmas');

        $I->seeCurrentUrlEquals('/turmas');

        $I->waitForElementVisible('#turmas tbody tr');

        $I->selectOption('#searchField', 'Data de Início');
        $I->fillField('.bootstrap-table .search input', '2014');
        $I->waitForJS("return $.active == 0;", 60);
        $I->waitForElementVisible('#turmas tbody tr');

        $I->see('S049');
        $I->see('S075N');
        $I->see('S087N');

        $numRows = $I->executeJS('return $("#turmas tbody tr").length');

        $I->assertEquals(3, $numRows);
    }

    public function filterTurmasByUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('filter list of turmas by unidade curricular');
        $I->amOnPage('/turmas');

        $I->seeCurrentUrlEquals('/turmas');

        $I->waitForElementVisible('#turmas tbody tr');

        $I->selectOption('#searchField', 'Unidade Curricular');
        $I->fillField('.bootstrap-table .search input', 'S049');
        $I->waitForJS("return $.active == 0;", 60);
        $I->waitForElementVisible('#turmas tbody tr');

        $I->see('S049N');
        $I->see('S049');

        $numRows = $I->executeJS('return $("#turmas tbody tr").length');

        $I->assertEquals(2, $numRows);
    }

    public function filterTurmasByProfessor(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('filter list of turmas by professor');
        $I->amOnPage('/turmas');

        $I->seeCurrentUrlEquals('/turmas');

        $I->waitForElementVisible('#turmas tbody tr');

        $I->selectOption('#searchField', 'Professores');
        $I->fillField('.bootstrap-table .search input', 'valderi');
        $I->waitForJS("return $.active == 0;", 60);
        $I->waitForElementVisible('#turmas tbody tr');

        $I->see('S049');
        $I->see('S075N');
        $I->see('S087N');

        $numRows = $I->executeJS('return $("#turmas tbody tr").length');

        $I->assertEquals(3, $numRows);
    }
}