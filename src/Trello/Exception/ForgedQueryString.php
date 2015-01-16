<?php namespace Trello\Exception;

use Trello\Exception;

/**
 * Raised when a suspected forged query string is present
 * Raised from methods that confirm transparent request requests
 * when the given query string cannot be verified. This may indicate
 * an attempted hack on the merchant's transparent redirect
 * confirmation URL.
 *
 * @package    Trello
 * @subpackage Exception
 * @copyright  2014 Steven Maguire
 */
class ForgedQueryString extends Exception
{

}
