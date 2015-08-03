<?php namespace Stevenmaguire\Services\Trello\Traits;

trait SessionTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param array  $attributes
     *
     * @return object
     */
    public function addSession($attributes = [])
    {
        return $this->getHttp()->post('sessions', $attributes);
    }

    /**
     * @param string $sessionId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateSession($sessionId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('sessions/%s', $sessionId), $attributes);
    }

    /**
     * @param string $sessionId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateSessionStatus($sessionId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('sessions/%s/status', $sessionId), $attributes);
    }

    /**
     *
     * @return object
     */
    public function getSessionSocket()
    {
        return $this->getHttp()->get('sessions/socket');
    }
}
