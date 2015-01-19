<?php namespace Trello\Tests\Helpers;

use \Exception;

class Response
{
    use ResponsesTrait;

    protected $payload = '{}';

    public static function make($class = null)
    {
        $response = new self();
        $payload = $response->getPayloadMethodFromModel($class);
        if ($payload) {
            $response->payload = $payload;
        }
        return $response;
    }

    public function set($attribute, $value = null)
    {
        $this->setPayloadAttribute($attribute, $value);
        return $this;
    }

    public function get()
    {
        return $this->payload;
    }

    protected function setPayloadAttribute($attribute, $value = null)
    {
        $object = json_decode($this->payload);
        if (property_exists($object, $attribute)) {
            $object->$attribute = $value;
        }
        $this->payload = json_encode($object);
    }

    protected function getPayloadMethodFromModel($class = null)
    {
        $model = $this->getModelFromClass($class);
        if ($model) {
            $method = 'get'.$model.'Response';
            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }
        return null;
    }

    protected function getModelFromClass($class = null)
    {
        return str_replace('Trello\\', '', $class);
    }
}
