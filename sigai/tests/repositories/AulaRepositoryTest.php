<?php

use App\Repositories\AulaRepository;
use App\Exceptions\NotFoundError;

use Carbon\Carbon;

class AulaRepositoryTest extends TestCase {
    public function testExists()
	{
	    $exists = AulaRepository::exists(2, Carbon::createFromFormat('Y-m-d', '2014-08-05'));
		$this->assertTrue($exists);
	}
}
