<?php namespace Codeception\Module;
// here you can define custom actions
// all public methods declared in helper class will be available in $I
class ApiHelper extends \Codeception\Module
{
    public function seeResponseIsHtml()
    {
        $response = $this->getModule('REST')->response;
        \PHPUnit_Framework_Assert::assertRegex('~^<!DOCTYPE HTML(.*?)<html>.*?<\/html>~m', $response);
    }

    public function seeResponseIsJsonArray()
    {
        $json = json_decode($this->getModule('REST')->response, true);

        \PHPUnit_Framework_Assert::assertTrue(is_array($json));
    }

    public function seeResponseJsonArrayHasExactly($size)
    {
        $json = json_decode($this->getModule('REST')->response, true);

        \PHPUnit_Framework_Assert::assertTrue(is_array($json));
        \PHPUnit_Framework_Assert::assertEquals($size, sizeof($json));
    }

    public function seeResponseJsonArrayHasAtLeast($size)
    {
        $json = json_decode($this->getModule('REST')->response, true);

        \PHPUnit_Framework_Assert::assertTrue(is_array($json));
        \PHPUnit_Framework_Assert::assertGreaterThanOrEqual($size, sizeof($json));
    }

    public function seeResponseJsonArrayHasAtMost($size)
    {
        $json = json_decode($this->getModule('REST')->response, true);

        \PHPUnit_Framework_Assert::assertTrue(is_array($json));
        \PHPUnit_Framework_Assert::assertLessThanOrEqual($size, sizeof($json));
    }

    public function seeResponseJsonArrayHasKey($key)
    {
        $json = json_decode($this->getModule('REST')->response, true);

        \PHPUnit_Framework_Assert::assertTrue(is_array($json));
        \PHPUnit_Framework_Assert::assertTrue(isset($json[$key]));
    }

    public function assertArrayIsSorted(array $arr, $order = 'asc')
    {
        $sorted = $arr;

        if ($order == 'asc')
            sort($sorted);
        else
            rsort($sorted);

        \PHPUnit_Framework_Assert::assertEquals($sorted, $arr);
    }
}