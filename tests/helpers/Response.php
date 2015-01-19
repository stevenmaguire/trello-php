<?php namespace Trello\Tests\Helpers;

use \Exception;

class Response
{
    use ResponsesTrait;

    protected $payload = '{}';

    public static function make($class = null)
    {
        $response = new self();
        if ($class) {
            print_r($class);
        }
        return $response->get();
    }

    public function set($attribute, $value = null)
    {
        $this->setPayloadAttribute($attribute, $value);
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
}
