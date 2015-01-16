<?php namespace Trello\Tests\Unit;

use Trello\Configuration;

class Configuration_Test extends UnitTestCase
{
    private function getEnvironmentArray()
    {
        return array(
            'environment' => getenv('TRELLO_API_ENVIRONMENT'),
            'key' => getenv('TRELLO_API_KEY'),
            'secret' => getenv('TRELLO_API_SECRET'),
            'token' => getenv('TRELLO_API_TOKEN'),
            'name' => getenv('TRELLO_API_APPNAME'),
            'callback_url' => getenv('TRELLO_API_APPNAME')
        );
    }

    public function test_It_Can_Set_Configuration()
    {
        $configuration = $this->getEnvironmentArray();

        Configuration::environment($configuration['environment']);
        Configuration::key($configuration['key']);
        Configuration::secret($configuration['secret']);
        Configuration::token($configuration['token']);
        Configuration::applicationName($configuration['name']);
        Configuration::oauthCallbackUrl($configuration['callback_url']);


        $this->assertEquals($configuration['environment'],   Configuration::environment());
        $this->assertEquals($configuration['key'],           Configuration::key());
        $this->assertEquals($configuration['secret'],        Configuration::secret());
        $this->assertEquals($configuration['token'],         Configuration::token());
        $this->assertEquals($configuration['name'],          Configuration::applicationName());
        $this->assertEquals($configuration['callback_url'],  Configuration::oauthCallbackUrl());
    }

    public function test_It_Can_Set_Configuration_With_Arrays()
    {
        $configuration = $this->getEnvironmentArray();

        Configuration::environment(array($configuration['environment']));
        Configuration::key(array($configuration['key']));
        Configuration::secret(array($configuration['secret']));
        Configuration::token(array($configuration['token']));
        Configuration::applicationName(array($configuration['name']));
        Configuration::oauthCallbackUrl(array($configuration['callback_url']));

        $this->assertEquals($configuration['environment'],   Configuration::environment());
        $this->assertEquals($configuration['key'],           Configuration::key());
        $this->assertEquals($configuration['secret'],        Configuration::secret());
        $this->assertEquals($configuration['token'],         Configuration::token());
        $this->assertEquals($configuration['name'],          Configuration::applicationName());
        $this->assertEquals($configuration['callback_url'],  Configuration::oauthCallbackUrl());
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
