<?php

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        PHPUnit_Framework_Error_Warning::$enabled = false;
    }
}
