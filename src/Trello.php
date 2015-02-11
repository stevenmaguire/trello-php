<?php namespace Trello;

/**
 * Trello PHP Library
 *
 * Trello base class and initialization
 * Provides methods to child classes. This class cannot be instantiated.
 *
 * @package    Trello
 * @copyright  Steven Maguire
 */
abstract class Trello
{
    /**
     * Log request
     *
     * @param  string $verb
     * @param  string $path
     * @param  string $body
     *
     * @return Trello_Instance
     */
    public static function logRequest($verb, $path, $body = null)
    {
        return Instance::getInstance()->logRequest($verb, $path, $body);
    }

    /**
     * Get requests collection
     *
     * @return Trello_Collection
     */
    public static function getRequests()
    {
        return Instance::getInstance()->getRequests();
    }
}
