<?php namespace Trello\Tests\Unit;

use Mockery;
use Mockery\MockInterface;
use Trello\Instance;
use Trello\Tests\TestCase as BaseTestCase;

abstract class UnitTestCase extends BaseTestCase
{
    protected function successClientWith($response)
    {
        $client = $this->makeClient();
        $client->shouldReceive('getResponseBody')->once()->andReturn($response);
        $client->shouldReceive('getResponseStatus')->once()->andReturn(200);

        return $client;
    }

    protected function failureClientWith($response = '{}', $error = 404)
    {
        $client = $this->makeClient();
        $client->shouldReceive('getResponseBody')->once()->andReturn($response);
        $client->shouldReceive('getResponseStatus')->once()->andReturn($error);

        return $client;
    }

    protected function useClient(MockInterface $client)
    {
        $send_expectations = $client->mockery_getExpectationsFor('sendRequest');
        if (empty($send_expectations)) {
            $client->shouldReceive('sendRequest')->once()->andReturnSelf();
        }
        Instance::getInstance()->setHttpClient($client);
    }

    private function makeClient()
    {
        $client = Mockery::mock('Trello\Contracts\HttpClient');
        $client->shouldReceive('setHeaders')->once()->andReturn($client);

        return $client;
    }
}
