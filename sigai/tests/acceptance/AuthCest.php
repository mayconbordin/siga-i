<?php

include_once __DIR__.'/BaseAcceptanceCest.php';

class AuthCest extends BaseAcceptanceCest {
    public function login(AcceptanceTester $I)
    {
        $I->wantTo('sign in with valid account');
        $I->amOnPage('/');

        $I->seeCurrentUrlEquals('/auth/login');

        $I->fillField('email', '1234');
        $I->fillField('password','12345');
        $I->click('Entrar', '.form-horizontal');

        $I->seeCurrentUrlEquals('/');
        $I->see('Minhas Turmas');
        $I->see('Próximas Aulas');
    }

    public function checkIfLogged(AcceptanceTester $I)
    {
        $I->wantTo('check if I am logged in');
        $I->amOnPage('/');

        $this->authenticate($I);

        $I->seeCurrentUrlEquals('/');
        $I->see('Minhas Turmas');
        $I->see('Próximas Aulas');
    }
}