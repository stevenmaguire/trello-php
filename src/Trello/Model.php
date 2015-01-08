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
     * Raw payload from init
     *
     * @var stdClass
     */
    protected $raw;

    /**
     * Default base path
     *
     * @var string|null
     */
    protected static $base_path = null;

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
        $this->raw = $response;
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
     * Get model base url
     *
     * @return string Base url
     */
    protected static function getBasePath($id = null)
    {
        return '/'.ltrim(static::$base_path, '/').($id ? '/'.$id : '');
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
     * @param string|array $ids
     *
     * @return Trello_Model|Trello_Collection
     */
    protected static function _doFetch($ids)
    {
        $urls = [];

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $urls[] = static::getBasePath($id);
        }

        $response = self::_doBatch($urls);

        if (count($response) == 1) {
            return $response->first();
        }

        return $response;
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
        if (is_array($response)) {
            self::parseBatchResponse($response, $collection);
        }
        return $collection;
    }

    /**
     * Parse a batch response into a given collection
     *
     * @param  array $response Batch response
     * @param  Trello_Collection $collection  Collection
     */
    private static function parseBatchResponse($response, &$collection)
    {
        foreach ($response as $item) {
            if (is_object($item) && property_exists($item, '200')) {
                $model = self::factory($item->{'200'});
                $collection->add($model);
            }
        }
    }

    /**
     * sends the get request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return object
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
     * @return boolean
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
