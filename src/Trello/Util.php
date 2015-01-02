<?php
/**
 * Trello Utility methods
 * PHP version 5
 *
 * @copyright  2014 Steven Maguire
 */

class Trello_Util
{
    /**
     * Removes the Trello_ header from classname
     *
     * @access public
     * @param string $name Trello_ClassName
     *
     * @return string camelCased classname minus Trello_ header
     */
    public static function cleanClassName($name)
    {
        return lcfirst(str_replace('Trello_', '', $name));
    }

    /**
     * Adds Trello_ header to classname
     *
     * @access public
     * @param string $name className
     *
     * @return string Trello_ClassName
     */
    public static function buildClassName($name)
    {
        return 'Trello_' . ucfirst($name);
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
        foreach ($array AS $key => $value) {
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
    public static function attributesToString($attributes) {
        $printable_attributes = [];
        foreach ($attributes AS $key => $value) {
            if (is_array($value)) {
                $attribute = Trello_Util::attributesToString($value);
            } elseif ($value instanceof DateTime) {
                $attribute = $value->format(DateTime::RFC850);
            } else {
                $attribute = $value;
            }
            $printable_attributes[$key] = sprintf('%s', $attribute);
        }
        return Trello_Util::implodeAssociativeArray($printable_attributes);
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
     * @param string $statusCode    HTTP status code to throw exception from
     * @param string $message       Optional message
     *
     * @throws Trello_Exception     multiple types depending on the error
     */
    public static function throwStatusCodeException($statusCode, $message = null)
    {
        switch($statusCode) {
            case 401:
                throw new Trello_Exception_Authentication($message);
            case 403:
                throw new Trello_Exception_Authorization($message);
            case 404:
                throw new Trello_Exception_NotFound($message);
            case 426:
                throw new Trello_Exception_UpgradeRequired($message);
            case 500:
                throw new Trello_Exception_ServerError($message);
            case 503:
                throw new Trello_Exception_DownForMaintenance($message);
            default:
                throw new Trello_Exception_Unexpected('Unexpected HTTP_RESPONSE #'.$statusCode);
        }
    }
}
