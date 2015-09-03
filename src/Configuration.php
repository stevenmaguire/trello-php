<?php namespace Stevenmaguire\Services\Trello;

class Configuration
{
    /**
     * Settings
     *
     * @var array
     */
    protected static $settings = [];

    /**
     * Confirms that a given key exists in configuration settings.
     *
     * @param  string $key
     *
     * @return boolean
     */
    public static function has($key)
    {
        return isset(static::$settings[$key]);
    }

    /**
     * Attempts to retrieve a given key from configuration settings. Returns
     * default if not set.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public static function get($key = null, $default = null)
    {
        if (!empty($key)) {
            return isset(static::$settings[$key]) ? static::$settings[$key] : $default;
        }

        return static::$settings;
    }

    /**
     * Parses give options against default options.
     *
     * @param  array   $options
     * @param  array   $defaults
     *
     * @return array
     */
    public static function parseDefaultOptions($options = [], $defaults = [])
    {
        array_walk($defaults, function ($value, $key) use (&$options) {
            if (!isset($options[$key])) {
                $options[$key] = $value;
            }
        });

        return $options;
    }

    /**
     * Updates configuration settings with key value pair.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public static function set($key, $value)
    {
        static::$settings[$key] = $value;
    }

    /**
     * Updates configuration settings with collection of key value pairs.
     *
     * @param array $settings
     *
     * @return void
     */
    public static function setMany($settings = [], $defaultSettings = [])
    {
        $settings = static::parseDefaultOptions($settings, $defaultSettings);

        array_walk($settings, function ($value, $key) {
            static::set($key, $value);
        });
    }
}
