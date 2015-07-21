<?php

class BaseAcceptanceCest {
    protected function authenticate(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->seeCurrentUrlEquals('/auth/login');

        $I->fillField('email', '0000');
        $I->fillField('password','12345');
        $I->click('Entrar', '.form-horizontal');
    }
}