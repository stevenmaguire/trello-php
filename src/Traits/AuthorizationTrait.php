<?php namespace Stevenmaguire\Services\Trello\Traits;

trait AuthorizationTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param  array  $parameters
     *
     * @return string
     */
    abstract protected function makeQuery($parameters = []);

    /**
     * @param  array $attributes
     *
     * @return object
     */
    public function getAuthorize($attributes = [])
    {
        return $this->getHttp()->get('authorize' . $this->makeQuery($attributes));
    }
}
