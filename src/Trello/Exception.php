<?php namespace Trello;

/**
 * super class for all Trello exceptions
 *
 * @package    Trello
 * @subpackage Exception
 * @copyright  2014 Steven Maguire
 */
class Exception extends \Exception
{
    /**
     * Create new instance
     *
     * @param string   $message
     * @param integer  $code
     * @param object   $previous
     */
    public function __construct($message = "", $code = 0, $previous = null)
    {
        if (!empty($message)) {
            Configuration::logMessage($message);
        }
    }
}
