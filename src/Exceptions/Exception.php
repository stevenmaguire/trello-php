<?php namespace Stevenmaguire\Services\Trello\Exceptions;

use Exception as BaseException;

class Exception extends BaseException
{
    /**
     * Response body
     *
     * @var object
     */
    protected $responseBody;

    /**
     * Retrieves the response body property of exception.
     *
     * @return object
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Updates the response body property of exception.
     *
     * @param object
     *
     * @return Exception
     */
    public function setResponseBody($responseBody)
    {
        $this->responseBody = $responseBody;

        return $this;
    }
}
