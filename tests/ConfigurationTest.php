<?php namespace Stevenmaguire\Services\Trello\Tests;

use Stevenmaguire\Services\Trello\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $config = new \ReflectionClass(Configuration::class);
        $settings = $config->getProperty('settings');
        $settings->setAccessible(true);
        $settings = $settings->setValue([]);
    }

    public function testSetSingle()
    {
        $key = uniqid();
        $value = uniqid();

        Configuration::set($key, $value);

        $this->assertTrue(Configuration::has($key));
        $this->assertEquals($value, Configuration::get($key));
    }

    public function testSetMany()
    {
        $settings = [
            uniqid() => uniqid(),
            uniqid() => uniqid(),
        ];

        Configuration::setMany($settings);

        array_walk($settings, function ($value, $key) {
            $this->assertTrue(Configuration::has($key));
            $this->assertEquals($value, Configuration::get($key));
        });
    }

    public function testSetManyWithDefaults()
    {
        $defaults = [
            uniqid() => uniqid(),
            uniqid() => uniqid(),
        ];

        $settings = [
            uniqid() => uniqid(),
            uniqid() => uniqid(),
        ];

        Configuration::setMany($settings, $defaults);
        $configuration = array_merge($settings, $defaults);

        array_walk($configuration, function ($value, $key) {
            $this->assertTrue(Configuration::has($key));
            $this->assertEquals($value, Configuration::get($key));
        });
    }

    public function testGetWithoutKey()
    {
        $settings = [
            uniqid() => uniqid(),
            uniqid() => uniqid(),
        ];

        Configuration::setMany($settings);
        $configuration = Configuration::get();

        $this->assertTrue(is_array($configuration));
        $this->assertEquals($settings, $configuration);
    }

    public function testGetWithCustomDefault()
    {
        $key = uniqid();
        $default = uniqid();

        $setting = Configuration::get($key, $default);

        $this->assertEquals($default, $setting);
    }
}
