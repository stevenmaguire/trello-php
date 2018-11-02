<?php

namespace Stevenmaguire\Services\Trello\Tests\Exceptions;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;

class ClientException extends Exception implements ClientExceptionInterface
{

}
