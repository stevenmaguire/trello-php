<?php

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        PHPUnit_Framework_Error_Warning::$enabled = false;
    }

    protected function isHhvm()
    {
        try {
            $version = phpversion();
            if (stripos($version, 'hhvm') !== false) {
                return true;
            }
            if (stripos($version, 'hiphop') !== false) {
                return true;
            }
        } catch (Exception $e) {
            return true;
        }
        return false;
    }
}
