<?php namespace Stevenmaguire\Services\Trello\Traits;

use Stevenmaguire\Services\Trello\Configuration;

trait ConfigurationTrait
{
    /**
     * Confirms that a given key exists in configuration settings.
     *
     * @return boolean
     */
    public function hasConfig()
    {
        return forward_static_call_array([Configuration::class, 'has'], func_get_args());
    }

    /**
     * Attempts to retrieve a given key from configuration settings. Returns
     * default if not set.
     *
     * @return mixed
     */
    public function getConfig()
    {
        return forward_static_call_array([Configuration::class, 'get'], func_get_args());
    }

    /**
     * Updates configuration settings with key value pairs.
     *
     * @return this
     */
    public function addConfig()
    {
        $params = func_get_args();

        if (!empty($params)) {
            if (is_array($params[0])) {
                forward_static_call_array([Configuration::class, 'setMany'], $params);
            } else {
                forward_static_call_array([Configuration::class, 'set'], $params);
            }
        }

        return $this;
    }
}
