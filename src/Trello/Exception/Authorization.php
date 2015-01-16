<?php namespace Trello\Exception;

use Trello\Exception;

/**
 * Raised when authorization fails
 * Raised when the API key being used is not authorized to perform
 * the attempted action according to the roles assigned to the user
 * who owns the API key.
 *
 * @package    Trello
 * @subpackage Exception
 * @copyright  2014 Steven Maguire
 */
class Authorization extends Exception
{

}
