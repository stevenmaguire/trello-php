<?php namespace Trello\Contracts;

interface HttpClient
{
    public function getResponseBody();
    public function getResponseStatus();
    public function sendRequest($verb, $url, $request_body = null);
    public function getHeaders();
    public function setHeaders($headers = array());
}
