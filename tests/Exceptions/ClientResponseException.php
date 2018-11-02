<?php

namespace Stevenmaguire\Services\Trello\Tests\Exceptions;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class ClientResponseException extends Exception implements ClientExceptionInterface
{
    /**
     * Http response
     * @var ResponseInterface
     */
    protected $response;

    /**
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     *
     * @param ResponseInterface $response
     *
     * @return ClientResponseException
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;

        return $this;
    }
}
