<?php namespace Trello;

use \stdClass;
use Trello\Exception\ValidationsFailed;

/**
 * Base class for models
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 * @abstract
 */
abstract class Model
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
     * Primary id for model
     *
     * @var string
     */
    protected static $primary_key = 'id';

    /**
     * Foreign id for model
     *
     * @var string
     */
    protected static $foreign_key;

    /**
     * Close model
     *
     * @return bool  Did the model close?
     * @throws Exception\ValidationsFailed
     */
    public function close()
    {
        $url = self::getBasePath($this->getId());

        return Http::delete($url);
    }

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
     * Delete model
     *
     * @return bool  Did the model close?
     * @throws Exception\ValidationsFailed
     */
    public static function closeWithId($model_id = null)
    {
        if ($model_id) {
            $url = self::getBasePath($model_id);

            return Http::delete($url);
        }
        throw new ValidationsFailed(
            'attempting to close model without id; it\'s gotta have an id.'
        );
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
     * @param array $options
     *
     * @return Collection
     */
    protected static function doFetch($ids, $options = array())
    {
        if (empty($ids)) {
            return new Collection;
        }

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $urls = array();

        foreach ($ids as $id) {
            $urls[] = self::getBasePath($id, $options);
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
     * factory method: returns an instance of Model
     * to the requesting method, with populated properties
     *
     * @return Model instance of Model
     */
    public static function factory($response = null)
    {
        $instance = new static();
        $instance->initialize($response);

        return $instance;
    }

    /**
     * fetch a model
     *
     * @param  string $id Model id to fetch
     * @param  array $options
     *
     * @return Model|null
     */
    public static function fetch($id = null, $options= [])
    {
        $result = self::doFetch($id, $options)->first();
        if ($result) {
            return self::factory($result);
        }

        return null;
    }

    /**
     * fetch many models
     *
     * @param  array $ids Model ids to fetch
     * @param  array $options
     *
     * @return Collection
     */
    public static function fetchMany($ids = [], $options = [])
    {
        return self::doFetch($ids, $options);
    }

    /**
     * Get model base url
     *
     * @param  string $id
     * @param  array $options
     *
     * @return string Base url
     */
    protected static function getBasePath($id = null, $options = array())
    {
        $base = ltrim(static::$base_path, '/');
        $object = $id ? '/'.$id : '';
        $query = http_build_query($options);

        return '/'.$base.$object.(!empty($query) ? '?'.$query : '');
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
     * Get model foreign key
     *
     * @return string
     */
    public function getForeignKey()
    {
        $key = static::$foreign_key;
        if (empty($key)) {
            $key = $this->getPrimaryKey().$this->getClassName();
        }

        return $key;
    }

    /**
     * Get model primary key
     *
     * @return string
     */
    public function getId()
    {
        $key = static::$primary_key;
        return $this->$key;
    }

    /**
     * Get model ids from list of models
     *
     * @param  array|null $models List of models
     *
     * @return array List of model ids
     */
    public static function getIds($models = null)
    {
        if ($models) {
            return Util::getItemsProperties($models, static::$primary_key);
        }

        return array();
    }

    /**
     * Get model primary key
     *
     * @return string
     */
    public function getPrimaryKey()
    {
        return static::$primary_key;
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

        return Util::mapAs($this, $response);
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
     * Parse collection as model
     *
     * @param  array|null $collection
     * @param  string $model
     *
     * @return Collection
     */
    protected function parseCollectionAs(array $collection = array(), $model)
    {
        foreach ($collection as $key => $item) {
            $collection[$key] = $model::factory($item);
        }

        return new Collection($collection);
    }

    /**
     * If model id empty, attempt to set same as getId()
     *
     * @param  string $model_id
     *
     * @return void
     */
    protected function parseModelId(&$model_id)
    {
        if (empty($model_id)) {
            $model_id = $this->getId();
        }
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

            return call_user_func_array(array($this, 'updateAttribute'), $parameters);
        }

        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $parameters);
        }
    }

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param  string  $method
     * @param  array   $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $instance = new static;
        return call_user_func_array(array($instance, $method), $parameters);
    }

    ////// Attributes

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
     * Get attribute
     *
     * @param  string $property
     *
     * @return mixed|null
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
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
        return strrpos($method, 'update') === 0 && substr($method, -9) == 'Attribute';
    }

    /**
     * Get attribute
     *
     * @param  string $attribute
     *
     * @return mixed|null
     */
    protected function getAttribute($attribute)
    {
        return $this->__get($attribute);
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
        $attribute = preg_replace('/update(.*)Attribute/', '$1', $method);

        return lcfirst($attribute);
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
                throw new ValidationsFailed(
                    'attempted to create '.lcfirst(self::getClassName())
                    .' without '.$attribute.'; it\'s gotta have a '.$attribute
                );
            }
        }
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

    ////// FIELDS

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
                $response = static::get($url);
                $this->$field = $this->parseFieldResponse($response);
                return $this->$field;
            } catch (Exception $e) {
                //
            }
        }

        return $value;
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
