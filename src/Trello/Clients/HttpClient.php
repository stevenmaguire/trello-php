<?php namespace Trello\Clients;

use Trello\Contracts\HttpClient as HttpClientContract;

class HttpClient implements HttpClientContract
{
    /**
     * [$body description]
     *
     * @var [type]
     */
    protected $body;

    /**
     * [$headers description]
     *
     * @var array
     */
    protected $headers = array();

    /**
     * [$status description]
     *
     * @var [type]
     */
    protected $status;

    /**
     * [getResponseBody description]
     *
     * @return [type] [description]
     */
    public function getResponseBody()
    {
        return $this->body;
    }

    /**
     * [getResponseStatus description]
     *
     * @return [type] [description]
     */
    public function getResponseStatus()
    {
        return $this->status;
    }

    /**
     * [sendRequest description]
     *
     * @param  [type]  [description]
     * @param  [type]  [description]
     * @param  [type]  [description]
     *
     * @return [type]  [description]
     */
    public function sendRequest($verb, $url, $request_body = null)
    {
        try {
            print_r(func_get_args());
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_TIMEOUT, 60);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);

            if(!empty($request_body)) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
            }

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $this->response = curl_exec($curl);
            $this->http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * [setHeaders description]
     *
     * @param array  [description]
     *
     * @return HttpClient
     */
    public function setHeaders($headers = array())
    {
        $this->headers = $headers;
        return $this;
    }
}
