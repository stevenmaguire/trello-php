<?php namespace Trello;

use Trello\Exception\ValidationsFailed;

trait Attributes
{

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
}
