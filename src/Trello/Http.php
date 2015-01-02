<?php
/**
 * Trello HTTP Client
 * processes Http requests using curl
 *
 * @copyright  Steven Maguire
 */
class Trello_Http
{
    public static function delete($path, $params = [])
    {
        $response = self::_doRequest('DELETE', $path, $params);
        if($response['status'] === 200) {
            return true;
        } else {
            Trello_Util::throwStatusCodeException($response['status']);
        }
    } // @codeCoverageIgnore

    public static function get($path, $params = [])
    {
        $response = self::_doRequest('GET', $path, $params);
        if($response['status'] === 200) {
            $object = Trello_Json::buildObjectFromJson($response['body']);
            return $object;
        } else {
            Trello_Util::throwStatusCodeException($response['status']);
        }
    } // @codeCoverageIgnore

    public static function post($path, $params = [])
    {
        $response = self::_doRequest('POST', $path, $params);
        $responseCode = $response['status'];
        if($responseCode === 200 || $responseCode === 201 || $responseCode === 422) {
            $object = Trello_Json::buildObjectFromJson($response['body']);
            return $object;
        } else {
            Trello_Util::throwStatusCodeException($responseCode);
        }
    } // @codeCoverageIgnore

    public static function put($path, $params = [])
    {
        $response = self::_doRequest('PUT', $path, $params);
        $responseCode = $response['status'];
        if($responseCode === 200 || $responseCode === 201 || $responseCode === 422) {
            $object = Trello_Json::buildObjectFromJson($response['body']);
            return $object;
        } else {
            Trello_Util::throwStatusCodeException($responseCode);
        }
    } // @codeCoverageIgnore

    private static function _buildJson($params)
    {
        $json = empty($params) ? null : Trello_Json::buildJsonFromArray($params);
        return $json;
    }

    private static function _includeKeyInUrl($url)
    {
        $key = Trello_Configuration::key();
        if (!empty($key)) {
            $url = self::_buildPath($url, ['key' => $key]);
        }

        $token = Trello_Configuration::token();
        if (!empty($token)) {
            $url = self::_buildPath($url, ['token' => $token]);
        }
        return $url;
    }

    private static function _buildPath($path, $params = [])
    {
        $query_string = Trello_Util::buildQueryStringFromArray($params);
        if (strpos($path, '?') !== false) {
            if (substr($path, -1) != '?') {
                $path .= '&';
            }
        } else {
            $path .= '?';
        }
        return $path . $query_string;
    }

    private static function _doRequest($verb, $path, $request_body = [])
    {
        switch (strtolower($verb)) {
            case 'patch':
            case 'post':
            case 'put':
                $request_body = self::_buildJson($request_body);
                break;
            case 'get':
            case 'delete';
                $path = self::_buildPath($path, $request_body);
                $request_body = null;
                break;
        }
        $response = self::_doUrlRequest($verb, Trello_Configuration::serviceUrl() . self::_includeKeyInUrl($path), $request_body);
        return $response;
    }

    public static function _doUrlRequest($verb, $url, $request_body = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: ' . Trello_Configuration::applicationName() . ' ' . Trello_Version::get(),
            'X-ApiVersion: ' . Trello_Configuration::API_VERSION
        ]);

        if(!empty($request_body)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return ['status' => $http_status, 'body' => $response];
    }
}
