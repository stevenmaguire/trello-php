<?php
/**
 * super class for all Trello exceptions
 *
 * @package    Trello
 * @subpackage Exception
 * @copyright  2014 Steven Maguire
 */
class Trello_Exception extends Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        if (!empty($message)) {
            Trello_Configuration::logMessage($message);
        }
    }
}
