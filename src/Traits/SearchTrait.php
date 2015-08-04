<?php namespace Stevenmaguire\Services\Trello\Traits;

trait SearchTrait
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
     *
     * @param  array $attributes
     *
     * @return object
     */
    public function getSearch($attributes = [])
    {
        return $this->getHttp()->get('search' . $this->makeQuery($attributes));
    }

    /**
     *
     * @param  array $attributes
     *
     * @return object
     */
    public function getSearchMembers($attributes = [])
    {
        return $this->getHttp()->get('search/members' . $this->makeQuery($attributes));
    }
}
