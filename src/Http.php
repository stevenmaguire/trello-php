<?php

namespace Stevenmaguire\Services\Trello;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Http
{
    const HTTP_DELETE = 'DELETE';
    const HTTP_GET = 'GET';
    const HTTP_POST = 'POST';
    const HTTP_PUT = 'PUT';

    /**
     * Multipart resources to include in next request.
     *
     * @var array
     */
    protected $multipartResources = [];

    /**
     * Http client
     *
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * Http request factory
     *
     * @var RequestFactoryInterface
     */
    protected $httpRequestFactory;

    /**
     * Http stream factory
     *
     * @var StreamFactoryInterface
     */
    protected $httpStreamFactory;

    /**
     * Creates a new http broker.
     */
    public function __construct()
    {
        //
    }

    /**
     * Adds authentication credentials to given request.
     *
     * @param  RequestInterface  $request
     *
     * @return RequestInterface
     */
    protected function authenticateRequest(RequestInterface $request)
    {
        $uri = $request->getUri();
        parse_str($uri->getQuery(), $query);

        $query['key'] = Configuration::get('key');
        $query['token'] = Configuration::get('token');

        $uri = $uri->withQuery(http_build_query($query));

        return $request->withUri($uri);
    }

    /**
     * Creates a request.
     *
     * @param  string $verb
     * @param  string $path
     * @param  array  $parameters
     *
     * @return RequestInterface
     */
    protected function createRequest($verb, $path, $parameters = [])
    {
        if (isset($parameters['file'])) {
            $this->queueResourceAs(
                'file',
                $this->httpStreamFactory->createStreamFromResource($parameters['file'])
            );
            unset($parameters['file']);
        }

        $request = $this->httpRequestFactory->createRequest(
            $verb,
            $this->getUrlFromPath($path)
        );

        $headers = $this->getHeaders();

        array_walk($headers, function ($value, $key) use (&$request) {
            $request = $request->withHeader($key, $value);
        });

        return $request->withUri(
            $request->getUri()->withQuery(
                http_build_query($parameters)
            )
        );
    }

    /**
     * Retrieves http response for a request with the delete method.
     *
     * @param  string $path
     * @param  array  $parameters
     *
     * @return object
     */
    public function delete($path, $parameters = [])
    {
        $request = $this->getRequest(static::HTTP_DELETE, $path, $parameters);

        return $this->sendRequest($request);
    }

    /**
     * Retrieves http response for a request with the get method.
     *
     * @param  string $path
     * @param  array  $parameters
     *
     * @return object
     */
    public function get($path, $parameters = [])
    {
        $request = $this->getRequest(static::HTTP_GET, $path, $parameters);

        return $this->sendRequest($request);
    }

    /**
     * Creates and returns a request.
     *
     * @param  string $method
     * @param  string $path
     * @param  array  $parameters
     *
     * @return RequestInterface
     */
    public function getRequest($method, $path, $parameters = [], $authenticated = true)
    {
        $request = $this->createRequest($method, $path, $parameters);

        if ($authenticated) {
            $request = $this->authenticateRequest($request);
        }

        return $request;
    }

    /**
     * Retrieves default headers.
     *
     * @return array
     */
    protected function getHeaders()
    {
        return ['accept' => 'application/json'];
    }

    /**
     * Creates an array of request options based on the current status of the
     * http client.
     *
     * @return array
     */
    protected function getRequestOptions()
    {
        $options = [
            'proxy' => Configuration::get('proxy')
        ];

        if (!empty(array_filter($this->multipartResources))) {
            $options['multipart'] = $this->multipartResources;
        }

        return $options;
    }

    /**
     * Creates fully qualified domain from given path.
     *
     * @param  string  $path
     *
     * @return string
     */
    public function getUrlFromPath($path = '/')
    {
        return Configuration::get('domain').'/'.Configuration::get('version').'/'.ltrim($path, '/');
    }

    /**
     * Retrieves http response for a request with the post method.
     *
     * @param  string $path
     * @param  array  $parameters
     *
     * @return object
     */
    public function post($path, $parameters)
    {
        $request = $this->getRequest(static::HTTP_POST, $path, $parameters);

        return $this->sendRequest($request);
    }

    /**
     * Retrieves http response for a request with the put method.
     *
     * @param  string $path
     * @param  array  $parameters
     *
     * @return object
     */
    public function put($path, $parameters)
    {
        $request = $this->getRequest(static::HTTP_PUT, $path, $parameters);

        return $this->sendRequest($request);
    }

    /**
     * Retrieves http response for a request with the put method,
     * ensuring parameters are passed as body.
     *
     * @param  string $path
     * @param  array  $parameters
     *
     * @return object
     */
    public function putAsBody($path, $parameters)
    {
        $request = $this->getRequest(static::HTTP_PUT, $path)
            ->withBody($this->httpStreamFactory->createStream(json_encode($parameters)))
            ->withHeader('content-type', 'application/json');

        return $this->sendRequest($request);
    }

    /**
     * Adds a given resource to multipart stream collection, to be processed by next request.
     *
     * @param  string                           $name
     * @param  \Psr\Http\Message\StreamInterface $resource
     *
     * @return void
     */
    protected function queueResourceAs($name, $resource)
    {
        array_push($this->multipartResources, [
            'name' => $name,
            'contents' => $resource,
        ]);
    }

    /**
     * Retrieves http response for a given request.
     *
     * @param  RequestInterface $request
     *
     * @return object
     * @throws Exceptions\Exception
     */
    protected function sendRequest(RequestInterface $request)
    {
        try {
            $options = $this->getRequestOptions();
            $response = $this->httpClient->sendRequest($request/*, $options*/);

            $this->multipartResources = [];

            return json_decode($response->getBody());
        } catch (ClientExceptionInterface $e) {
            throw Exceptions\Exception::fromClientException($e);
        }
    } // @codeCoverageIgnore

    /**
     * Updates the http client.
     *
     * @param ClientInterface  $httpClient
     *
     * @return Http
     */
    public function setClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Updates the http request factory.
     *
     * @param RequestFactoryInterface  $httpRequestFactory
     *
     * @return Http
     */
    public function setRequestFactory(RequestFactoryInterface $httpRequestFactory)
    {
        $this->httpRequestFactory = $httpRequestFactory;

        return $this;
    }

    /**
     * Updates the http stream factory.
     *
     * @param StreamFactoryInterface  $httpStreamFactory
     *
     * @return Http
     */
    public function setStreamFactory(StreamFactoryInterface $httpStreamFactory)
    {
        $this->httpStreamFactory = $httpStreamFactory;

        return $this;
    }
}
