<?php

namespace Stevenmaguire\Services\Trello\Exceptions;

use Exception as BaseException;
use Psr\Http\Client\ClientExceptionInterface;

class Exception extends BaseException
{
    /**
     * Response body
     *
     * @var object
     */
    protected $responseBody;

    /**
     * Creates local exception from http client exception, which attempts to
     * include response body.
     *
     * @param  ClientExceptionInterface  $clientException
     *
     * @return Exceptions\Exception
     */
    public static function fromClientException(ClientExceptionInterface $clientException)
    {
        try {
            if (is_callable([$clientException, 'getResponse'])) {
                $response = $clientException->getResponse();
            } else {
                throw new Exception('ClientException does not implement getResponse');
            }
        } catch (Exception $e) {
            $response = null;
        }

        $reason = $response ? $response->getReasonPhrase() : $clientException->getMessage();
        $code = $response ? $response->getStatusCode() : $clientException->getCode();
        $body = $response ? $response->getBody() : null;

        $exception = new static($reason, $code, $clientException);

        $json = json_decode($body);

        if (json_last_error() == JSON_ERROR_NONE) {
            return $exception->setResponseBody($json);
        }

        return $exception->setResponseBody($body);
    }

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
