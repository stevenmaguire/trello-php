<?php namespace Trello;

/**
 * Trello HTTP Client
 * processes Http requests using curl
 *
 * @package    Trello
 * @subpackage Utility
 * @copyright  Steven Maguire
 *
 */
class Http
{
    /**
     * Send delete request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return boolean
     * @throws Exception
     */
    public static function delete($path, $params = [])
    {
        $path = self::buildPath($path, $params);
        self::doRequest('DELETE', $path);

        return true;
    }

    /**
     * Send get request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass
     * @throws Exception
     */
    public static function get($path, $params = [])
    {
        $path = self::buildPath($path, $params);

        return self::doRequest('GET', $path);
    }

    /**
     * Send post request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass
     * @throws Exception
     */
    public static function post($path, $params = [])
    {
        $request_body = self::buildJson($params);

        return self::doRequest('POST', $path, $request_body);
    }

    /**
     * Send put request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass
     * @throws Exception
     */
    public static function put($path, $params = [])
    {
        $request_body = self::buildJson($params);

        return self::doRequest('PUT', $path, $request_body);
    }

    /**
     * Get http client
     *
     * @return Trello\Contracts\HttpClient
     */
    public static function getClient()
    {
        return Instance::getInstance()->getHttpClient();
    }

    /**
     * Build JSON payload from array
     *
     * @param  array  Parameters
     *
     * @return string  JSON payload
     */
    private static function buildJson($params)
    {
        return empty($params) ? null : Json::buildJsonFromArray($params);
    }

    /**
     * Append key and token to url, if available
     *
     * @param  string $url Url
     *
     * @return string Modified url
     */
    private static function includeKeyInUrl($url)
    {
        $key = Configuration::key();
        if (!empty($key)) {
            $url = self::buildPath($url, ['key' => $key]);
        }

        $token = Configuration::token();
        if (!empty($token)) {
            $url = self::buildPath($url, ['token' => $token]);
        }

        return $url;
    }

    /**
     * Append query string params to url, if available
     *
     * @param  string $path Url
     *
     * @return string Modified url
     */
    private static function buildPath($path, $params = [])
    {
        $query_string = Util::buildQueryStringFromArray($params);
        if (strpos($path, '?') !== false) {
            if (substr($path, -1) != '?') {
                $path .= '&';
            }
        } else {
            $path .= '?';
        }

        return $path . $query_string;
    }

    /**
     * Build service url
     *
     * @param  string $path
     *
     * @return string Service url
     */
    private static function makeUrl($path)
    {
        $service_url = Configuration::serviceUrl();
        $path = self::includeKeyInUrl($path);

        return $service_url . (substr($path, 0, 1) !== '/' ? '/' : '') . $path;
    }

    /**
     * Build service url and perform request
     *
     * @param  string $verb Http verb to execute
     * @param  string $path Path to service endpoint
     * @param  string  $request_body Additional payload
     *
     * @return stdClass
     * @throws Exception
     */
    private static function doRequest($verb, $path, $request_body = null)
    {
        $url = self::makeUrl($path);
        $response = self::doUrlRequest($verb, $url, $request_body);

        return $response;
    }

    /**
     * Perform request
     *
     * @param  string $verb Http verb to execute
     * @param  string $url  Service url
     * @param  string  $request_body Additional payload
     *
     * @return stdClass
     * @throws Exception
     */
    private static function doUrlRequest($verb, $url, $request_body = null)
    {
        Trello::logRequest($verb, $url, $request_body);

        $client = self::getClient();
        $client->setHeaders(self::curlHeaders())
            ->sendRequest($verb, $url, $request_body);

        $response = $client->getResponseBody();

        $http_status = $client->getResponseStatus();

        try {
            return self::parseHttpResponse($http_status, $response);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Parse response body for problematic status codes
     *
     * @param  string $status
     * @param  string $body
     *
     * @return stdClass
     * @throws Exception
     */
    private static function parseHttpResponse($status, $body)
    {
        if (in_array($status, [200,201,422], true)) {
            return Json::buildObjectFromJson($body);
        } else {
            Util::throwStatusCodeException($status);
        }
    } // @codeCoverageIgnore

    /**
     * Build curl headers
     *
     * @return array Curl headers
     */
    private static function curlHeaders()
    {
        return array(
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: ' . Configuration::applicationName() . ' ' . Version::get(),
            'X-ApiVersion: ' . Configuration::API_VERSION
        );
    }
}
