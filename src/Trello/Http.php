<?php
/**
 * Trello HTTP Client
 * processes Http requests using curl
 *
 * @copyright  Steven Maguire
 */
class Trello_Http
{
    public static function delete($path)
    {
        $response = self::_doRequest('DELETE', $path);
        if($response['status'] === 200) {
            return true;
        } else {
            Trello_Util::throwStatusCodeException($response['status']);
        }
    }

    public static function get($path)
    {
        $response = self::_doRequest('GET', $path);
        if($response['status'] === 200) {
            return Trello_Json::buildObjectFromJson($response['body']);
        } else {
            Trello_Util::throwStatusCodeException($response['status']);
        }
    }

    public static function post($path, $params = null)
    {
        $response = self::_doRequest('POST', $path, self::_buildJson($params));
        $responseCode = $response['status'];
        if($responseCode === 200 || $responseCode === 201 || $responseCode === 422) {
            return Trello_Json::buildObjectFromJson($response['body']);
        } else {
            Trello_Util::throwStatusCodeException($responseCode);
        }
    }

    public static function put($path, $params = null)
    {
        $response = self::_doRequest('PUT', $path, self::_buildJson($params));
        $responseCode = $response['status'];
        if($responseCode === 200 || $responseCode === 201 || $responseCode === 422) {
            return Trello_Json::buildObjectFromJson($response['body']);
        } else {
            Trello_Util::throwStatusCodeException($responseCode);
        }
    }

    private static function _buildJson($params)
    {
        return empty($params) ? null : Trello_Json::buildJsonFromArray($params);
    }

    private static function _includeKeyInUrl($url)
    {
        if (!empty(Trello_Configuration::key())) {
            if (strpos($url, '?') !== false) {
                if (substr($url, -1) != '?') {
                    $url .= '&';
                }
            } else {
                $url .= '?';
            }
            $url .= 'key='.Trello_Configuration::key();
        }
        if (!empty(Trello_Configuration::token())) {
            if (strpos($url, '?') !== false) {
                if (substr($url, -1) != '?') {
                    $url .= '&';
                }
            } else {
                $url .= '?';
            }
            $url .= 'token='.Trello_Configuration::token();
        }
        return $url;
    }

    private static function _doRequest($httpVerb, $path, $requestBody = null)
    {
        return self::_doUrlRequest($httpVerb, Trello_Configuration::serviceUrl() . self::_includeKeyInUrl($path) , $requestBody);
    }

    public static function _doUrlRequest($httpVerb, $url, $requestBody = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $httpVerb);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: ' . Trello_Configuration::applicationName() . ' ' . Trello_Version::get(),
            'X-ApiVersion: ' . Trello_Configuration::API_VERSION
        ]);

        if(!empty($requestBody)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return ['status' => $httpStatus, 'body' => $response];
    }
}
