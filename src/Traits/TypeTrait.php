<?php namespace Stevenmaguire\Services\Trello\Traits;

trait TypeTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param string $typeId
     *
     * @return object
     */
    public function getType($typeId)
    {
        return $this->getHttp()->get(sprintf('types/%s', $typeId));
    }
}
