<?php namespace Stevenmaguire\Services\Trello\Exceptions;

use Exception as BaseException;

class Exception extends BaseException
{
    /**
     * Response body
     *
     * @var [type]
     */
    protected $responseBody;

    public function setResponseBody($responseBody)
    {
        $this->responseBody = $responseBody;

        return $this;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
