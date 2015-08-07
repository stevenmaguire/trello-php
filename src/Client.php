<?php namespace Stevenmaguire\Services\Trello;

use GuzzleHttp\ClientInterface as HttpClient;

class Client
{
    use Traits\ApiMethodsTrait,
        Traits\AuthorizationTrait,
        Traits\BatchTrait,
        Traits\SearchTrait;

    /**
     * Default client options
     *
     * @var array
     */
    protected static $defaultOptions = [
        'domain' => 'https://trello.com',
        'key' => null,
        'version' => '1',
        'token' => null,
    ];

    /**
     * Config
     *
     * @var array
     */
    protected $config;

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
        $this->config = static::parseDefaultOptions($options);

        $this->http = new Http($this->config);
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
     * Creates a properly formatted query string from given parameters.
     *
     * @param  array  $parameters
     *
     * @return string
     */
    protected function makeQuery($parameters = [])
    {
        return !empty($parameters) ? '?' . http_build_query($parameters) : '';
    }

    /**
     * Parses give options against default options.
     *
     * @param  array   $options
     *
     * @return array
     */
    public static function parseDefaultOptions($options = [])
    {
        array_walk(static::$defaultOptions, function ($value, $key) use (&$options) {
            if (!isset($options[$key])) {
                $options[$key] = $value;
            }
        });

        return $options;
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
