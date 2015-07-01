<?php

include_once __DIR__.'/BaseResourceCest.php';

use \DB;

class ChamadaResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/chamada';

    public function saveChamada(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 18:20:00'
        ];

        $I->wantTo("Save a chamada");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamda to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("first two periods to be true");
        $I->assertEquals('1', $aula->p1);
        $I->assertEquals('1', $aula->p2);
        $I->assertEquals('0', $aula->p3);
        $I->assertEquals('0', $aula->p4);
    }

    public function saveChamadaSecondPeriod(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 19:20:00'
        ];

        $I->wantTo("Save chamada, only the second period");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamada to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("only second period to be true");
        $I->assertEquals('0', $aula->p1);
        $I->assertEquals('1', $aula->p2);
        $I->assertEquals('0', $aula->p3);
        $I->assertEquals('0', $aula->p4);
    }

    public function saveChamadaThirdPeriod(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 21:00:00'
        ];

        $I->wantTo("Save chamada, third and forth periods");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamada to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("third and forth periods to be true");
        $I->assertEquals('0', $aula->p1);
        $I->assertEquals('0', $aula->p2);
        $I->assertEquals('1', $aula->p3);
        $I->assertEquals('1', $aula->p4);
    }

    public function saveChamadaLastPeriod(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 21:55:00'
        ];

        $I->wantTo("Save chamada, last period");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamada to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("last period to be true");
        $I->assertEquals('0', $aula->p1);
        $I->assertEquals('0', $aula->p2);
        $I->assertEquals('0', $aula->p3);
        $I->assertEquals('1', $aula->p4);
    }

    public function saveChamadaTooLate(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 22:20:00'
        ];

        $I->wantTo("Save chamada, too late");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamada to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("no period to be true");
        $I->assertEquals('0', $aula->p1);
        $I->assertEquals('0', $aula->p2);
        $I->assertEquals('0', $aula->p3);
        $I->assertEquals('0', $aula->p4);
    }

    public function saveChamadaTooEarly(ApiTester $I)
    {
        //$this->authenticate($I);

        $data = [
            'device_id' => 'client3id',
            'card_id'   => '111111',
            'timestamp' => '2014-08-05 18:09:00'
        ];

        $I->wantTo("Save chamada, too early");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST($this->endpoint, $data);

        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();

        $aula = DB::table('chamadas')->where('aluno_id', 1)->where('aula_id', 1)->first();

        $I->expect("the chamada to have been saved in the database");
        $I->assertNotNull($aula);

        $I->expect("no period to be true");
        $I->assertEquals('0', $aula->p1);
        $I->assertEquals('0', $aula->p2);
        $I->assertEquals('0', $aula->p3);
        $I->assertEquals('0', $aula->p4);
    }
}