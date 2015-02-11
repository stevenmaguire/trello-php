<?php namespace Trello\Tests\Unit;

use Trello\Clients\HttpClient;

class HttpClient_Test extends UnitTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = new HttpClient;
    }

    public function test_It_Can_Get_Response_Body()
    {
        $this->assertNull($this->client->getResponseBody());
    }

    public function test_It_Can_Get_Response_Status()
    {
        $this->assertNull($this->client->getResponseStatus());
    }

    public function test_It_Can_Get_And_Set_Request_Headers()
    {
        $headers = [uniqid()];

        $request_headers = $this->client->setHeaders($headers)->getHeaders();

        $this->assertEquals($headers,$request_headers);
    }
}
