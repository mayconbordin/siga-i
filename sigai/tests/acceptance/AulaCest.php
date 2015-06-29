<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class AulaCest extends BaseAcceptanceCest {

    public function editAula(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('edit an aula');
        $I->amOnPage('/unidades_curriculares/1/turmas/2/aulas/2014-08-05');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2/aulas/2014-08-05');

        $I->click('#aulaEditBtn');

        $I->waitForElementChange('#aulaConteudo', function(\WebDriverElement $el) {
            return $el->isEnabled();
        }, 5);

        $newConteudo    = 'TESTE';
        $newObservation = 'TESTE--TESTE';

        $I->fillField('#aulaConteudo', $newConteudo);
        $I->fillField('#aulaObs', $newObservation);

        $I->click('#aulaForm button[type="submit"]');

        $I->see('Aula salva com sucesso');
        $I->see($newConteudo);
        $I->see($newObservation);
    }

    public function doChamada(AcceptanceTester $I)
    {
        $this->authenticate($I);

        $I->wantTo('do the chamada of the aula');
        $I->amOnPage('/unidades_curriculares/1/turmas/2/aulas/2014-08-05');

        $I->seeCurrentUrlEquals('/unidades_curriculares/1/turmas/2/aulas/2014-08-05');

        $I->click('a[href="#chamada"]');

        $I->waitForElementVisible('#chamada');

        $I->click('tr[data-matricula="15722"] .period-p1 .toggle-on');

        $I->waitForElementChange('tr[data-matricula="15722"] .period-p1 .toggle-off', function(\WebDriverElement $el) {
            return stripos($el->getAttribute('class'), 'active') !== false;
        }, 5);


        $I->click('#saveChamada-1');
        $I->waitForElementChange('#saveChamada-1', function(\WebDriverElement $el) {
            return $el->getText() != 'Salvando...';
        }, 5);

        $result = $I->executeJS("return $('tr[data-matricula=15722] .period-p1 input[type=checkbox]').prop('checked');");
        $I->assertEquals(false, $result);


        $I->click('tr[data-matricula="20531"] .checkRow .toggle-off');
        $I->waitForElementChange('tr[data-matricula="20531"] .checkRow .toggle', function(\WebDriverElement $el) {
            return stripos($el->getAttribute('class'), 'off') === false;
        }, 5);

        for ($i=1; $i<=4; $i++) {
            $result = $I->executeJS("return $('tr[data-matricula=20531] .period-p$i input[type=checkbox]').prop('checked');");
            $I->assertEquals(true, $result);
        }
    }
}