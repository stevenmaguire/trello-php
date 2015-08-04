<?php namespace Stevenmaguire\Services\Trello\Traits;

trait NotificationTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotification($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateNotification($notificationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('notifications/%s', $notificationId), $attributes);
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationBoard($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/board', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationBoardField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/board/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationCard($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/card', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationCardField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/card/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationEntities($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/entities', $notificationId));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationList($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/list', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationListField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/list/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationMember($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/member', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationMemberField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/member/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationMemberCreator($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/memberCreator', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationMemberCreatorField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/memberCreator/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     *
     * @return object
     */
    public function getNotificationOrganization($notificationId)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/organization', $notificationId));
    }

    /**
     * @param string $notificationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getNotificationOrganizationField($notificationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('notifications/%s/organization/%s', $notificationId, $fieldName));
    }

    /**
     * @param string $notificationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateNotificationUnread($notificationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('notifications/%s/unread', $notificationId), $attributes);
    }

    /**
     * @param array  $attributes
     *
     * @return object
     */
    public function addNotificationAllRead($attributes = [])
    {
        return $this->getHttp()->post('notifications/all/read', $attributes);
    }
}
