<?php namespace Stevenmaguire\Services\Trello\Traits;

trait BoardTrait
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
    public function addBoard($attributes = [])
    {
        return $this->getHttp()->post('boards', $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoard($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoard($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $fieldName
     *
     * @return object
     */
    public function getBoardField($boardId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('boards/%s/%s', $boardId, $fieldName));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardActions($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/actions', $boardId));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardBoardStars($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/boardStars', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardCalendarKeyGenerate($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/calendarKey/generate', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardCards($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/cards', $boardId));
    }

    /**
     * @param string $boardId
     * @param string $cardId
     *
     * @return object
     */
    public function getBoardCard($boardId, $cardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/cards/%s', $boardId, $cardId));
    }

    /**
     * @param string $boardId
     * @param string $filter
     *
     * @return object
     */
    public function getBoardCardsWithFilter($boardId, $filter)
    {
        return $this->getHttp()->get(sprintf('boards/%s/cards/%s', $boardId, $filter));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardChecklists($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/checklists', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardChecklist($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/checklists', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardClosed($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/closed', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardDeltas($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/deltas', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardDesc($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/desc', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardEmailKeyGenerate($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/emailKey/generate', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardIdOrganization($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/idOrganization', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNameBlue($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/blue', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNameGreen($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/green', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNameOrange($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/orange', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNamePurple($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/purple', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNameRed($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/red', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardLabelNameYellow($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/labelNames/yellow', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardLabels($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/labels', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardLabel($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/labels', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $labelId
     *
     * @return object
     */
    public function getBoardLabel($boardId, $labelId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/labels/%s', $boardId, $labelId));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardLists($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/lists', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardList($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/lists', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $listId
     *
     * @return object
     */
    public function getBoardList($boardId, $listId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/lists/%s', $boardId, $listId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardMarkAsViewed($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/markAsViewed', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardMembers($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/members', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMembers($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/members', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $memberId
     *
     * @return object
     */
    public function deleteBoardMember($boardId, $memberId)
    {
        return $this->getHttp()->delete(sprintf('boards/%s/members/%s', $boardId, $memberId));
    }

    /**
     * @param string $boardId
     * @param string $memberId
     *
     * @return object
     */
    public function getBoardMember($boardId, $memberId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/members/%s', $boardId, $memberId));
    }

    /**
     * @param string $boardId
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMember($boardId, $memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/members/%s', $boardId, $memberId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $memberId
     *
     * @return object
     */
    public function getBoardMemberCards($boardId, $memberId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/members/%s/cards', $boardId, $memberId));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardMemberships($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/memberships', $boardId));
    }

    /**
     * @param string $boardId
     * @param string $membershipId
     *
     * @return object
     */
    public function getBoardMembership($boardId, $membershipId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/memberships/%s', $boardId, $membershipId));
    }

    /**
     * @param string $boardId
     * @param string $membershipId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMembership($boardId, $membershipId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/memberships/%s', $boardId, $membershipId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardMembersInviteds($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/membersInvited', $boardId));
    }

    /**
     * @param string $boardId
     * @param string $membersInvitedId
     *
     * @return object
     */
    public function getBoardMembersInvited($boardId, $membersInvitedId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/membersInvited/%s', $boardId, $membersInvitedId));
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardMyPref($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/myPrefs', $boardId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefEmailPosition($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/emailPosition', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefIdEmailList($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/idEmailList', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefShowListGuide($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/showListGuide', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefShowSidebar($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/showSidebar', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefShowSidebarActivity($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/showSidebarActivity', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefShowSidebarBoardAction($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/showSidebarBoardActions', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardMyPrefShowSidebarMember($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/myPrefs/showSidebarMembers', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardName($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/name', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     *
     * @return object
     */
    public function getBoardOrganization($boardId)
    {
        return $this->getHttp()->get(sprintf('boards/%s/organization', $boardId));
    }

    /**
     * @param string $boardId
     * @param string $fieldName
     *
     * @return object
     */
    public function getBoardOrganizationField($boardId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('boards/%s/organization/%s', $boardId, $fieldName));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addBoardPowerUp($boardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('boards/%s/powerUps', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param string $powerUpId
     *
     * @return object
     */
    public function deleteBoardPowerUp($boardId, $powerUpId)
    {
        return $this->getHttp()->delete(sprintf('boards/%s/powerUps/%s', $boardId, $powerUpId));
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefBackground($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/background', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefCalendarFeedEnabled($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/calendarFeedEnabled', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefCardAging($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/cardAging', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefCardCovers($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/cardCovers', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefComment($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/comments', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefInvitation($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/invitations', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefPermissionLevel($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/permissionLevel', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefSelfJoin($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/selfJoin', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardPrefVoting($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/prefs/voting', $boardId), $attributes);
    }

    /**
     * @param string $boardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateBoardSubscribed($boardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('boards/%s/subscribed', $boardId), $attributes);
    }
}
