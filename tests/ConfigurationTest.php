<?php

namespace Stevenmaguire\Services\Trello\Tests;

use PHPUnit\Framework\TestCase;
use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Configuration;

class ConfigurationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client();
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
            'one' => uniqid(),
            'two' => uniqid(),
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
            'one' => uniqid(),
            'two' => uniqid(),
        ];

        $second = [
            'three' => uniqid(),
            'four' => uniqid(),
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
            'one' => uniqid(),
            'two' => uniqid(),
        ];

        $settings = [
            'three' => uniqid(),
            'four' => uniqid(),
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
