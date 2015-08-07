<?php namespace Stevenmaguire\Services\Trello\Traits;

trait SearchTrait
{
    /**
     * Retrieves currently configured http broker.
     *
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * Creates a properly formatted query string from given parameters.
     *
     * @param  array  $parameters
     *
     * @return string
     */
    abstract protected function makeQuery($parameters = []);

    /**
     * Retrieves http response from Trello api for search query.
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
     * Retrieves http response from Trello api for member search query.
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
