<?php namespace Stevenmaguire\Services\Trello;

use GuzzleHttp\ClientInterface as HttpClient;

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
     * Retrieves a new authorization broker.
     *
     * @return Stevenmaguire\Services\Trello\Authorization
     */
    public function getAuthorization()
    {
        return new Authorization;
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
     * Updates the http client used by http broker.
     *
     * @param HttpClient  $httpClient
     *
     * @return Client
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->http->setClient($httpClient);

        return $this;
    }
}
