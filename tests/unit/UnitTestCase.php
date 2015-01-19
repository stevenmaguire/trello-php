<?php namespace Trello\Tests\Unit;

use \Mockery;
use Trello\Instance;
use Trello\Tests\TestCase;

abstract class UnitTestCase extends TestCase
{
    protected function successWith($response)
    {
        $client = Mockery::mock('Trello\Contracts\HttpClient');
        $client->shouldReceive('sendRequest')->once();
        $client->shouldReceive('setHeaders')->once()->andReturn($client);
        $client->shouldReceive('getResponseBody')->once()->andReturn($response);
        $client->shouldReceive('getResponseStatus')->once()->andReturn(200);

        Instance::getInstance()->setHttpClient($client);
    }

    protected function failureWith($response = '{}', $error = 404)
    {
        $client = Mockery::mock('Trello\Contracts\HttpClient');
        $client->shouldReceive('sendRequest')->once();
        $client->shouldReceive('setHeaders')->once()->andReturn($client);
        $client->shouldReceive('getResponseBody')->once()->andReturn($response);
        $client->shouldReceive('getResponseStatus')->once()->andReturn($error);

        Instance::getInstance()->setHttpClient($client);
    }
}
