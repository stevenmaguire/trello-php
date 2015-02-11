<?php namespace Trello;

use \ReflectionObject;

/**
 * Base class for models
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 * @abstract
 */
abstract class Model extends Trello
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
     * @var string
     */
    protected static $base_path;

    /**
     * Search model
     *
     * @var string
     */
    protected static $search_model;

    /**
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = [];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = [];

    /**
     * Primary id for model
     *
     * @var string
     */
    protected static $primary_key = 'id';

    /**
     * create a new model
     *
     * @param  array $attributes Model attributes to set
     *
     * @return Model  Newly minted trello model
     * @throws Exception\ValidationsFailed
     */
    public static function create($attributes = [])
    {
        self::validateAttributes(static::$default_attributes, $attributes);

        return static::doCreate(static::getBasePath(), $attributes);
    }

    /**
     * Search for models by keyword and filters
     *
     * @param  string $keyword Keyword to search
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of models with name, id, organization
     * @throws Exception_DownForMaintenance If search request breaks!
     */
    public static function search($keyword = null, $filters = [])
    {
        $model = static::$search_model;
        $filters['modelTypes'] = $model;
        $results = static::doSearch($keyword, $filters);

        return new Collection($results->$model);
    }

    /**
     * fetch a model
     *
     * @param  string $id Model id to fetch
     *
     * @return string|object
     * @throws Exception_ValidationsFailed
     */
    public static function fetch($id = null)
    {
        if (empty($id)) {
            throw new \Trello\Exception\ValidationsFailed(
                'attempted to fetch '.lcfirst(self::getClassName()).' without id; it\'s gotta have an id'
            );
        }

        $result = self::doFetch($id);

        return $result->first();
    }

    /**
     * fetch many models
     *
     * @param  array $ids Model ids to fetch
     *
     * @return Collection
     * @throws Exception_ValidationsFailed
     */
    public static function fetchMany($ids = [])
    {
        if (empty($ids)) {
            throw new \Trello\Exception\ValidationsFailed(
                'attempted to fetch '.lcfirst(self::getClassName()).' without id; it\'s gotta have an id'
            );
        }

        return self::doFetch($ids);
    }

    /**
     * Get model ids from list of models
     *
     * @param  array $models List of models
     *
     * @return array List of model ids
     */
    public static function getIds(array $models)
    {
        return Util::getItemsProperties($models, static::$primary_key);
    }

    /**
     * Validate model attributes
     *
     * @param  array $attributes
     *
     * @return void
     * @throws Trello\Exception\ValidationsFailed
     */
    private static function validateAttributes($rules = [], $attributes = [])
    {
        $attributes = array_merge($rules, $attributes);

        foreach (static::$required_attributes as $attribute) {
            if (empty($attributes[$attribute])) {
                throw new \Trello\Exception\ValidationsFailed(
                    'attempted to create '.lcfirst(self::getClassName())
                    .' without '.$attribute.'; it\'s gotta have a '.$attribute
                );
            }
        }
    }

    /**
     * Get attribute
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
     * Overload method to attempt catch attribute methods
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return Model Updated board object
     */
    public function __call($method, $parameters)
    {
        if ($this->isUpdateMethod($method)) {
            $attribute = $this->getAttributeFromUpdateMethod($method);
            array_unshift($parameters, $attribute);
            return call_user_func_array([$this, 'updateAttribute'], $parameters);
        }
    }

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
            } catch (Exception $e) {
                //
            }
        }

        return $value;
    }

    /**
     * Update model attribute
     *
     * @param  string  $key
     * @param  string  $value
     *
     * @return Model Updated board object
     */
    public function updateAttribute($key = null, $value = null)
    {
        return static::doStore(static::getBasePath($this->id).'/'.$key, ['value' => $value]);
    }

    /**
     * sets instance properties from an object of values
     *
     * @access protected
     * @param mixed $response
     *
     * @return Model Initialized object
     */
    protected function initialize($response)
    {
        $this->raw = $response;

        return self::mapAs($this, $response);
    }

    /**
     * factory method: returns an instance of Model
     * to the requesting method, with populated properties
     *
     * @return Model instance of Model
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
     * @return Model
     */
    protected static function doCreate($url, $params)
    {
        $response = Http::post($url, $params);

        return self::factory($response);
    }

    /**
     * sends the fetch request to the gateway
     *
     * @param string|array $ids
     *
     * @return Collection
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

        return self::doBatch($urls);
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

        return Http::get('/search', $params);
    }

    /**
     * sends the store request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return Model
     */
    protected static function doStore($url, $params)
    {
        $response = Http::put($url, $params);

        return self::factory($response);
    }

    /**
     * Batch a list of urls
     *
     * @param  array  List of urls
     *
     * @return Collection Collection of result objects
     */
    protected static function doBatch($urls = [])
    {
        $collection = new Collection;
        $response = Http::get('/batch', ['urls' => $urls]);
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
     * @return stdClass
     * @throws Exception
     */
    protected static function get($url, $params = [])
    {
        return Http::get($url, $params);
    }

    /**
     * sends the post request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass
     * @throws Exception
     */
    protected static function post($url, $params = [])
    {
        return Http::post($url, $params);
    }

    /**
     * sends the put request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @return stdClass
     * @throws Exception
     */
    protected static function put($url, $params = [])
    {
        return Http::put($url, $params);
    }

    /**
     * sends the delete request to the gateway
     *
     * @param string $url
     * @param array $params
     *
     * @throws Exception
     * @return boolean
     */
    protected static function delete($url, $params = [])
    {
        return Http::delete($url, $params);
    }

    /**
     * Map an object as another given object
     *
     * @param  Model $destination Object to receive the mapping
     * @param  object sourceObject Object from which to map data
     *
     * @return Model Mapped object
     *
     * @codeCoverageIgnore
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
     * @param  Collection $collection  Collection
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

    /**
     * Get short class name of calling class
     *
     * @return string
     */
    private static function getClassName()
    {
        return Util::cleanClassName(get_called_class());
    }

    /**
     * Check if method name is update atribute method
     *
     * @param  string $method
     *
     * @return boolean
     */
    private function isUpdateMethod($method)
    {
        return strrpos($method, 'update') === 0;
    }

    /**
     * Get attribute from update method name
     *
     * @param  string $method
     *
     * @return string
     */
    private function getAttributeFromUpdateMethod($method)
    {
        $attribute = preg_replace('/update(.*)/', '$1', $method);

        return lcfirst($attribute);
    }
}
