<?php namespace Stevenmaguire\Services\Trello\Traits;

trait ChecklistTrait
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
    public function addChecklist($attributes = [])
    {
        return $this->getHttp()->post('checklists', $attributes);
    }

    /**
     * @param string $checklistId
     *
     * @return object
     */
    public function deleteChecklist($checklistId)
    {
        return $this->getHttp()->delete(sprintf('checklists/%s', $checklistId));
    }

    /**
     * @param string $checklistId
     *
     * @return object
     */
    public function getChecklist($checklistId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s', $checklistId));
    }

    /**
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateChecklist($checklistId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('checklists/%s', $checklistId), $attributes);
    }

    /**
     * @param string $checklistId
     * @param string $fieldName
     *
     * @return object
     */
    public function getChecklistField($checklistId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/%s', $checklistId, $fieldName));
    }

    /**
     * @param string $checklistId
     *
     * @return object
     */
    public function getChecklistBoard($checklistId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/board', $checklistId));
    }

    /**
     * @param string $checklistId
     * @param string $fieldName
     *
     * @return object
     */
    public function getChecklistBoardField($checklistId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/board/%s', $checklistId, $fieldName));
    }

    /**
     * @param string $checklistId
     *
     * @return object
     */
    public function getChecklistCards($checklistId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/cards', $checklistId));
    }

    /**
     * @param string $checklistId
     * @param string $cardId
     *
     * @return object
     */
    public function getChecklistCard($checklistId, $cardId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/cards/%s', $checklistId, $cardId));
    }

    /**
     * @param string $checklistId
     *
     * @return object
     */
    public function getChecklistCheckItems($checklistId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/checkItems', $checklistId));
    }

    /**
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function addChecklistCheckItem($checklistId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('checklists/%s/checkItems', $checklistId), $attributes);
    }

    /**
     * @param string $checklistId
     * @param string $checkItemId
     *
     * @return object
     */
    public function deleteChecklistCheckItem($checklistId, $checkItemId)
    {
        return $this->getHttp()->delete(sprintf('checklists/%s/checkItems/%s', $checklistId, $checkItemId));
    }

    /**
     * @param string $checklistId
     * @param string $checkItemId
     *
     * @return object
     */
    public function getChecklistCheckItem($checklistId, $checkItemId)
    {
        return $this->getHttp()->get(sprintf('checklists/%s/checkItems/%s', $checklistId, $checkItemId));
    }

    /**
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateChecklistIdCard($checklistId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('checklists/%s/idCard', $checklistId), $attributes);
    }

    /**
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateChecklistName($checklistId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('checklists/%s/name', $checklistId), $attributes);
    }

    /**
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateChecklistPos($checklistId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('checklists/%s/pos', $checklistId), $attributes);
    }
}
