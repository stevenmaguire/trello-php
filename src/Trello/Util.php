<?php namespace Trello;

use \DateTime;

/**
 * Trello Utility methods
 *
 * @package    Trello
 * @subpackage Utility
 * @copyright  Steven Maguire
 */

class Util
{
    /**
     * Removes the  header from classname
     *
     * @access public
     * @param string $name ClassName
     *
     * @return string camelCased classname minus  header
     */
    public static function cleanClassName($name)
    {
        return str_replace('Trello\\', '', $name);
    }

    /**
     * Start session, if not already started
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE && !headers_sent()) {
            session_start();
        }
    }

    /**
     * Adds  header to classname
     *
     * @access public
     * @param string $name className
     *
     * @return string ClassName
     */
    public static function buildClassName($name)
    {
        return 'Trello\\' . ucfirst($name);
    }

    /**
     * Get properties from list of items
     *
     * @param  array  $items List of items
     * @param  string $property Property name
     *
     * @return array List of item properties
     */
    public static function getItemsProperties(array $items, $property)
    {
        $properties = [];
        foreach ($items as $item) {
            $properties[] = $item->$property;
        }

        return $properties;
    }

    /**
     * Matches
     *
     * @param string[] $pattern
     * @param string $subject
     *
     * @return boolean
     */
    public static function matches($pattern, $subject)
    {
        if (is_array($pattern)) {
            $pattern = implode($pattern, "|");
        }

        if (preg_match('/'.$pattern.'/', $subject) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Find delimiter and convert to capital
     *
     * @access public
     * @param string $string
     * @param string $delimiter (optional, defaults to '_')
     *
     * @return string modified string
     *
     * php doesn't garbage collect functions created by create_function()
     * so use a static variable to avoid adding a new function to memory
     * every time this function is called.
     */
    public static function delimiterToCamelCase($string, $delimiter = null)
    {
        static $callback = null;
        if ($callback === null) {
            $callback = create_function('$matches', 'return strtoupper($matches[1]);');
        }

        if (is_null($delimiter)) {
            $delimiter = '[\-\_]';
        } else {
            $delimiter = preg_quote($delimiter);
        }

        return preg_replace_callback('/' . $delimiter . '(\w)/', $callback, $string);
    }

    /**
     * Convert string delimiter to underscore
     *
     * @access public
     * @param string $string
     * @param string $delimiter (optional, defaults to '-')
     *
     * @return string modified string
     */
    public static function delimiterToUnderscore($string, $delimiter = '-')
    {
        return preg_replace('/'.preg_quote($delimiter).'/', '_', $string);
    }


    /**
     * Find capitals and convert to delimiter + lowercase
     *
     * @access public
     * @param string $string
     * @param string $delimiter (optional, defaults to '-')
     *
     * @return string modified string
     *
     * php doesn't garbage collect functions created by create_function()
     * so use a static variable to avoid adding a new function to memory
     * every time this function is called.
     */
    public static function camelCaseToDelimiter($string, $delimiter = '-')
    {
        static $callbacks = [];
        if (!isset($callbacks[$delimiter])) {
            $callbacks[$delimiter] = create_function('$matches', "return '$delimiter' . strtolower(\$matches[1]);");
        }

        return preg_replace_callback('/([A-Z])/', $callbacks[$delimiter], $string);
    }

    /**
     * Convert associative array to string
     *
     * @access public
     * @param array $array associative array to implode
     * @param string $separator (optional, defaults to =)
     * @param string $glue (optional, defaults to ', ')
     *
     * @return string Imploded array
     */
    public static function implodeAssociativeArray($array, $separator = '=', $glue = ', ')
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            $new_array[] = $key . $separator . $value;
        }

        return (is_array($new_array)) ? implode($glue, $new_array) : false;
    }

    /**
     * Convert attributes to string
     *
     * @access public
     * @param  array $attributes Attributes to convert
     *
     * @return string Converted string
     */
    public static function attributesToString($attributes)
    {
        $printable_attributes = [];
        foreach ($attributes as $key => $value) {
            if (is_array($value)) {
                $attribute = Util::attributesToString($value);
            } elseif ($value instanceof DateTime) {
                $attribute = $value->format(DateTime::RFC850);
            } else {
                $attribute = $value;
            }
            $printable_attributes[$key] = sprintf('%s', $attribute);
        }

        return Util::implodeAssociativeArray($printable_attributes);
    }

    /**
     * Build quesry string from array
     *
     * @access public
     * @param  array Array to convert
     *
     * @return string Query string
     */
    public static function buildQueryStringFromArray($array = [])
    {
        return http_build_query($array);
    }

    /**
     * Throws an exception based on the type of error
     *
     * @access public
     * @param string $status_code    HTTP status code to throw exception from
     * @param string $message       Optional message
     *
     * @throws Exception     multiple types depending on the error
     */
    public static function throwStatusCodeException($status_code, $message = null)
    {
        $exceptions = [
            'default' => 'Unexpected',
            400 => 'BadRequest',
            401 => 'Authentication',
            403 => 'Authorization',
            404 => 'NotFound',
            426 => 'UpgradeRequired',
            500 => 'ServerError',
            503 => 'DownForMaintenance'
        ];

        if (array_key_exists($status_code, $exceptions)) {
            $exception = $exceptions[$status_code];
        } else {
            $message = self::defaultExceptionMessage($status_code, $message);
            $exception = $exceptions['default'];
        }
        $exception = 'Trello\Exception\\'.$exception;
        throw new $exception($message);
    } // @codeCoverageIgnore

    /**
     * Builds default exception message
     *
     * @access private
     * @param string $status_code   HTTP status code to throw exception from
     * @param string $message       Optional message
     *
     * @return string Exception message
     */
    private static function defaultExceptionMessage($status_code, $message = null)
    {
        return 'Unexpected HTTP_RESPONSE #' . $status_code . ($message ? ': ' . $message : '');
    }
}
