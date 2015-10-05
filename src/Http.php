<?php namespace Stevenmaguire\Services\Trello;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class Http
{
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
        $request = $this->getRequest('DELETE', $path, $parameters);

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
        $request = $this->getRequest('GET', $path, $parameters);

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
        $request = $this->getRequest('POST', $path, $parameters);

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
        $request = $this->getRequest('PUT', $path, $parameters);

        return $this->sendRequest($request);
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
            $response = $this->httpClient->send($request);

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
        $exception = new Exceptions\Exception(
            $requestException->getResponse()->getReasonPhrase(),
            $requestException->getResponse()->getStatusCode(),
            $requestException
        );

        $body = (string) $requestException->getResponse()->getBody();
        $json = json_decode($body);

        if (json_last_error() == JSON_ERROR_NONE) {
            throw $exception->setResponseBody($json);
        }

        throw $exception->setResponseBody($body);
    }
}
