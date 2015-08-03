<?php namespace Stevenmaguire\Services\Trello\Traits;

trait ListTrait
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
    public function addList($attributes = [])
    {
        return $this->getHttp()->post('lists', $attributes);
    }

    /**
     * @param string $listId
     *
     * @return object
     */
    public function getList($listId)
    {
        return $this->getHttp()->get(sprintf('lists/%s', $listId));
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateList($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param string $fieldName
     *
     * @return object
     */
    public function getListField($listId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('lists/%s/%s', $listId, $fieldName));
    }

    /**
     * @param string $listId
     *
     * @return object
     */
    public function getListActions($listId)
    {
        return $this->getHttp()->get(sprintf('lists/%s/actions', $listId));
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function addListArchiveAllCards($listId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('lists/%s/archiveAllCards', $listId), $attributes);
    }

    /**
     * @param string $listId
     *
     * @return object
     */
    public function getListBoard($listId)
    {
        return $this->getHttp()->get(sprintf('lists/%s/board', $listId));
    }

    /**
     * @param string $listId
     * @param string $fieldName
     *
     * @return object
     */
    public function getListBoardField($listId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('lists/%s/board/%s', $listId, $fieldName));
    }

    /**
     * @param string $listId
     *
     * @return object
     */
    public function getListCards($listId)
    {
        return $this->getHttp()->get(sprintf('lists/%s/cards', $listId));
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function addListCard($listId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('lists/%s/cards', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param string $cardId
     *
     * @return object
     */
    public function getListCard($listId, $cardId)
    {
        return $this->getHttp()->get(sprintf('lists/%s/cards/%s', $listId, $cardId));
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateListClosed($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s/closed', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateListIdBoard($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s/idBoard', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function addListMoveAllCards($listId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('lists/%s/moveAllCards', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateListName($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s/name', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateListPos($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s/pos', $listId), $attributes);
    }

    /**
     * @param string $listId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateListSubscribed($listId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('lists/%s/subscribed', $listId), $attributes);
    }
}
