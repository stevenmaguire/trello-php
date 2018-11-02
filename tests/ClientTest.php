<?php

namespace Stevenmaguire\Services\Trello\Tests;

use Exception;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use GuzzleHttp\Psr7;
use Stevenmaguire\Services\Trello\Authorization;
use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Exceptions\Exception as ServiceException;

class ClientTest extends TestCase
{
    use ApiTestTrait;

    protected $config;

    public function setUp()
    {
        parent::setUp();
        $this->config = [
            'domain' => 'https://could.be.trello',
            'key' => uniqid(),
            'token' => uniqid(),
            'secret' => uniqid(),
            'version' => 'v'.random_int(1, 9),
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

    protected function classImplementsInterface($className, $interfaceName)
    {
        $interfaces = class_implements($className);

        return isset($interfaces[$interfaceName]);
    }

    protected function prepareFor($method, $path, $query = "", $payload = [], $status = 200, $proxy = null, $clientException = null)
    {
        $url = $this->client->getHttp()->getUrlFromPath($path);
        $path = $this->getFullPathFromPath($path);
        $domain = $this->getDomain();
        $authorizedQuery = $this->getAuthorizedQuery();

        $request = new Psr7\Request($method, $url);

        $requestMatcher = m::on(function ($request) use ($method, $domain, $path, $query, $authorizedQuery) {
            $uri = $request->getUri();
            return is_a($request, RequestInterface::class)
                && $request->getMethod() === strtoupper($method)
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

        if (is_null($payload)) {
            $response = null;
        } else {
            if (is_string($payload)) {
                $responseBody = $payload;
            } else {
                $responseBody = json_encode($payload);
            }

            $stream = m::mock(StreamInterface::class);
            $stream->shouldReceive('__toString')->andReturn($responseBody);

            $response = m::mock(ResponseInterface::class);
            $response->shouldReceive('getStatusCode')->andReturn($status);
            $response->shouldReceive('getBody')->andReturn($stream);
            $response->shouldReceive('getHeader')->with('content-type')->andReturn('application/json');
        }

        $client = m::mock(ClientInterface::class);
        $requestFactory = m::mock(RequestFactoryInterface::class);
        $streamFactory = m::mock(StreamFactoryInterface::class);

        $requestFactory->shouldReceive('createRequest')->with($method, $url)->andReturn($request);

        $streamFactory->allows('createStream')->with(m::on(function ($streamable) {
            return is_string($streamable);
        }));

        $streamFactory->allows('createStreamFromResource')->with(m::on(function ($streamable) {
            return is_resource($streamable);
        }));

        if ($status == 200) {
            $client->shouldReceive('send')->with($requestMatcher, $requestOptions)->andReturn($response);
        } else {
            if ($response) {
                $response->shouldReceive('getReasonPhrase')->andReturn("");
            }

            if ($clientException && $this->classImplementsInterface($clientException, ClientExceptionInterface::class)) {
                $exception = new $clientException();
            } else {
                $exception = new Exceptions\ClientException();
            }

            if (is_callable([$exception, 'setResponse'])) {
                $exception->setResponse($response);
            }

            $client->shouldReceive('send')->with($requestMatcher, $requestOptions)->andThrow($exception);
        }

        $this->client
            ->setHttpClient($client)
            ->setHttpRequestFactory($requestFactory)
            ->setHttpStreamFactory($streamFactory);
    }

    public function testGetAuthorization()
    {
        $auth = $this->client->getAuthorization();

        $this->assertInstanceOf(Authorization::class, $auth);
    }

    public function testGetAuthenticatedRequest()
    {
        $authorizedQuery = $this->getAuthorizedQuery();
        $method = 'get';
        $path = '/some-path';
        $url = $this->client->getHttp()->getUrlFromPath($path);

        $request = new Psr7\Request($method, $url);

        $client = m::mock(ClientInterface::class);
        $requestFactory = m::mock(RequestFactoryInterface::class);
        $requestFactory->shouldReceive('createRequest')->with($method, m::on(function ($url) use ($path) {
            return (substr($url, -strlen($path)) === $path);
        }))->andReturn($request);

        $newRequest = $this->client
            ->setHttpClient($client)
            ->setHttpRequestFactory($requestFactory)
            ->getHttp()
            ->getRequest($method, $path);

        $this->assertContains($authorizedQuery, $newRequest->getUri()->getQuery());
    }

    public function testGetNonAuthenticatedRequest()
    {
        $authorizedQuery = $this->getAuthorizedQuery();
        $method = 'get';
        $path = '/some-path';
        $url = $this->client->getHttp()->getUrlFromPath($path);

        $request = new Psr7\Request($method, $url);

        $client = m::mock(ClientInterface::class);
        $requestFactory = m::mock(RequestFactoryInterface::class);
        $requestFactory->shouldReceive('createRequest')->with($method, m::on(function ($url) use ($path) {
            return (substr($url, -strlen($path)) === $path);
        }))->andReturn($request);

        $newRequest = $this->client
            ->setHttpClient($client)
            ->setHttpRequestFactory($requestFactory)
            ->getHttp()
            ->getRequest($method, $path, [], false);

        $this->assertNotContains($authorizedQuery, $request->getUri()->getQuery());
    }

    /**
     * @expectedException Stevenmaguire\Services\Trello\Exceptions\Exception
     */
    public function testBadRequestThrowsExeptionWithValidJson()
    {
        $path = uniqid();
        $responseBody = ['message' => 'Errors!'];
        $this->prepareFor("GET", $path, "", $responseBody, 400, null, Exceptions\ClientResponseException::class);

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
