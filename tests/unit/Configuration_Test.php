<?php

class Configuration_Test extends TestCase
{
    public function test_It_Can_Set_Configuration()
    {
        $environment = getenv('TRELLO_API_ENVIRONMENT');
        $key = getenv('TRELLO_API_KEY');
        $secret = getenv('TRELLO_API_SECRET');
        $token = getenv('TRELLO_API_TOKEN');
        $name = getenv('TRELLO_API_APPNAME');
        $callback_url = getenv('TRELLO_API_APPNAME');

        Trello_Configuration::environment($environment);
        Trello_Configuration::key($key);
        Trello_Configuration::secret($secret);
        Trello_Configuration::token($token);
        Trello_Configuration::applicationName($name);
        Trello_Configuration::oauthCallbackUrl($callback_url);


        $this->assertEquals($environment,   Trello_Configuration::environment());
        $this->assertEquals($key,           Trello_Configuration::key());
        $this->assertEquals($secret,        Trello_Configuration::secret());
        $this->assertEquals($token,         Trello_Configuration::token());
        $this->assertEquals($name,          Trello_Configuration::applicationName());
        $this->assertEquals($callback_url,  Trello_Configuration::oauthCallbackUrl());
    }

    public function test_It_Can_Set_Configuration_With_Arrays()
    {
        $environment = getenv('TRELLO_API_ENVIRONMENT');
        $key = getenv('TRELLO_API_KEY');
        $secret = getenv('TRELLO_API_SECRET');
        $token = getenv('TRELLO_API_TOKEN');
        $name = getenv('TRELLO_API_APPNAME');
        $callback_url = getenv('TRELLO_API_APPNAME');

        Trello_Configuration::environment(array($environment));
        Trello_Configuration::key(array($key));
        Trello_Configuration::secret(array($secret));
        Trello_Configuration::token(array($token));
        Trello_Configuration::applicationName(array($name));
        Trello_Configuration::oauthCallbackUrl(array($callback_url));

        $this->assertEquals($environment,   Trello_Configuration::environment());
        $this->assertEquals($key,           Trello_Configuration::key());
        $this->assertEquals($secret,        Trello_Configuration::secret());
        $this->assertEquals($token,         Trello_Configuration::token());
        $this->assertEquals($name,          Trello_Configuration::applicationName());
        $this->assertEquals($callback_url,  Trello_Configuration::oauthCallbackUrl());
    }

    /**
     * @expectedException Trello_Exception_Configuration
     */
    public function test_It_Cannot_Set_Invalid_Environment()
    {
        $environment = rand(1000,9999);

        Trello_Configuration::environment($environment);
    }

    /**
     * @depends test_It_Can_Set_Configuration
     */
    public function test_It_Can_Reset_Configuration()
    {
        Trello_Configuration::reset();
    }

    public function test_It_Get_Requests()
    {
        $requests = [
            ['verb','path',null],
            ['verb','path','body']
        ];
        foreach ($requests as $request) {
            Trello_Configuration::logRequest($request[0], $request[1], $request[2]);
        }

        $results = Trello_Configuration::getRequests();

        $this->assertInstanceOf('Trello_Collection', $results);
    }
}
