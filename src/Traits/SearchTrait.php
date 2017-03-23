<?php namespace Stevenmaguire\Services\Trello\Traits;

trait SearchTrait
{
    /**
     * Retrieves currently configured http broker.
     *
     * @return Stevenmaguire\Services\Trello\Http
     * @codeCoverageIgnore
     */
    abstract public function getHttp();

    /**
     * Retrieves http response from Trello api for search query.
     *
     * @param  array $attributes
     *
     * @return object
     */
    public function getSearch($attributes = [])
    {
        return $this->getHttp()->get('search', $attributes);
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
        return $this->getHttp()->get('search/members', $attributes);
    }
}
