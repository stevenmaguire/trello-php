<?php

namespace Stevenmaguire\Services\Trello;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Client
{
    use Traits\ApiMethodsTrait,
        Traits\AuthorizationTrait,
        Traits\BatchTrait,
        Traits\ConfigurationTrait,
        Traits\SearchTrait;

    /**
     * Default client options
     *
     * @var array
     */
    protected static $defaultOptions = [
        'domain' => 'https://trello.com',
        'key' => null,
        'proxy' => null,
        'version' => '1',
        'secret' => null,
    ];

    /**
     * Authorization broker
     *
     * @var Authorization
     */
    protected $authorization;

    /**
     * Http broker
     *
     * @var Http
     */
    protected $http;

    /**
     * Creates new trello client.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        Configuration::setMany($options, static::$defaultOptions);

        $this->http = new Http;
    }

    /**
     * Retrieves the authorization broker.
     *
     * @return Stevenmaguire\Services\Trello\Authorization
     */
    public function getAuthorization()
    {
        if (is_null($this->authorization)) {
            $this->authorization = new Authorization;
        }

        return $this->authorization;
    }

    /**
     * Retrieves currently configured http broker.
     *
     * @return Stevenmaguire\Services\Trello\Http
     */
    public function getHttp()
    {
        return $this->http;
    }

    /**
     * Updates the authorization broker.
     *
     * @param Authorization $authorization
     *
     * @return Client
     */
    public function setAuthorization(Authorization $authorization)
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * Updates the http client used by http broker.
     *
     * @param ClientInterface  $httpClient
     *
     * @return Client
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->http->setClient($httpClient);

        return $this;
    }

    /**
     * Updates the http request factory used by http broker.
     *
     * @param RequestFactoryInterface  $httpRequestFactory
     *
     * @return Client
     */
    public function setHttpRequestFactory(RequestFactoryInterface $httpRequestFactory)
    {
        $this->http->setRequestFactory($httpRequestFactory);

        return $this;
    }

    /**
     * Updates the http stream factory used by http broker.
     *
     * @param StreamFactoryInterface  $httpStreamFactory
     *
     * @return Client
     */
    public function setHttpStreamFactory(StreamFactoryInterface $httpStreamFactory)
    {
        $this->http->setStreamFactory($httpStreamFactory);

        return $this;
    }
}
