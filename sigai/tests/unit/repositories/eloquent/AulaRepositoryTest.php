<?php

use App\Exceptions\NotFoundError;

use Carbon\Carbon;

use \DB;

class AulaRepositoryTest extends TestCase
{
    protected $aulaRepository;

    function __construct()
    {
        $this->aulaRepository = new \App\Repositories\Eloquent\AulaRepository();
    }

    public function testExists()
	{
        $exists = $this->aulaRepository->exists(2, Carbon::createFromFormat('Y-m-d', '2014-08-05'));
		$this->assertTrue($exists);
	}
}
