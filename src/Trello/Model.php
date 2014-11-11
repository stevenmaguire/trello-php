<?php
/**
 * Base class for models
 *
 * @copyright  2014 Steven Maguire
 */
abstract class Trello_Model
{
    /**
     * sets instance properties from an object of values
     *
     * @access protected
     * @param array $creditCardAttribs array of creditcard data
     * @return none
     */
    protected function _initialize($response = null)
    {
        return self::_mapAs($this, $response);
    }

    /**
     *  factory method: returns an instance of Trello_Model
     *  to the requesting method, with populated properties
     *
     * @ignore
     * @return object instance of Trello_Model
     */
    public static function factory($response = null)
    {
        $instance = new static();
        $instance->_initialize($response);
        return $instance;
    }

    /**
     * sends the create request to the gateway
     *
     * @ignore
     * @param string $url
     * @param array $params
     * @return mixed
     */
    protected static function _doCreate($url, $params)
    {
        $response = Trello_Http::post($url, $params);
        return self::factory($response);
    }

    /**
     * sends the create request to the gateway
     *
     * @ignore
     * @param string $url
     * @param array $params
     * @return mixed
     */
    protected static function _doFetch($url, $params = [])
    {
        $response = Trello_Http::get($url, $params);
        return self::factory($response);
    }

    /**
     * sends the create request to the gateway
     *
     * @ignore
     * @param string $url
     * @param array $params
     * @return mixed
     */
    protected static function _doSearch($keyword = null, $params = [])
    {
        $params['query'] = $keyword;
        return Trello_Http::get('/search?'. Trello_Util::makeQueryStringFromArray($params));
    }

    /**
     * Map an object as another given object
     *
     * @param  mixed $destination Object to receive the mapping
     * @param  object sourceObject Object from which to map data
     *
     * @return object Mapped object
     */
    protected static function _mapAs($destination, $sourceObject)
    {
        if (is_string($destination)) {
            $destination = new $destination();
        }
        $sourceReflection = new ReflectionObject($sourceObject);
        $destinationReflection = new ReflectionObject($destination);
        $sourceProperties = $sourceReflection->getProperties();
        foreach ($sourceProperties as $sourceProperty) {
            $sourceProperty->setAccessible(true);
            $name = $sourceProperty->getName();
            $value = $sourceProperty->getValue($sourceObject);
            if ($destinationReflection->hasProperty($name)) {
                $propDest = $destinationReflection->getProperty($name);
                $propDest->setAccessible(true);
                $propDest->setValue($destination,$value);
            } else {
                $destination->$name = $value;
            }
        }
        return $destination;
    }
}
