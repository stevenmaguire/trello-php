<?php namespace Stevenmaguire\Services\Trello\Tests;

use BadMethodCallException;
use GuzzleHttp\ClientInterface as HttpClient;
use Mockery as m;
use GuzzleHttp\Exception\BadResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Stevenmaguire\Services\Trello\Authorization;
use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Exceptions\Exception as ServiceException;

class ClientTest extends TestCase
{
    use ApiTestTrait;

    protected $config;

    public function setUp(): void
    {
        parent::setUp();
        $this->config = [
            'domain' => 'https://'.uniqid(),
            'key' => uniqid(),
            'token' => uniqid(),
            'secret' => uniqid(),
            'version' => 'v'.uniqid(),
        ];

        $this->client = new Client($this->config);
    }

    protected function assertExpectedEqualsResult($expected, $result)
    {
        $expected = json_decode(json_encode($expected), true);
        $result = json_decode(json_encode($result), true);

        $this->assertEquals($expected, $result);
    }

    protected function getAuthorizedQuery()
    {
        $query = [];

        array_walk($this->config, function ($v, $k) use (&$query) {
            if (in_array($k, ['key','token'])) {
                $query[$k] = $v;
            }
        });

        return http_build_query($query);
    }

    protected function getDomain()
    {
        return $this->config['domain'] ?: 'https://trello.com';
    }

    protected function getFullPathFromPath($path = '/')
    {
        $url = '/' . $this->config['version'] ?: '1';
        $url .= '/' . ltrim($path, '/');

        return $url;
    }

    protected function getSuccessPayload()
    {
        return [uniqid() => uniqid()];
    }

    protected function getTestAttributes()
    {
        return [uniqid() => uniqid()];
    }

    protected function getTestString()
    {
        return uniqid();
    }

    protected function prepareFor($method, $path, $query = "", $payload = [], $status = 200, $proxy = null)
    {
        $path = $this->getFullPathFromPath($path);
        $domain = $this->getDomain();
        $authorizedQuery = $this->getAuthorizedQuery();

        $request = m::on(function ($request) use ($method, $domain, $path, $query, $authorizedQuery) {
            $uri = $request->getUri();

            return $request->getMethod() === strtoupper($method)
                && $uri->getScheme().'://'.$uri->getHost() === $domain
                && $uri->getPath() === $path
                && (!empty($query) ? (strpos($uri->getQuery(), $query) > -1) : true)
                && strpos($uri->getQuery(), $authorizedQuery) > -1;
        });

        $requestOptions = m::on(function ($options) use ($proxy) {
            if ($proxy && (!isset($options['proxy']) || $options['proxy'] != $proxy)) {
                return false;
            }
            return is_array($options);
        });

        $response = m::mock(ResponseInterface::class);
        $response->shouldReceive('getStatusCode')->andReturn($status);

        if (is_null($payload)) {
            $response->shouldReceive('getBody')->andReturn(null);
        } else {
            if (is_string($payload)) {
                $responseBody = $payload;
            } else {
                $responseBody = json_encode($payload);
            }

            $stream = m::mock(StreamInterface::class);
            $stream->shouldReceive('__toString')->andReturn($responseBody);

            $response->shouldReceive('getBody')->andReturn($stream);
            $response->shouldReceive('getHeader')->with('content-type')->andReturn('application/json');
        }

        $client = m::mock(HttpClient::class);
        if ($status == 200) {
            $client->shouldReceive('send')->with($request, $requestOptions)->andReturn($response);
        } else {
            $badRequest = m::mock(RequestInterface::class);
            $response->shouldReceive('getReasonPhrase')->andReturn("");

            $exception = new BadResponseException('test exception', $badRequest, $response);
            $client->shouldReceive('send')->with($request, $requestOptions)->andThrow($exception);
        }

        $this->client->setHttpClient($client);
    }

    public function testGetAuthorization()
    {
        $auth = $this->client->getAuthorization();

        $this->assertInstanceOf(Authorization::class, $auth);
    }

    public function testGetAuthenticatedRequest()
    {
        $request = $this->client->getHttp()->getRequest('get', '/');

        $this->assertContains($this->getAuthorizedQuery(), $request->getUri()->getQuery());
    }

    public function testGetNonAuthenticatedRequest()
    {
        $request = $this->client->getHttp()->getRequest('get', '/', [], false);

        $this->assertNotContains($this->getAuthorizedQuery(), $request->getUri()->getQuery());
    }

    /**
     * @expectedException Stevenmaguire\Services\Trello\Exceptions\Exception
     */
    public function testBadRequestThrowsExeptionWithValidJson()
    {
        $path = uniqid();
        $responseBody = ['message' => 'Errors!'];
        $this->prepareFor("GET", $path, "", $responseBody, 400);

        $result = $this->client->getHttp()->get($path);
    }

    /**
     * @expectedException Stevenmaguire\Services\Trello\Exceptions\Exception
     */
    public function testBadRequestThrowsExeptionWithoutValidJson()
    {
        $path = uniqid();
        $responseBody = "Errors!";
        $this->prepareFor("GET", $path, "", $responseBody, 400);

        $result = $this->client->getHttp()->get($path);
    }

    public function testBadRequestThrowsExeptionWithoutResponse()
    {
        $path = uniqid();
        $this->prepareFor("GET", $path, "", null, 400);

        try {
            $result = $this->client->getHttp()->get($path);
        } catch (ServiceException $e) {
            $this->assertTrue(is_string($e->getMessage()));
            $this->assertTrue(is_numeric($e->getCode()));
            $this->assertNull($e->getResponseBody());
        }
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testBadMethodCallThrowsException()
    {
        $method = uniqid();

        $result = $this->client->$method();
    }

    public function testGetCurrentUserWithProxy()
    {
        $proxy = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/me", "", $payload, 200, $proxy);

        $this->client->addConfig('proxy', $proxy);

        $result = $this->client->getCurrentUser();

        $this->client->addConfig('proxy', null);

        $this->assertExpectedEqualsResult($payload, $result);
    }
}
