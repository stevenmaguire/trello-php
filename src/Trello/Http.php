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
class Http extends Trello
{
    /**
     * Send delete request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return boolean Operation successful
     * @throws Exception
     */
    public static function delete($path, $params = [])
    {
        $path = self::_buildPath($path, $params);
        self::_doRequest('DELETE', $path);
        return true;
    }

    /**
     * Send get request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass|null Located object
     * @throws Exception
     */
    public static function get($path, $params = [])
    {
        $path = self::_buildPath($path, $params);
        return self::_doRequest('GET', $path);
    }

    /**
     * Send post request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass Located object
     * @throws Exception
     */
    public static function post($path, $params = [])
    {
        $request_body = self::_buildJson($params);
        return self::_doRequest('POST', $path, $request_body);
    }

    /**
     * Send put request
     *
     * @param  string $path Endpoint path
     * @param  array $params Optional params
     *
     * @return stdClass Located object
     * @throws Exception
     */
    public static function put($path, $params = [])
    {
        $request_body = self::_buildJson($params);
        return self::_doRequest('PUT', $path, $request_body);
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
    private static function _buildJson($params)
    {
        $json = empty($params) ? null : Json::buildJsonFromArray($params);
        return $json;
    }

    /**
     * Append key and token to url, if available
     *
     * @param  string $url Url
     *
     * @return string $url Modified url
     */
    private static function _includeKeyInUrl($url)
    {
        $key = Configuration::key();
        if (!empty($key)) {
            $url = self::_buildPath($url, ['key' => $key]);
        }

        $token = Configuration::token();
        if (!empty($token)) {
            $url = self::_buildPath($url, ['token' => $token]);
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
    private static function _buildPath($path, $params = [])
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
    private static function _makeUrl($path)
    {
        return Configuration::serviceUrl() .
            self::_includeKeyInUrl($path);
    }

    /**
     * Build service url and perform request
     *
     * @param  string $verb Http verb to execute
     * @param  string $path Path to service endpoint
     * @param  string  $request_body Additional payload
     *
     * @return stdClass|null
     * @throws Exception
     */
    private static function _doRequest($verb, $path, $request_body = null)
    {
        $url = self::_makeUrl($path);
        $response = self::_doUrlRequest($verb, $url, $request_body);
        return $response;
    }

    /**
     * Perform request
     *
     * @param  string $verb Http verb to execute
     * @param  string $url  Service url
     * @param  string  $request_body Additional payload
     *
     * @return stdClass|null
     * @throws Exception
     */
    private static function _doUrlRequest($verb, $url, $request_body = null)
    {
        static::logRequest($verb, $url, $request_body);

        $client = self::getClient();
        $client->setHeaders(self::_curlHeaders())
            ->sendRequest($verb, $url, $request_body);

        $response = $client->getResponseBody();

        $http_status = $client->getResponseStatus();

        return self::parseHttpResponse($http_status, $response);
    }

    /**
     * Parse response body for problematic status codes
     *
     * @param  string $status
     * @param  string $body
     *
     * @return stdClass|null
     * @throws Exception
     */
    private static function parseHttpResponse($status, $body)
    {
        if($status === 200 || $status === 201 || $status === 422) {
            return Json::buildObjectFromJson($body);
        } else {
            Util::throwStatusCodeException($status);
        }
    } // @codeCoverageIgnore

    /**
     * Build curl headers
     *
     * @return string[] Curl headers
     */
    private static function _curlHeaders()
    {
        return [
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: ' . Configuration::applicationName() . ' ' . Version::get(),
            'X-ApiVersion: ' . Configuration::API_VERSION
        ];
    }
}
