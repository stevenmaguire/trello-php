<?php
/**
 * Trello Library Version
 * stores version information about the Braintree library
 *
 * @copyright  Steven Maguire
 */
final class Trello_Version
{
    /**
     * class constants
     */
    const MAJOR = 0;
    const MINOR = 0;
    const TINY = 0;

    /**
     * @codeCoverageIgnore
     * @access protected
     */
    protected function  __construct()
    {
    }

    /**
     * Get current configured version
     *
     * @access public
     *
     * @return string the current library version
     */
    public static function get()
    {
        return self::MAJOR.'.'.self::MINOR.'.'.self::TINY;
    }
}
