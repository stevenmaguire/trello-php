<?php namespace Stevenmaguire\Services\Trello\Tests;

use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = new Client;
        $config = new \ReflectionClass(Configuration::class);
        $settings = $config->getProperty('settings');
        $settings->setAccessible(true);
        $settings = $settings->setValue([]);
    }

    public function testSetSingle()
    {
        $key = uniqid();
        $value = uniqid();

        $this->client->addConfig($key, $value);

        $this->assertTrue($this->client->hasConfig($key));
        $this->assertEquals($value, $this->client->getConfig($key));
    }

    public function testSetMany()
    {
        $settings = [
            (uniqid() . rand(0,100)) => uniqid(),
            (uniqid() . rand(0,100)) => uniqid(),
        ];

        $this->client->addConfig($settings);

        array_walk($settings, function ($value, $key) {
            $this->assertTrue($this->client->hasConfig($key));
            $this->assertEquals($value, $this->client->getConfig($key));
        });
    }

    public function testSetManyWithExisting()
    {
        $first = [
            (uniqid() . rand(0,100)) => uniqid(),
            (uniqid() . rand(0,100)) => uniqid(),
        ];

        $second = [
            (uniqid() . rand(0,100)) => uniqid(),
            (uniqid() . rand(0,100)) => uniqid(),
        ];

        $this->client->addConfig($first)->addConfig($second);
        $configuration = array_merge($first, $second);

        array_walk($configuration, function ($value, $key) {
            $this->assertTrue($this->client->hasConfig($key));
            $this->assertEquals($value, $this->client->getConfig($key));
        });
    }

    public function testSetManyWithDefaults()
    {
        $defaults = [
            (uniqid() . rand(0,100)) => uniqid(),
            (uniqid() . rand(0,100)) => uniqid(),
        ];

        $settings = [
            (uniqid() . rand(0,100)) => uniqid(),
            (uniqid() . rand(0,100)) => uniqid(),
        ];

        $this->client->addConfig($settings, $defaults);
        $configuration = array_merge($settings, $defaults);

        array_walk($configuration, function ($value, $key) {
            $this->assertTrue($this->client->hasConfig($key));
            $this->assertEquals($value, $this->client->getConfig($key));
        });
    }

    public function testGetWithoutKey()
    {
        $settings = [
            uniqid() => uniqid(),
            uniqid() => uniqid(),
        ];

        $this->client->addConfig($settings);
        $configuration = $this->client->getConfig();

        $this->assertTrue(is_array($configuration));
        $this->assertEquals($settings, $configuration);
    }

    public function testGetWithCustomDefault()
    {
        $key = uniqid();
        $default = uniqid();

        $setting = $this->client->getConfig($key, $default);

        $this->assertEquals($default, $setting);
    }
}
