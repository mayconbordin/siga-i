<?php

use Codeception\TestCase\Test;
use \Mockery as m;

class TestCase extends Test {
    protected function _after()
    {
        m::close();
    }
}