<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class UnidadesCurricularesCest extends BaseAcceptanceCest {
    public function listAllUnidadesCurriculares(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('go to the list of unidades curriculares');
        $I->amOnPage('/unidades_curriculares');

        $I->seeCurrentUrlEquals('/unidades_curriculares');

        $I->see('S049 - Modelagem de Banco de Dados');
        $I->see('S075 - Sistema de Gerenciamento de Banco de Dados');


        $I->click('a[data-target="#uc-turmas-1"]');
        $I->waitForElementVisible('#uc-turmas-1');

        $I->see('S049');
        $I->see('S049N');
    }

    public function editUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('#ucEditBtn');

        $I->waitForElementChange('#ucNome', function(\WebDriverElement $el) {
            return $el->isEnabled();
        }, 5);

        $newNome  = 'TT089 - TESTE';
        $newSigla = 'TT089';

        $I->fillField('#ucNome', $newNome);
        $I->fillField('#ucSigla', $newSigla);

        $I->click('#ucForm button[type="submit"]');

        $I->see('Unidade curricular salva com sucesso');
        $I->see($newNome);
        $I->see($newSigla);
    }

    public function deleteUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete an unidade curricular');
        $I->amOnPage('/unidades_curriculares');

        $I->seeCurrentUrlEquals('/unidades_curriculares');

        $I->click('tr[data-id="1"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('removida com sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('S049 - Modelagem de Banco de Dados');
    }

    public function createUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create an unidade curricular');
        $I->amOnPage('/unidades_curriculares/criar');

        $I->seeCurrentUrlEquals('/unidades_curriculares/criar');

        $nome  = 'TESTE TESTE';
        $sigla = 'TTT';
        $carga = 70;

        $I->fillField('#ucNome', $nome);
        $I->fillField('#ucSigla', $sigla);
        $I->fillField('#ucCargaHoraria', $carga);

        $I->click('#ucForm button[type="submit"]');

        $I->see('Unidade curricular salva com sucesso');
    }

    public function listCursosOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('list cursos of an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#cursos"]');

        $I->waitForElementVisible('#cursos');

        $I->see('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS');
        $I->see('REDES DE COMPUTADORES');
        $I->see('SISTEMAS DE TELECOMUNICAÇÕES');
    }

    public function detachCursoOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('detach a curso of an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#cursos"]');

        $I->waitForElementVisible('#cursos');

        $I->click('tr[data-id="2"] .detach');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSee('ANÁLISE E DESENVOLVIMENTO DE SISTEMAS');
    }

    public function attachCursoOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('attach a curso to an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#cursos"]');

        $I->waitForElementVisible('#cursos');

        $I->click('#vincularCursoBtn');

        $I->waitForElementVisible('#vincularCurso', 30);

        $I->fillField('#vincularCursoNome', "AUTOMAÇÃO INDUSTRIAL");

        $I->waitForElementVisible('#cursos ul.typeahead');
        $I->click('#cursos ul.typeahead li[data-value="1"]');

        $I->wait(2);
        $I->click('#vincularCurso .save');

        $I->waitForElementNotVisible('#vincularCurso', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see("AUTOMAÇÃO INDUSTRIAL");
    }

    public function listTurmasOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('list turmas of an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#turmas"]');

        $I->waitForElementVisible('#turmas');

        $I->see('S049');
        $I->see('S049N');
    }

    public function deleteTurmaOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('delete turma of an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#turmas"]');

        $I->waitForElementVisible('#turmas');

        $I->click('tr[data-id="2"] .remove');

        $I->waitForElementVisible('.bootbox .modal-dialog', 30);
        $I->click('.bootbox .modal-dialog .modal-footer .btn-primary');

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->dontSeeElement('tr[data-id="2"]');
    }

    public function createTurmaOfUnidadeCurricular(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('create turma of an unidade curricular');
        $I->amOnPage('/unidades_curriculares/1');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1');

        $I->click('a[href="#turmas"]');

        $I->waitForElementVisible('#turmas');

        $I->click('#criarTurmaBtn');

        $I->waitForElementVisible('#newTurma', 30);

        $nome    = 'S049-TESTE';
        $dataIni = '01/06/2015';
        $dataFim = '01/12/2015';
        $horaIni = '18:30:00';
        $horaFim = '22:30:00';

        $I->fillField('#newTurmaNome', $nome);
        $I->fillField('#newTurmaDataInicio', $dataIni);
        $I->fillField('#newTurmaDataFim', $dataFim);
        $I->fillField('#newTurmaHorarioInicio', $horaIni);
        $I->fillField('#newTurmaHorarioFim', $horaFim);
        $I->fillField('#newTurmaAmbiente', "sala");

        $I->waitForElementVisible('#turmas ul.typeahead');
        $I->click('#turmas ul.typeahead li[data-value="1"]');

        $I->wait(2);
        $I->click('#newTurma .save');

        $I->waitForElementNotVisible('#newTurma', 30);

        $I->waitForText('Sucesso');
        $I->click('.bootbox-close-button');

        $I->waitForElementNotVisible('.bootbox .modal-dialog', 30);

        $I->see($nome);
    }
}