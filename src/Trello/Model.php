<?php
/**
 * Base class for models
 *
 * @copyright  2014 Steven Maguire
 */
abstract class Trello_Model
{
    /**
     * Get model attribute
     *
     * @param  string  Attribute name
     *
     * @return mixed  Attribute value
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * sets instance properties from an object of values
     *
     * @access protected
     * @param mixed $response
     *
     * @return object Initialized object
     */
    protected function _initialize($response)
    {
        return self::_mapAs($this, $response);
    }

    /**
     *  factory method: returns an instance of Trello_Model
     *  to the requesting method, with populated properties
     *
     * @codeCoverageIgnore
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
     * @codeCoverageIgnore
     * @param string $url
     * @param array $params
     *
     * @return mixed
     */
    protected static function _doCreate($url, $params)
    {
        $response = Trello_Http::post($url, $params);
        return self::factory($response);
    }

    /**
     * sends the delete request to the gateway
     *
     * @codeCoverageIgnore
     * @param string $url
     * @param array $params
     *
     * @return mixed
     */
    protected static function _doDelete($url, $params = [])
    {
        $response = Trello_Http::delete($url, $params);
        return self::factory($response);
    }

    /**
     * sends the fetch request to the gateway
     *
     * @codeCoverageIgnore
     * @param string $url
     * @param array $params
     *
     * @return mixed
     */
    protected static function _doFetch($url, $params = [])
    {
        $response = Trello_Http::get($url, $params);
        return self::factory($response);
    }

    /**
     * sends the search request to the gateway
     *
     * @codeCoverageIgnore
     * @param string $url
     * @param array $params
     *
     * @return mixed
     */
    protected static function _doSearch($keyword = null, $params = [])
    {
        $params['query'] = $keyword;
        return Trello_Http::get('/search', $params);
    }

    /**
     * sends the store request to the gateway
     *
     * @codeCoverageIgnore
     * @param string $url
     * @param array $params
     *
     * @return mixed
     */
    protected static function _doStore($url, $params)
    {
        $response = Trello_Http::put($url, $params);
        return self::factory($response);
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
                $propDest->setValue($destination, $value);
            } else {
                $destination->$name = $value;
            }
        }
        return $destination;
    }
}
