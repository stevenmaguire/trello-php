<?php namespace Trello\Tests\Unit;

use Trello\Configuration;

class Configuration_Test extends UnitTestCase
{
    public function test_It_Can_Set_Configuration()
    {
        $environment = getenv('API_ENVIRONMENT');
        $key = getenv('API_KEY');
        $secret = getenv('API_SECRET');
        $token = getenv('API_TOKEN');
        $name = getenv('API_APPNAME');
        $callback_url = getenv('API_APPNAME');

        Configuration::environment($environment);
        Configuration::key($key);
        Configuration::secret($secret);
        Configuration::token($token);
        Configuration::applicationName($name);
        Configuration::oauthCallbackUrl($callback_url);


        $this->assertEquals($environment,   Configuration::environment());
        $this->assertEquals($key,           Configuration::key());
        $this->assertEquals($secret,        Configuration::secret());
        $this->assertEquals($token,         Configuration::token());
        $this->assertEquals($name,          Configuration::applicationName());
        $this->assertEquals($callback_url,  Configuration::oauthCallbackUrl());
    }

    public function test_It_Can_Set_Configuration_With_Arrays()
    {
        $environment = getenv('API_ENVIRONMENT');
        $key = getenv('API_KEY');
        $secret = getenv('API_SECRET');
        $token = getenv('API_TOKEN');
        $name = getenv('API_APPNAME');
        $callback_url = getenv('API_APPNAME');

        Configuration::environment(array($environment));
        Configuration::key(array($key));
        Configuration::secret(array($secret));
        Configuration::token(array($token));
        Configuration::applicationName(array($name));
        Configuration::oauthCallbackUrl(array($callback_url));

        $this->assertEquals($environment,   Configuration::environment());
        $this->assertEquals($key,           Configuration::key());
        $this->assertEquals($secret,        Configuration::secret());
        $this->assertEquals($token,         Configuration::token());
        $this->assertEquals($name,          Configuration::applicationName());
        $this->assertEquals($callback_url,  Configuration::oauthCallbackUrl());
    }

    /**
     * @expectedException Trello\Exception\Configuration
     */
    public function test_It_Cannot_Set_Invalid_Environment()
    {
        $environment = rand(1000,9999);

        Configuration::environment($environment);
    }

    /**
     * @depends test_It_Can_Set_Configuration
     */
    public function test_It_Can_Reset_Configuration()
    {
        Configuration::reset();
    }

    public function test_It_Get_Requests()
    {
        $requests = [
            ['verb','path',null],
            ['verb','path','body']
        ];
        foreach ($requests as $request) {
            Configuration::logRequest($request[0], $request[1], $request[2]);
        }

        $results = Configuration::getRequests();

        $this->assertInstanceOf('Trello\Collection', $results);
    }

    public function test_It_Can_Get_Service_Url()
    {
        $base_path = Configuration::baseUrl();
        $version_path = Configuration::versionPath();

        $url = Configuration::serviceUrl();

        $this->assertEquals($base_path.$version_path, $url);
    }
}
