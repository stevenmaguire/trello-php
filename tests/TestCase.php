<?php namespace Trello\Tests;

use Trello\Configuration;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        \PHPUnit_Framework_Error_Warning::$enabled = false;
        Configuration::environment(getenv('API_ENVIRONMENT'));
        Configuration::key(getenv('API_KEY'));
        Configuration::secret(getenv('API_SECRET'));
        Configuration::token(getenv('API_TOKEN'));
        Configuration::applicationName(getenv('API_APPNAME'));
        Configuration::oauthCallbackUrl(getenv('API_CALLBACK_URL'));
    }

    protected function mockHttpClientResponse($response)
    {

    }

    protected function mockRequestMethod($client)
    {

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
