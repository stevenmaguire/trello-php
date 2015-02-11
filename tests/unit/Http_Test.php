<?php namespace Trello\Tests\Unit;

use Mockery;
use Trello\Http;
use Trello\Tests\Helpers\Response;

class Http_Test extends UnitTestCase
{
    public function test_It_Can_Perform_Delete_Http_Request()
    {
        $verb = 'DELETE';
        $path = uniqid();
        $params = ['foo' => 'bar'];
        $url = '/'.$path.'\?'.http_build_query($params).'/';

        $client = $this->successClientWith('{}');
        $client->shouldReceive('sendRequest')->with($verb, $url, Mockery::any())->andReturnSelf();
        $this->useClient($client);

        $result = Http::delete($path, $params);
    }

    public function test_It_Can_Perform_Get_Http_Request()
    {
        $verb = 'GET';
        $path = uniqid();
        $params = ['foo' => 'bar'];
        $url = '/'.$path.'\?'.http_build_query($params).'/';

        $client = $this->successClientWith('{}');
        $client->shouldReceive('sendRequest')->with($verb, $url, Mockery::any())->andReturnSelf();
        $this->useClient($client);

        $result = Http::get($path, $params);
    }

    public function test_It_Can_Perform_Post_Http_Request()
    {
        $verb = 'POST';
        $path = uniqid();
        $params = ['foo' => 'bar'];
        $url = '/'.$path.'/';
        $request_body = '/'.preg_replace('/\{|\}/', '', json_encode($params)).'/';

        $client = $this->successClientWith('{}');
        $client->shouldReceive('sendRequest')->with($verb, $url, $request_body)->andReturnSelf();
        $this->useClient($client);

        $result = Http::post($path, $params);
    }

    public function test_It_Can_Perform_Put_Http_Request()
    {
        $verb = 'PUT';
        $path = uniqid();
        $params = ['foo' => 'bar'];
        $url = '/'.$path.'/';
        $request_body = '/'.preg_replace('/\{|\}/', '', json_encode($params)).'/';

        $client = $this->successClientWith('{}');
        $client->shouldReceive('sendRequest')->with($verb, $url, $request_body)->andReturnSelf();
        $this->useClient($client);

        $result = Http::put($path, $params);
    }

    /**
     * @expectedException Trello\Exception
     **/
    public function test_It_Will_Throw_Expection_If_Non_Success_Status_Code_Returned()
    {
        $verb = 'GET';
        $path = uniqid();
        $params = ['foo' => 'bar'];
        $url = '/'.$path.'\?'.http_build_query($params).'/';

        $client = $this->failureClientWith('{}', 404);
        $client->shouldReceive('sendRequest')->with($verb, $url, Mockery::any())->andReturnSelf();
        $this->useClient($client);

        $result = Http::get($path, $params);
    }
}
