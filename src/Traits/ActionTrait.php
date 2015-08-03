<?php namespace Stevenmaguire\Services\Trello\Traits;

trait ActionTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function deleteAction($actionId)
    {
        return $this->getHttp()->delete(sprintf('actions/%s', $actionId));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getAction($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s', $actionId));
    }

    /**
     * @param string $actionId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateAction($actionId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('actions/%s', $actionId), $attributes);
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionBoard($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/board', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionBoardField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/board/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionCard($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/card', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionCardField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/card/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionEntities($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/entities', $actionId));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionList($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/list', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionListField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/list/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionMember($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/member', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionMemberField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/member/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionMemberCreator($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/memberCreator', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionMemberCreatorField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/memberCreator/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     *
     * @return object
     */
    public function getActionOrganization($actionId)
    {
        return $this->getHttp()->get(sprintf('actions/%s/organization', $actionId));
    }

    /**
     * @param string $actionId
     * @param string $fieldName
     *
     * @return object
     */
    public function getActionOrganizationField($actionId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('actions/%s/organization/%s', $actionId, $fieldName));
    }

    /**
     * @param string $actionId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateActionText($actionId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('actions/%s/text', $actionId), $attributes);
    }
}
