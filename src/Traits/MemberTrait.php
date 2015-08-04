<?php namespace Stevenmaguire\Services\Trello\Traits;

trait MemberTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMember($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMember($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $fieldName
     *
     * @return object
     */
    public function getMemberField($memberId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('members/%s/%s', $memberId, $fieldName));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberActions($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/actions', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberAvatar($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/avatar', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberAvatarSource($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/avatarSource', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberBio($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/bio', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberBoardBackgrounds($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardBackgrounds', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberBoardBackground($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/boardBackgrounds', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $boardBackgroundId
     *
     * @return object
     */
    public function deleteMemberBoardBackground($memberId, $boardBackgroundId)
    {
        return $this->getHttp()->delete(sprintf('members/%s/boardBackgrounds/%s', $memberId, $boardBackgroundId));
    }

    /**
     * @param string $memberId
     * @param string $boardBackgroundId
     *
     * @return object
     */
    public function getMemberBoardBackground($memberId, $boardBackgroundId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardBackgrounds/%s', $memberId, $boardBackgroundId));
    }

    /**
     * @param string $memberId
     * @param string $boardBackgroundId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberBoardBackground($memberId, $boardBackgroundId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('members/%s/boardBackgrounds/%s', $memberId, $boardBackgroundId),
            $attributes
        );
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberBoards($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boards', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $boardId
     *
     * @return object
     */
    public function getMemberBoard($memberId, $boardId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boards/%s', $memberId, $boardId));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberBoardsInvited($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardsInvited', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $fieldName
     *
     * @return object
     */
    public function getMemberBoardsInvitedField($memberId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardsInvited/%s', $memberId, $fieldName));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberBoardStars($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardStars', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberBoardStar($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/boardStars', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $boardStarId
     *
     * @return object
     */
    public function deleteMemberBoardStar($memberId, $boardStarId)
    {
        return $this->getHttp()->delete(sprintf('members/%s/boardStars/%s', $memberId, $boardStarId));
    }

    /**
     * @param string $memberId
     * @param string $boardStarId
     *
     * @return object
     */
    public function getMemberBoardStar($memberId, $boardStarId)
    {
        return $this->getHttp()->get(sprintf('members/%s/boardStars/%s', $memberId, $boardStarId));
    }

    /**
     * @param string $memberId
     * @param string $boardStarId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberBoardStar($memberId, $boardStarId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/boardStars/%s', $memberId, $boardStarId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $boardStarId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberBoardStarIdBoard($memberId, $boardStarId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/boardStars/%s/idBoard', $memberId, $boardStarId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $boardStarId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberBoardStarPos($memberId, $boardStarId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/boardStars/%s/pos', $memberId, $boardStarId), $attributes);
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberCards($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/cards', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $cardId
     *
     * @return object
     */
    public function getMemberCard($memberId, $cardId)
    {
        return $this->getHttp()->get(sprintf('members/%s/cards/%s', $memberId, $cardId));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberCustomBoardBackgrounds($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/customBoardBackgrounds', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberCustomBoardBackground($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/customBoardBackgrounds', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $customBoardBackgroundId
     *
     * @return object
     */
    public function deleteMemberCustomBoardBackground($memberId, $customBoardBackgroundId)
    {
        return $this->getHttp()->delete(
            sprintf('members/%s/customBoardBackgrounds/%s', $memberId, $customBoardBackgroundId)
        );
    }

    /**
     * @param string $memberId
     * @param string $customBoardBackgroundId
     *
     * @return object
     */
    public function getMemberCustomBoardBackground($memberId, $customBoardBackgroundId)
    {
        return $this->getHttp()->get(
            sprintf('members/%s/customBoardBackgrounds/%s', $memberId, $customBoardBackgroundId)
        );
    }

    /**
     * @param string $memberId
     * @param string $customBoardBackgroundId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberCustomBoardBackground($memberId, $customBoardBackgroundId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('members/%s/customBoardBackgrounds/%s', $memberId, $customBoardBackgroundId),
            $attributes
        );
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberCustomEmojis($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/customEmoji', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberCustomEmoji($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/customEmoji', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $customEmojiId
     *
     * @return object
     */
    public function getMemberCustomEmoji($memberId, $customEmojiId)
    {
        return $this->getHttp()->get(sprintf('members/%s/customEmoji/%s', $memberId, $customEmojiId));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberCustomStickers($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/customStickers', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberCustomSticker($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/customStickers', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $customStickerId
     *
     * @return object
     */
    public function deleteMemberCustomSticker($memberId, $customStickerId)
    {
        return $this->getHttp()->delete(sprintf('members/%s/customStickers/%s', $memberId, $customStickerId));
    }

    /**
     * @param string $memberId
     * @param string $customStickerId
     *
     * @return object
     */
    public function getMemberCustomSticker($memberId, $customStickerId)
    {
        return $this->getHttp()->get(sprintf('members/%s/customStickers/%s', $memberId, $customStickerId));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberDeltas($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/deltas', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberFullName($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/fullName', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberInitials($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/initials', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberNotifications($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/notifications', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $notificationId
     *
     * @return object
     */
    public function getMemberNotification($memberId, $notificationId)
    {
        return $this->getHttp()->get(sprintf('members/%s/notifications/%s', $memberId, $notificationId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberOneTimeMessagesDismissed($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/oneTimeMessagesDismissed', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberOrganizations($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/organizations', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $organizationId
     *
     * @return object
     */
    public function getMemberOrganization($memberId, $organizationId)
    {
        return $this->getHttp()->get(sprintf('members/%s/organizations/%s', $memberId, $organizationId));
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberOrganizationsInvited($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/organizationsInvited', $memberId));
    }

    /**
     * @param string $memberId
     * @param string $fieldName
     *
     * @return object
     */
    public function getMemberOrganizationsInvitedField($memberId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('members/%s/organizationsInvited/%s', $memberId, $fieldName));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberPrefColorBlind($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/prefs/colorBlind', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberPrefMinutesBetweenSummaries($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/prefs/minutesBetweenSummaries', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberSavedSearches($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/savedSearches', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function addMemberSavedSearch($memberId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('members/%s/savedSearches', $memberId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     *
     * @return object
     */
    public function deleteMemberSavedSearch($memberId, $savedSearcheId)
    {
        return $this->getHttp()->delete(sprintf('members/%s/savedSearches/%s', $memberId, $savedSearcheId));
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     *
     * @return object
     */
    public function getMemberSavedSearch($memberId, $savedSearcheId)
    {
        return $this->getHttp()->get(sprintf('members/%s/savedSearches/%s', $memberId, $savedSearcheId));
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberSavedSearch($memberId, $savedSearcheId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/savedSearches/%s', $memberId, $savedSearcheId), $attributes);
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberSavedSearchName($memberId, $savedSearcheId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('members/%s/savedSearches/%s/name', $memberId, $savedSearcheId),
            $attributes
        );
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberSavedSearchPos($memberId, $savedSearcheId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('members/%s/savedSearches/%s/pos', $memberId, $savedSearcheId),
            $attributes
        );
    }

    /**
     * @param string $memberId
     * @param string $savedSearcheId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberSavedSearchQuery($memberId, $savedSearcheId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('members/%s/savedSearches/%s/query', $memberId, $savedSearcheId),
            $attributes
        );
    }

    /**
     * @param string $memberId
     *
     * @return object
     */
    public function getMemberTokens($memberId)
    {
        return $this->getHttp()->get(sprintf('members/%s/tokens', $memberId));
    }

    /**
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateMemberUsername($memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('members/%s/username', $memberId), $attributes);
    }
}
