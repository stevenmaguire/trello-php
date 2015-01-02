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
     * @codeCoverageIgnore
     * @access protected
     * @param string $key name of config setting
     * @param string $value value to set
     * @throws InvalidArgumentException
     * @throws Trello_Exception_Configuration
     * @static
     * @return boolean
     */
    private static function validate($key=null, $value=null)
    {
        if (empty($key) && empty($value)) {
            // @codeCoverageIgnoreStart
            throw new InvalidArgumentException('nothing to validate');
            // @codeCoverageIgnoreEnd
        }

        if ($key === 'environment' &&
           !in_array($value, self::$_validEnvironments) ) {
            // @codeCoverageIgnoreStart
            throw new Trello_Exception_Configuration('"' .
                                    $value . '" is not a valid environment.');
            // @codeCoverageIgnoreEnd
        }

        if (!isset(self::$_cache[$key])) {
             // @codeCoverageIgnoreStart
            throw new Trello_Exception_Configuration($key .
                                    ' is not a valid configuration setting.');
             // @codeCoverageIgnoreEnd
        }

        if (empty($value)) {
            // @codeCoverageIgnoreStart
            throw new InvalidArgumentException($key . ' cannot be empty.');
            // @codeCoverageIgnoreEnd
        }

        return true;
    }

    private static function set($key, $value)
    {
        // this method will raise an exception on invalid data
        self::validate($key, $value);
        // set the value in the cache
        self::$_cache[$key] = $value;

    }

    private static function get($key)
    {
        // throw an exception if the value hasn't been set
        if (isset(self::$_cache[$key]) &&
           (empty(self::$_cache[$key]))) {
            // @codeCoverageIgnoreStart
            throw new Trello_Exception_Configuration(
                      $key.' needs to be set.'
                      );
            // @codeCoverageIgnoreEnd
        }

        if (array_key_exists($key, self::$_cache)) {
            return self::$_cache[$key];
        }

        // return null by default to prevent __set from overloading
        return null; // @codeCoverageIgnore
    }

    /**
     * Set or set attribute
     *
     * @param string $name Name of property
     * @param mixed $value Optional value to set
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
     * @return mixed returns true on set
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
     * @return mixed returns true on set
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
     * @return mixed returns true on set
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
     * @return mixed returns true on set
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
     * @return mixed returns true on set
     */
    public static function applicationName($value = null)
    {
        return self::setOrGet(__FUNCTION__, $value);
    }
    /**#@-*/

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
        return self::baseUrl() .
               self::versionPath();
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
        return self::protocol() . '://' .
                  self::serverName();
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
        switch(self::environment()) {
         case 'production':
         case 'qa':
         case 'sandbox':
         case 'development':
         default:
             $serverName = 'api.trello.com';
             break;
        }

        return $serverName;
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
