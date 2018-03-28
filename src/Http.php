<?php namespace Stevenmaguire\Services\Trello;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

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
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * Creates a new http broker.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient;
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
     * @return Request
     */
    protected function createRequest($verb, $path, $parameters = [])
    {
        if (isset($parameters['file'])) {
            $this->queueResourceAs(
                'file',
                Psr7\stream_for($parameters['file'])
            );
            unset($parameters['file']);
        }

        $request = new Request(
            $verb,
            $this->getUrlFromPath($path),
            $this->getHeaders()
        );

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
        return [];
    }

    /**
     * Prepares an array of important exception parts based on composition of a
     * given exception.
     *
     * @param  RequestException  $requestException
     *
     * @return array
     */
    private function getRequestExceptionParts(RequestException $requestException)
    {
        $response = $requestException->getResponse();
        $parts = [];
        $parts['reason'] = $response ? $response->getReasonPhrase() : $requestException->getMessage();
        $parts['code'] = $response ? $response->getStatusCode() : $requestException->getCode();
        $parts['body'] = $response ? $response->getBody() : null;

        return $parts;
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
    protected function getUrlFromPath($path = '/')
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
            ->withBody(Psr7\stream_for(json_encode($parameters)))
            ->withHeader('content-type', 'application/json');

        return $this->sendRequest($request);
    }

    /**
     * Adds a given resource to multipart stream collection, to be processed by next request.
     *
     * @param  string                                           $name
     * @param  resource|string|Psr\Http\Message\StreamInterface $resource
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
            $response = $this->httpClient->send(
                $request,
                $this->getRequestOptions()
            );

            $this->multipartResources = [];

            return json_decode($response->getBody());
        } catch (RequestException $e) {
            $this->throwRequestException($e);
        }
    } // @codeCoverageIgnore

    /**
     * Updates the http client.
     *
     * @param HttpClientInterface  $httpClient
     *
     * @return Http
     */
    public function setClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Creates local exception from guzzle request exception, which includes
     * response body.
     *
     * @param  RequestException  $requestException
     *
     * @return void
     * @throws Exceptions\Exception
     */
    protected function throwRequestException(RequestException $requestException)
    {
        $exceptionParts = $this->getRequestExceptionParts($requestException);

        $exception = new Exceptions\Exception(
            $exceptionParts['reason'],
            $exceptionParts['code'],
            $requestException
        );

        $body = $exceptionParts['body'];
        $json = json_decode($body);

        if (json_last_error() == JSON_ERROR_NONE) {
            throw $exception->setResponseBody($json);
        }

        throw $exception->setResponseBody($body);
    }
}
