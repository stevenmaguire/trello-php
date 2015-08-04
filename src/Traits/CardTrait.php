<?php namespace Stevenmaguire\Services\Trello\Traits;

trait CardTrait
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
    public function addCard($attributes = [])
    {
        return $this->getHttp()->post('cards', $attributes);
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function deleteCard($cardId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s', $cardId));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCard($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s', $cardId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCard($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $fieldName
     *
     * @return object
     */
    public function getCardField($cardId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('cards/%s/%s', $cardId, $fieldName));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardAction($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/actions', $cardId));
    }

    /**
     * @param string $cardId
     * @param string $actionId
     *
     * @return object
     */
    public function deleteCardActionComment($cardId, $actionId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/actions/%s/comments', $cardId, $actionId));
    }

    /**
     * @param string $cardId
     * @param string $actionId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardActionComments($cardId, $actionId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/actions/%s/comments', $cardId, $actionId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardActionComment($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/actions/comments', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardAttachments($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/attachments', $cardId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardAttachment($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/attachments', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $attachmentId
     *
     * @return object
     */
    public function deleteCardAttachment($cardId, $attachmentId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/attachments/%s', $cardId, $attachmentId));
    }

    /**
     * @param string $cardId
     * @param string $attachmentId
     *
     * @return object
     */
    public function getCardAttachment($cardId, $attachmentId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/attachments/%s', $cardId, $attachmentId));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardBoard($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/board', $cardId));
    }

    /**
     * @param string $cardId
     * @param string $fieldName
     *
     * @return object
     */
    public function getCardBoardField($cardId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('cards/%s/board/%s', $cardId, $fieldName));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardCheckItemState($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/checkItemStates', $cardId));
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardChecklistCheckItem($cardId, $checklistId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/checklist/%s/checkItem', $cardId, $checklistId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     *
     * @return object
     */
    public function deleteCardChecklistCheckItem($cardId, $checklistId, $checkItemId)
    {
        return $this->getHttp()->delete(
            sprintf('cards/%s/checklist/%s/checkItem/%s', $cardId, $checklistId, $checkItemId)
        );
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardChecklistCheckItem($cardId, $checklistId, $checkItemId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('cards/%s/checklist/%s/checkItem/%s', $cardId, $checklistId, $checkItemId),
            $attributes
        );
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardChecklistCheckItemConvertToCard($cardId, $checklistId, $checkItemId, $attributes = [])
    {
        return $this->getHttp()->post(
            sprintf('cards/%s/checklist/%s/checkItem/%s/convertToCard', $cardId, $checklistId, $checkItemId),
            $attributes
        );
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardChecklistCheckItemName($cardId, $checklistId, $checkItemId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('cards/%s/checklist/%s/checkItem/%s/name', $cardId, $checklistId, $checkItemId),
            $attributes
        );
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardChecklistCheckItemPos($cardId, $checklistId, $checkItemId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('cards/%s/checklist/%s/checkItem/%s/pos', $cardId, $checklistId, $checkItemId),
            $attributes
        );
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     * @param string $checkItemId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardChecklistCheckItemState($cardId, $checklistId, $checkItemId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('cards/%s/checklist/%s/checkItem/%s/state', $cardId, $checklistId, $checkItemId),
            $attributes
        );
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardChecklists($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/checklists', $cardId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardChecklist($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/checklists', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $checklistId
     *
     * @return object
     */
    public function deleteCardChecklist($cardId, $checklistId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/checklists/%s', $cardId, $checklistId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardClosed($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/closed', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardDesc($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/desc', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardDue($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/due', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardIdAttachmentCover($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/idAttachmentCover', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardIdBoard($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/idBoard', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardIdLabel($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/idLabels', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $idLabelId
     *
     * @return object
     */
    public function deleteCardIdLabel($cardId, $idLabelId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/idLabels/%s', $cardId, $idLabelId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardIdList($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/idList', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardIdMember($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/idMembers', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardIdMembers($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/idMembers', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $idMemberId
     *
     * @return object
     */
    public function deleteCardIdMember($cardId, $idMemberId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/idMembers/%s', $cardId, $idMemberId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardLabel($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/labels', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardLabel($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/labels', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $labelId
     *
     * @return object
     */
    public function deleteCardLabel($cardId, $labelId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/labels/%s', $cardId, $labelId));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardList($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/list', $cardId));
    }

    /**
     * @param string $cardId
     * @param string $fieldName
     *
     * @return object
     */
    public function getCardListField($cardId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('cards/%s/list/%s', $cardId, $fieldName));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardMarkAssociatedNotificationsRead($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/markAssociatedNotificationsRead', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardMembers($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/members', $cardId));
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardMembersVoted($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/membersVoted', $cardId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardMembersVoted($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/membersVoted', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $membersVotedId
     *
     * @return object
     */
    public function deleteCardMembersVoted($cardId, $membersVotedId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/membersVoted/%s', $cardId, $membersVotedId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardName($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/name', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardPos($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/pos', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     *
     * @return object
     */
    public function getCardStickers($cardId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/stickers', $cardId));
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function addCardSticker($cardId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('cards/%s/stickers', $cardId), $attributes);
    }

    /**
     * @param string $cardId
     * @param string $stickerId
     *
     * @return object
     */
    public function deleteCardSticker($cardId, $stickerId)
    {
        return $this->getHttp()->delete(sprintf('cards/%s/stickers/%s', $cardId, $stickerId));
    }

    /**
     * @param string $cardId
     * @param string $stickerId
     *
     * @return object
     */
    public function getCardSticker($cardId, $stickerId)
    {
        return $this->getHttp()->get(sprintf('cards/%s/stickers/%s', $cardId, $stickerId));
    }

    /**
     * @param string $cardId
     * @param string $stickerId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardSticker($cardId, $stickerId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/stickers/%s', $cardId, $stickerId), $attributes);
    }

    /**
     * @param string $cardId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateCardSubscribed($cardId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('cards/%s/subscribed', $cardId), $attributes);
    }
}
