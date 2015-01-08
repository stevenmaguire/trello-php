<?php
/**
 * Base class for models
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 * @abstract
 */
abstract class Trello_Model extends Trello
{
    /**
     * sets instance properties from an object of values
     *
     * @access protected
     * @param mixed $response
     *
     * @return Trello_Model Initialized object
     */
    protected function _initialize($response)
    {
        return self::_mapAs($this, $response);
    }

    /**
     *  factory method: returns an instance of Trello_Model
     *  to the requesting method, with populated properties
     *
     * @return Trello_Model instance of Trello_Model
     */
    protected static function factory($response = null)
    {
        $instance = new static();
        $instance->_initialize($response);
        return $instance;
    }

    /**
     * sends the create request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return Trello_Model
     */
    protected static function _doCreate($url, $params)
    {
        $response = Trello_Http::post($url, $params);
        return self::factory($response);
    }

    /**
     * sends the fetch request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return Trello_Model
     */
    protected static function _doFetch($url, $params = [])
    {
        $response = Trello_Http::get($url, $params);
        return self::factory($response);
    }

    /**
     * sends the search request to the gateway
     *
     * @param string $keyword
     * @param array $params
     *
     * @return stdClass|null
     */
    protected static function _doSearch($keyword = null, $params = [])
    {
        $params['query'] = $keyword;
        return Trello_Http::get('/search', $params);
    }

    /**
     * sends the store request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return Trello_Model
     */
    protected static function _doStore($url, $params)
    {
        $response = Trello_Http::put($url, $params);
        return self::factory($response);
    }

    /**
     * Batch a list of urls
     *
     * @param  array  List of urls
     *
     * @return Trello_Collection Collection of result objects
     */
    protected static function _doBatch($urls = [])
    {
        $collection = new Trello_Collection;
        $response = Trello_Http::get('/batch', ['urls' => $urls]);
        foreach ($response as $item) {
            if ($item->{'200'}) {
                $model = self::factory($item->{'200'});
                $collection->add($model);
            }
        }
        return $collection;
    }

    /**
     * sends the get request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass
     * @throws Trello_Exception
     */
    protected static function _get($url, $params = [])
    {
        return Trello_Http::get($url, $params);
    }

    /**
     * sends the post request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass
     * @throws Trello_Exception
     */
    protected static function _post($url, $params = [])
    {
        return Trello_Http::post($url, $params);
    }

    /**
     * sends the put request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass
     * @throws Trello_Exception
     */
    protected static function _put($url, $params = [])
    {
        return Trello_Http::put($url, $params);
    }

    /**
     * sends the delete request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @throws Trello_Exception
     * @return stdClass
     */
    protected static function _delete($url, $params = [])
    {
        return Trello_Http::delete($url, $params);
    }

    /**
     * Map an object as another given object
     *
     * @param  Trello_Model $destination Object to receive the mapping
     * @param  object sourceObject Object from which to map data
     *
     * @return Trello_Model Mapped object
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
