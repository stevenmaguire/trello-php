<?php namespace Trello\Clients;

use Trello\Instance;
use Trello\Contracts\HttpClient as HttpClientContract;

class HttpClient implements HttpClientContract
{
    /**
     * Response body
     *
     * @var string
     */
    protected $body;

    /**
     * Request headers
     *
     * @var array
     */
    protected $headers = array();

    /**
     * Response status
     *
     * @var integer
     */
    protected $status;

    /**
     * Get response body
     *
     * @return string
     */
    public function getResponseBody()
    {
        return $this->body;
    }

    /**
     * Get response status
     *
     * @return integer
     */
    public function getResponseStatus()
    {
        return $this->status;
    }

    /**
     * Send request
     *
     * @param  string $verb
     * @param  string $url
     * @param  string $request_body
     *
     * @return HttpClient
     *
     * @codeCoverageIgnore
     */
    public function sendRequest($verb, $url, $request_body = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);

        if (!empty($request_body)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->body = curl_exec($curl);
        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Temporary
        Instance::getInstance()->writeLogLine($this->body);

        return $this;
    }

    /**
     * Get request headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set request headers
     *
     * @param array $headers
     *
     * @return HttpClient
     */
    public function setHeaders($headers = array())
    {
        $this->headers = $headers;
        return $this;
    }
}
