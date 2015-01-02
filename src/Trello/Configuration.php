<?php
/**
 * Configuration registry
 *
 * @package    Trello
 * @subpackage Utility
 * @copyright  Steven Maguire
 */

class Trello_Configuration extends Trello
{
    /**
     * Trello API version to use
     * @access public
     */
     const API_VERSION =  1;

     const LIBRARY_NAME = 'Trello PHP Library';

    /**
     * @var array array of config properties
     * @access protected
     * @static
     */
    private static $_cache = [
                    'environment'   => '',
                    'key'    => '',
                    'secret'     => '',
                    'token'    => '',
                    'applicationName' => self::LIBRARY_NAME
                   ];
    /**
     *
     * @access protected
     * @static
     * @var array valid environments, used for validation
     */
    private static $_validEnvironments = [
                    'development',
                    'sandbox',
                    'production',
                    'qa'
                    ];

    /**
     * resets configuration to default
     * @access public
     * @static
     */
    public static function reset()
    {
        self::$_cache = [
            'environment' => '',
            'key'  => '',
            'secret' => '',
            'token' => '',
            'applicationName' => self::LIBRARY_NAME
        ];
    }

    /**
     * performs sanity checks when config settings are being set
     *
     * @access private
     * @static
     * @param string $key name of config setting
     * @param string $value value to set
     *
     * @return boolean
     * @throws InvalidArgumentException
     * @throws Trello_Exception_Configuration
     */
    private static function validate($key = null, $value = null)
    {
        if ($key === 'environment' &&
            !in_array($value, self::$_validEnvironments)) {
                throw new Trello_Exception_Configuration('"' .
                    $value . '" is not a valid environment.');
        }

        return true;
    }

    /**
     * Set configuration value
     *
     * @param string $key Configuration key
     * @param string $value Configuration value
     */
    private static function set($key, $value)
    {
        self::validate($key, $value);
        self::$_cache[$key] = $value;
    }

    /**
     * Get configuration value
     *
     * @param  string $key Configuration key
     *
     * @return string|null
     * @throws Trello_Exception
     */
    private static function get($key)
    {
        return self::$_cache[$key];
    }

    /**
     * Set or set attribute
     *
     * @param string $name Name of property
     * @param string|null $value Optional value to set
     */
    private static function setOrGet($name, $value = null)
    {
        if (!empty($value) && is_array($value)) {
            $value = $value[0];
        }
        if (!empty($value)) {
            self::set($name, $value);
        } else {
            return self::get($name);
        }
        return true;
    }

    /**
     * sets or returns the property after validation
     *
     * @access public
     * @static
     * @param string $value pass a string to set, empty to get
     *
     * @return string returns true on set
     */
    public static function environment($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }

    /**
     * sets or returns the property after validation
     *
     * @access public
     * @static
     * @param string $value pass a string to set, empty to get
     *
     * @return string returns true on set
     */
    public static function key($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }

    /**
     * sets or returns the property after validation
     *
     * @access public
     * @static
     * @param string $value pass a string to set, empty to get
     *
     * @return string returns true on set
     */
    public static function secret($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }

    /**
     * sets or returns the property after validation
     *
     * @access public
     * @static
     * @param string $value pass a string to set, empty to get
     *
     * @return string returns true on set
     */
    public static function token($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }

    /**
     * sets or returns the property after validation
     *
     * @access public
     * @static
     * @param string $value pass a string to set, empty to get
     *
     * @return string returns true on set
     */
    public static function applicationName($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }

    /**
     * returns the full service URL based on config values
     *
     * @access public
     * @static
     * @param none
     * @return string service URL
     */
    public static function serviceUrl()
    {
        return self::baseUrl() . self::versionPath();
    }

    /**
     * returns the base Trello gateway URL based on config values
     *
     * @access public
     * @static
     * @param none
     * @return string Trello gateway URL
     */
    public static function baseUrl()
    {
        return self::protocol() . '://' . self::serverName();
    }

    /**
     * sets the version path based on version number
     *
     * @access protected
     * @static
     * @param none
     * @return string version path uri
     */
    public static function versionPath()
    {
        return '/'.self::API_VERSION;
    }

    /**
     * returns http protocol depending on environment
     *
     * @access public
     * @static
     * @param none
     *
     * @return string http || https
     */
    public static function protocol()
    {
        return 'https';
    }

    /**
     * returns gateway server name depending on environment
     *
     * @access public
     * @static
     * @param none
     *
     * @return string server domain name
     */
    public static function serverName()
    {
        return 'api.trello.com';
    }

    /**
     * log message to default logger
     *
     * @param string $message
     * @codeCoverageIgnore
     */
    public static function logMessage($message)
    {
        if (self::environment() != 'qa') {
            error_log('[Trello] ' . $message);
        }
    }
}
