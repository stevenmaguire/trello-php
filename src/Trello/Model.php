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
     * Model id
     * @property string $id
     */
    protected $id;

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
     * Get model attribute via field method
     *
     * @return string|stdClass
     */
    public function getField($field, $force = false)
    {
        $value = static::__get($field);
        if (empty($value) || $force) {
            $url = $this->getFieldUrl($field);
            try {
                $response = self::get($url);
                $this->$field = $this->parseFieldResponse($response);
                return $this->$field;
            } catch (Trello_Exception $e) {
                //
            }
        }
        return $value;
    }

    /**
     * sets instance properties from an object of values
     *
     * @access protected
     * @param mixed $response
     *
     * @return Trello_Model Initialized object
     */
    protected function initialize($response)
    {
        $this->raw = $response;
        return self::mapAs($this, $response);
    }

    /**
     * factory method: returns an instance of Trello_Model
     * to the requesting method, with populated properties
     *
     * @return Trello_Model instance of Trello_Model
     */
    protected static function factory($response = null)
    {
        $instance = new static();
        $instance->initialize($response);
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
     * Get field url
     *
     * @param  string $field
     *
     * @return string
     */
    protected function getFieldUrl($field)
    {
        return self::getBasePath($this->id).'/'.$field;
    }

    /**
     * sends the create request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return Trello_Model
     */
    protected static function doCreate($url, $params)
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
    protected static function doFetch($ids)
    {
        $urls = [];

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $urls[] = static::getBasePath($id);
        }

        $response = self::doBatch($urls);

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
    protected static function doSearch($keyword = null, $params = [])
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
    protected static function doStore($url, $params)
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
    protected static function doBatch($urls = [])
    {
        $collection = new Trello_Collection;
        $response = Trello_Http::get('/batch', ['urls' => $urls]);
        if (is_array($response)) {
            self::parseBatchResponse($response, $collection);
        }
        return $collection;
    }

    /**
     * sends the get request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass|null
     * @throws Trello_Exception
     */
    protected static function get($url, $params = [])
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
    protected static function post($url, $params = [])
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
    protected static function put($url, $params = [])
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
    protected static function delete($url, $params = [])
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
    private static function mapAs($destination, $sourceObject)
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
     * Parse response from getField
     *
     * @param  stdClass|null $response
     *
     * @return string|integer|stdClass|null
     */
    private function parseFieldResponse($response = null)
    {
        if (is_object($response) && property_exists($response, '_value')) {
            return $response->_value;
        } else {
            return $response;
        }
    }
}
