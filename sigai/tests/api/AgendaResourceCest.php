<?php

include_once __DIR__.'/BaseResourceCest.php';

use \DB;
use Carbon\Carbon;

class AgendaResourceCest extends BaseResourceCest
{
    protected $endpoint = '/api/agenda';

    public function getAgenda(ApiTester $I)
    {
        //$this->authenticateOAuth($I, 'write-chamada');

        $I->wantTo("Get the agenda of this month");
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendGET($this->endpoint, ['month' => 8, 'year' => 2014, 'matricula' => '1234']);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        dd($I->grabResponse());

        $date = Carbon::create(2014, 8, 1);
        $json = json_decode($I->grabResponse(), true);

        $I->expect("all days of month to be on response");
        for ($day=1; $day<=$date->lastOfMonth()->day; $day++) {
            $I->assertTrue(isset($json["$day"]));

            if (in_array($day, [1, 5, 8, 12, 15, 19, 22, 26, 29])) {
                $I->expect("that the day $day has one aula");
                $I->assertEquals(1, sizeof($json["$day"]["aulas"]));
            } else {
                $I->expect("that the day $day has no aula");
                $I->assertEquals(0, sizeof($json["$day"]["aulas"]));
            }
        }
    }
}