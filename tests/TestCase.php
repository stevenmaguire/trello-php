<?php

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        PHPUnit_Framework_Error_Warning::$enabled = false;
        Trello_Configuration::environment(getenv('TRELLO_API_ENVIRONMENT'));
        Trello_Configuration::key(getenv('TRELLO_API_KEY'));
        Trello_Configuration::secret(getenv('TRELLO_API_SECRET'));
        Trello_Configuration::token(getenv('TRELLO_API_TOKEN'));
        Trello_Configuration::applicationName(getenv('TRELLO_API_APPNAME'));
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
