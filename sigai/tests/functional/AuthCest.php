<?php

use App\Repositories\Eloquent\UsuarioRepository;

class AuthCest {


    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amLoggedAs(UsuarioRepository::findById(49));
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amLoggedAs(['email' => 'valderi_r._q._leithardt@gmail.com', 'password' => '12345']);
    }

    public function requireAuthenticationForRoute(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/auth/login');
        $I->see('Entrar', '.panel-body');
        $I->amLoggedAs(UsuarioRepository::findById(49));
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Minhas Turmas');
        $I->see('Próximas Aulas');
    }
}