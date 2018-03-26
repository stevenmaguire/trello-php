# Trello PHP

## Access the API

### Actions

#### Delete action

```php
$result = $client->deleteAction($actionId);
```
#### Get action

```php
$result = $client->getAction($actionId);
```
#### Update action

```php
$result = $client->updateAction($actionId, $attributes);
```
#### Get action field

```php
$result = $client->getActionField($actionId, $fieldName);
```
#### Get action board

```php
$result = $client->getActionBoard($actionId);
```
#### Get action board field

```php
$result = $client->getActionBoardField($actionId, $fieldName);
```
#### Get action card

```php
$result = $client->getActionCard($actionId);
```
#### Get action card field

```php
$result = $client->getActionCardField($actionId, $fieldName);
```
#### Get action entities

```php
$result = $client->getActionEntities($actionId);
```
#### Get action list

```php
$result = $client->getActionList($actionId);
```
#### Get action list field

```php
$result = $client->getActionListField($actionId, $fieldName);
```
#### Get action member

```php
$result = $client->getActionMember($actionId);
```
#### Get action member field

```php
$result = $client->getActionMemberField($actionId, $fieldName);
```
#### Get action member creator

```php
$result = $client->getActionMemberCreator($actionId);
```
#### Get action member creator field

```php
$result = $client->getActionMemberCreatorField($actionId, $fieldName);
```
#### Get action organization

```php
$result = $client->getActionOrganization($actionId);
```
#### Get action organization field

```php
$result = $client->getActionOrganizationField($actionId, $fieldName);
```
#### Update action text

```php
$result = $client->updateActionText($actionId, $attributes);
```

### Authorization

#### Get authorize

```php
$result = $client->getAuthorize($attributes);
```

#### Get authorization url

```php
$result = $client->getAuthorizationUrl();
```

#### Get access token

```php
$token = 'oauth-authorization-token';
$verifier = 'oauth-authorization-verifier';

$result = $client->getToken($token, $verifier);
```

### Batches

#### Add url to batch

```php
$result = $client->addBatchUrl($url);
```

#### Get batch

```php
$result = $client->getBatch($attributes);
```

#### Get batch urls

```php
$result = $client->getBatchUrls();
```

### Boards

#### Add board

```php
$result = $client->addBoard($attributes);
```
#### Get board

```php
$result = $client->getBoard($boardId);
```
#### Update board

```php
$result = $client->updateBoard($boardId, $attributes);
```
#### Get board field

```php
$result = $client->getBoardField($boardId, $fieldName);
```
#### Get board actions

```php
$result = $client->getBoardActions($boardId, $attributes);
```
#### Get board board stars

```php
$result = $client->getBoardBoardStars($boardId);
```
#### Add board calendar key generate

```php
$result = $client->addBoardCalendarKeyGenerate($boardId, $attributes);
```
#### Get board cards

```php
$result = $client->getBoardCards($boardId);
```
#### Get board card

```php
$result = $client->getBoardCard($boardId, $cardId);
```
#### Get board cards with filter

```php
$result = $client->getBoardCardsWithFilter($boardId, $filter);
```
#### Get board checklists

```php
$result = $client->getBoardChecklists($boardId);
```
#### Add board checklist

```php
$result = $client->addBoardChecklist($boardId, $attributes);
```
#### Update board closed

```php
$result = $client->updateBoardClosed($boardId, $attributes);
```
#### Get board deltas

```php
$result = $client->getBoardDeltas($boardId);
```
#### Update board desc

```php
$result = $client->updateBoardDesc($boardId, $attributes);
```
#### Add board email key generate

```php
$result = $client->addBoardEmailKeyGenerate($boardId, $attributes);
```
#### Update board id organization

```php
$result = $client->updateBoardIdOrganization($boardId, $attributes);
```
#### Update board label name blue

```php
$result = $client->updateBoardLabelNameBlue($boardId, $attributes);
```
#### Update board label name green

```php
$result = $client->updateBoardLabelNameGreen($boardId, $attributes);
```
#### Update board label name orange

```php
$result = $client->updateBoardLabelNameOrange($boardId, $attributes);
```
#### Update board label name purple

```php
$result = $client->updateBoardLabelNamePurple($boardId, $attributes);
```
#### Update board label name red

```php
$result = $client->updateBoardLabelNameRed($boardId, $attributes);
```
#### Update board label name yellow

```php
$result = $client->updateBoardLabelNameYellow($boardId, $attributes);
```

#### Get board custom fields

```php
$result = $client->getBoardCustomFields($boardId);
```

#### Get board labels

```php
$result = $client->getBoardLabels($boardId);
```
#### Add board label

```php
$result = $client->addBoardLabel($boardId, $attributes);
```
#### Get board label

```php
$result = $client->getBoardLabel($boardId, $labelId);
```
#### Get board lists

```php
$result = $client->getBoardLists($boardId);
```
#### Add board list

```php
$result = $client->addBoardList($boardId, $attributes);
```
#### Get board list

```php
$result = $client->getBoardList($boardId, $listId);
```
#### Add board mark as viewed

```php
$result = $client->addBoardMarkAsViewed($boardId, $attributes);
```
#### Get board members

```php
$result = $client->getBoardMembers($boardId);
```
#### Update board members

```php
$result = $client->updateBoardMembers($boardId, $attributes);
```
#### Delete board member

```php
$result = $client->deleteBoardMember($boardId, $memberId);
```
#### Get board member

```php
$result = $client->getBoardMember($boardId, $memberId);
```
#### Update board member

```php
$result = $client->updateBoardMember($boardId, $memberId, $attributes);
```
#### Get board member cards

```php
$result = $client->getBoardMemberCards($boardId, $memberId);
```
#### Get board memberships

```php
$result = $client->getBoardMemberships($boardId);
```
#### Get board membership

```php
$result = $client->getBoardMembership($boardId, $membershipId);
```
#### Update board membership

```php
$result = $client->updateBoardMembership($boardId, $membershipId, $attributes);
```
#### Get board members inviteds

```php
$result = $client->getBoardMembersInviteds($boardId);
```
#### Get board members invited

```php
$result = $client->getBoardMembersInvited($boardId, $membersInvitedId);
```
#### Get board my pref

```php
$result = $client->getBoardMyPref($boardId);
```
#### Update board my pref email position

```php
$result = $client->updateBoardMyPrefEmailPosition($boardId, $attributes);
```
#### Update board my pref id email list

```php
$result = $client->updateBoardMyPrefIdEmailList($boardId, $attributes);
```
#### Update board my pref show list guide

```php
$result = $client->updateBoardMyPrefShowListGuide($boardId, $attributes);
```
#### Update board my pref show sidebar

```php
$result = $client->updateBoardMyPrefShowSidebar($boardId, $attributes);
```
#### Update board my pref show sidebar activity

```php
$result = $client->updateBoardMyPrefShowSidebarActivity($boardId, $attributes);
```
#### Update board my pref show sidebar board action

```php
$result = $client->updateBoardMyPrefShowSidebarBoardAction($boardId, $attributes);
```
#### Update board my pref show sidebar member

```php
$result = $client->updateBoardMyPrefShowSidebarMember($boardId, $attributes);
```
#### Update board name

```php
$result = $client->updateBoardName($boardId, $attributes);
```
#### Get board organization

```php
$result = $client->getBoardOrganization($boardId);
```
#### Get board organization field

```php
$result = $client->getBoardOrganizationField($boardId, $fieldName);
```
#### Add board power up

```php
$result = $client->addBoardPowerUp($boardId, $attributes);
```
#### Delete board power up

```php
$result = $client->deleteBoardPowerUp($boardId, $powerUpId);
```
#### Update board pref background

```php
$result = $client->updateBoardPrefBackground($boardId, $attributes);
```
#### Update board pref calendar feed enabled

```php
$result = $client->updateBoardPrefCalendarFeedEnabled($boardId, $attributes);
```
#### Update board pref card aging

```php
$result = $client->updateBoardPrefCardAging($boardId, $attributes);
```
#### Update board pref card covers

```php
$result = $client->updateBoardPrefCardCovers($boardId, $attributes);
```
#### Update board pref comment

```php
$result = $client->updateBoardPrefComment($boardId, $attributes);
```
#### Update board pref invitation

```php
$result = $client->updateBoardPrefInvitation($boardId, $attributes);
```
#### Update board pref permission level

```php
$result = $client->updateBoardPrefPermissionLevel($boardId, $attributes);
```
#### Update board pref self join

```php
$result = $client->updateBoardPrefSelfJoin($boardId, $attributes);
```
#### Update board pref voting

```php
$result = $client->updateBoardPrefVoting($boardId, $attributes);
```
#### Update board subscribed

```php
$result = $client->updateBoardSubscribed($boardId, $attributes);
```

### Cards

#### Add card

```php
$result = $client->addCard($attributes);
```
#### Delete card

```php
$result = $client->deleteCard($cardId);
```
#### Get card

```php
$result = $client->getCard($cardId);
```
#### Update card

```php
$result = $client->updateCard($cardId, $attributes);
```
#### Get card field

```php
$result = $client->getCardField($cardId, $fieldName);
```
#### Get card action

```php
$result = $client->getCardAction($cardId);
```
#### Delete card action comment

```php
$result = $client->deleteCardActionComment($cardId, $actionId);
```
#### Update card action comments

```php
$result = $client->updateCardActionComments($cardId, $actionId, $attributes);
```
#### Add card action comment

```php
$result = $client->addCardActionComment($cardId, $attributes);
```
#### Get card attachments

```php
$result = $client->getCardAttachments($cardId);
```
#### Add card attachment

```php
$attributes = [
    'name' => 'Cheddar Bo is delicious!',
    'file' => fopen('/path/to/cheddar-bo.jpg', 'r'),
    'mimeType' => 'image/jpeg',
    'url' => null
];

$result = $client->addCardAttachment($cardId, $attributes);
```
#### Delete card attachment

```php
$result = $client->deleteCardAttachment($cardId, $attachmentId);
```
#### Get card attachment

```php
$result = $client->getCardAttachment($cardId, $attachmentId);
```
#### Get card board

```php
$result = $client->getCardBoard($cardId);
```
#### Get card board field

```php
$result = $client->getCardBoardField($cardId, $fieldName);
```
#### Get card check item state

```php
$result = $client->getCardCheckItemState($cardId);
```
#### Add card checklist check item

```php
$result = $client->addCardChecklistCheckItem($cardId, $checklistId, $attributes);
```
#### Delete card checklist check item

```php
$result = $client->deleteCardChecklistCheckItem($cardId, $checklistId, $checkItemId);
```
#### Update card checklist check item

```php
$result = $client->updateCardChecklistCheckItem($cardId, $checklistId, $checkItemId, $attributes);
```
#### Add card checklist check item convert to card

```php
$result = $client->addCardChecklistCheckItemConvertToCard($cardId, $checklistId, $checkItemId, $attributes);
```
#### Update card checklist check item name

```php
$result = $client->updateCardChecklistCheckItemName($cardId, $checklistId, $checkItemId, $attributes);
```
#### Update card checklist check item pos

```php
$result = $client->updateCardChecklistCheckItemPos($cardId, $checklistId, $checkItemId, $attributes);
```
#### Update card checklist check item state

```php
$result = $client->updateCardChecklistCheckItemState($cardId, $checklistId, $checkItemId, $attributes);
```
#### Get card checklists

```php
$result = $client->getCardChecklists($cardId);
```
#### Add card checklist

```php
$result = $client->addCardChecklist($cardId, $attributes);
```
#### Delete card checklist

```php
$result = $client->deleteCardChecklist($cardId, $checklistId);
```

#### Get card custom field

```php
$result = $client->getCardCustomField($cardId, $customFieldId);
```

#### Update card custom field

```php
$result = $client->updateCardCustomField($cardId, $customFieldId, $attributes);
```

#### Update card closed

```php
$result = $client->updateCardClosed($cardId, $attributes);
```
#### Update card desc

```php
$result = $client->updateCardDesc($cardId, $attributes);
```
#### Update card due

```php
$result = $client->updateCardDue($cardId, $attributes);
```
#### Update card id attachment cover

```php
$result = $client->updateCardIdAttachmentCover($cardId, $attributes);
```
#### Update card id board

```php
$result = $client->updateCardIdBoard($cardId, $attributes);
```
#### Add card id label

```php
$result = $client->addCardIdLabel($cardId, $attributes);
```
#### Delete card id label

```php
$result = $client->deleteCardIdLabel($cardId, $idLabelId);
```
#### Update card id list

```php
$result = $client->updateCardIdList($cardId, $attributes);
```
#### Add card id member

```php
$result = $client->addCardIdMember($cardId, $attributes);
```
#### Update card id members

```php
$result = $client->updateCardIdMembers($cardId, $attributes);
```
#### Delete card id member

```php
$result = $client->deleteCardIdMember($cardId, $idMemberId);
```
#### Add card label

```php
$result = $client->addCardLabel($cardId, $attributes);
```
#### Update card label

```php
$result = $client->updateCardLabel($cardId, $attributes);
```
#### Delete card label

```php
$result = $client->deleteCardLabel($cardId, $labelId);
```
#### Get card list

```php
$result = $client->getCardList($cardId);
```
#### Get card list field

```php
$result = $client->getCardListField($cardId, $fieldName);
```
#### Add card mark associated notifications read

```php
$result = $client->addCardMarkAssociatedNotificationsRead($cardId, $attributes);
```
#### Get card members

```php
$result = $client->getCardMembers($cardId);
```
#### Get card members voted

```php
$result = $client->getCardMembersVoted($cardId);
```
#### Add card members voted

```php
$result = $client->addCardMembersVoted($cardId, $attributes);
```
#### Delete card members voted

```php
$result = $client->deleteCardMembersVoted($cardId, $membersVotedId);
```
#### Update card name

```php
$result = $client->updateCardName($cardId, $attributes);
```
#### Update card pos

```php
$result = $client->updateCardPos($cardId, $attributes);
```
#### Get card stickers

```php
$result = $client->getCardStickers($cardId);
```
#### Add card sticker

```php
$result = $client->addCardSticker($cardId, $attributes);
```
#### Delete card sticker

```php
$result = $client->deleteCardSticker($cardId, $stickerId);
```
#### Get card sticker

```php
$result = $client->getCardSticker($cardId, $stickerId);
```
#### Update card sticker

```php
$result = $client->updateCardSticker($cardId, $stickerId, $attributes);
```
#### Update card subscribed

```php
$result = $client->updateCardSubscribed($cardId, $attributes);
```

### Checklists

#### Add checklist

```php
$result = $client->addChecklist($attributes);
```
#### Delete checklist

```php
$result = $client->deleteChecklist($checklistId);
```
#### Get checklist

```php
$result = $client->getChecklist($checklistId);
```
#### Update checklist

```php
$result = $client->updateChecklist($checklistId, $attributes);
```
#### Get checklist field

```php
$result = $client->getChecklistField($checklistId, $fieldName);
```
#### Get checklist board

```php
$result = $client->getChecklistBoard($checklistId);
```
#### Get checklist board field

```php
$result = $client->getChecklistBoardField($checklistId, $fieldName);
```
#### Get checklist cards

```php
$result = $client->getChecklistCards($checklistId);
```
#### Get checklist card

```php
$result = $client->getChecklistCard($checklistId, $cardId);
```
#### Get checklist check items

```php
$result = $client->getChecklistCheckItems($checklistId);
```
#### Add checklist check item

```php
$result = $client->addChecklistCheckItem($checklistId, $attributes);
```
#### Delete checklist check item

```php
$result = $client->deleteChecklistCheckItem($checklistId, $checkItemId);
```
#### Get checklist check item

```php
$result = $client->getChecklistCheckItem($checklistId, $checkItemId);
```
#### Update checklist id card

```php
$result = $client->updateChecklistIdCard($checklistId, $attributes);
```
#### Update checklist name

```php
$result = $client->updateChecklistName($checklistId, $attributes);
```
#### Update checklist pos

```php
$result = $client->updateChecklistPos($checklistId, $attributes);
```
### CustomFields

#### Create custom field

```php
$result = $client->addCustomField($attributes);
```

#### Add option to a custom field

```php
$result = $client->addCustomFieldOption($customFieldId, $attributes);
```

#### Update custom field option

```php
$result = $client->updateCustomFieldOption($customFieldId, $optionId, $attributes);
```

#### Delete custom field

```php
$result = $client->deleteCustomField($customFieldId);
```

### Labels

#### Add label

```php
$result = $client->addLabel($attributes);
```
#### Delete label

```php
$result = $client->deleteLabel($labelId);
```
#### Get label

```php
$result = $client->getLabel($labelId);
```
#### Update label

```php
$result = $client->updateLabel($labelId, $attributes);
```
#### Get label board

```php
$result = $client->getLabelBoard($labelId);
```
#### Get label board field

```php
$result = $client->getLabelBoardField($labelId, $fieldName);
```
#### Update label color

```php
$result = $client->updateLabelColor($labelId, $attributes);
```
#### Update label name

```php
$result = $client->updateLabelName($labelId, $attributes);
```

### Lists

#### Add list

```php
$result = $client->addList($attributes);
```
#### Get list

```php
$result = $client->getList($listId);
```
#### Update list

```php
$result = $client->updateList($listId, $attributes);
```
#### Get list field

```php
$result = $client->getListField($listId, $fieldName);
```
#### Get list actions

```php
$result = $client->getListActions($listId, $attributes);
```
#### Add list archive all cards

```php
$result = $client->addListArchiveAllCards($listId, $attributes);
```
#### Get list board

```php
$result = $client->getListBoard($listId);
```
#### Get list board field

```php
$result = $client->getListBoardField($listId, $fieldName);
```
#### Get list cards

```php
$result = $client->getListCards($listId);
```
#### Add list card

```php
$result = $client->addListCard($listId, $attributes);
```
#### Get list card

```php
$result = $client->getListCard($listId, $cardId);
```
#### Update list closed

```php
$result = $client->updateListClosed($listId, $attributes);
```
#### Update list id board

```php
$result = $client->updateListIdBoard($listId, $attributes);
```
#### Add list move all cards

```php
$result = $client->addListMoveAllCards($listId, $attributes);
```
#### Update list name

```php
$result = $client->updateListName($listId, $attributes);
```
#### Update list pos

```php
$result = $client->updateListPos($listId, $attributes);
```
#### Update list subscribed

```php
$result = $client->updateListSubscribed($listId, $attributes);
```

### Members

#### Get member

```php
$result = $client->getMember($memberId);
```
#### Update member

```php
$result = $client->updateMember($memberId, $attributes);
```
#### Get member field

```php
$result = $client->getMemberField($memberId, $fieldName);
```
#### Get member actions

```php
$result = $client->getMemberActions($memberId, $attributes);
```
#### Add member avatar

```php
$result = $client->addMemberAvatar($memberId, $attributes);
```
#### Update member avatar source

```php
$result = $client->updateMemberAvatarSource($memberId, $attributes);
```
#### Update member bio

```php
$result = $client->updateMemberBio($memberId, $attributes);
```
#### Get member board backgrounds

```php
$result = $client->getMemberBoardBackgrounds($memberId);
```
#### Add member board background

```php
$result = $client->addMemberBoardBackground($memberId, $attributes);
```
#### Delete member board background

```php
$result = $client->deleteMemberBoardBackground($memberId, $boardBackgroundId);
```
#### Get member board background

```php
$result = $client->getMemberBoardBackground($memberId, $boardBackgroundId);
```
#### Update member board background

```php
$result = $client->updateMemberBoardBackground($memberId, $boardBackgroundId, $attributes);
```
#### Get member boards

```php
$result = $client->getMemberBoards($memberId);
```
#### Get member board

```php
$result = $client->getMemberBoard($memberId, $boardId);
```
#### Get member boards invited

```php
$result = $client->getMemberBoardsInvited($memberId);
```
#### Get member boards invited field

```php
$result = $client->getMemberBoardsInvitedField($memberId, $fieldName);
```
#### Get member board stars

```php
$result = $client->getMemberBoardStars($memberId);
```
#### Add member board star

```php
$result = $client->addMemberBoardStar($memberId, $attributes);
```
#### Delete member board star

```php
$result = $client->deleteMemberBoardStar($memberId, $boardStarId);
```
#### Get member board star

```php
$result = $client->getMemberBoardStar($memberId, $boardStarId);
```
#### Update member board star

```php
$result = $client->updateMemberBoardStar($memberId, $boardStarId, $attributes);
```
#### Update member board star id board

```php
$result = $client->updateMemberBoardStarIdBoard($memberId, $boardStarId, $attributes);
```
#### Update member board star pos

```php
$result = $client->updateMemberBoardStarPos($memberId, $boardStarId, $attributes);
```
#### Get member cards

```php
$result = $client->getMemberCards($memberId);
```
#### Get member card

```php
$result = $client->getMemberCard($memberId, $cardId);
```
#### Get member custom board backgrounds

```php
$result = $client->getMemberCustomBoardBackgrounds($memberId);
```
#### Add member custom board background

```php
$result = $client->addMemberCustomBoardBackground($memberId, $attributes);
```
#### Delete member custom board background

```php
$result = $client->deleteMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```
#### Get member custom board background

```php
$result = $client->getMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```
#### Update member custom board background

```php
$result = $client->updateMemberCustomBoardBackground($memberId, $customBoardBackgroundId, $attributes);
```
#### Get member custom emojis

```php
$result = $client->getMemberCustomEmojis($memberId);
```
#### Add member custom emoji

```php
$result = $client->addMemberCustomEmoji($memberId, $attributes);
```
#### Get member custom emoji

```php
$result = $client->getMemberCustomEmoji($memberId, $customEmojiId);
```
#### Get member custom stickers

```php
$result = $client->getMemberCustomStickers($memberId);
```
#### Add member custom sticker

```php
$result = $client->addMemberCustomSticker($memberId, $attributes);
```
#### Delete member custom sticker

```php
$result = $client->deleteMemberCustomSticker($memberId, $customStickerId);
```
#### Get member custom sticker

```php
$result = $client->getMemberCustomSticker($memberId, $customStickerId);
```
#### Get member deltas

```php
$result = $client->getMemberDeltas($memberId);
```
#### Update member full name

```php
$result = $client->updateMemberFullName($memberId, $attributes);
```
#### Update member initials

```php
$result = $client->updateMemberInitials($memberId, $attributes);
```
#### Get member notifications

```php
$result = $client->getMemberNotifications($memberId);
```
#### Get member notification

```php
$result = $client->getMemberNotification($memberId, $notificationId);
```
#### Add member one time messages dismissed

```php
$result = $client->addMemberOneTimeMessagesDismissed($memberId, $attributes);
```
#### Get member organizations

```php
$result = $client->getMemberOrganizations($memberId);
```
#### Get member organization

```php
$result = $client->getMemberOrganization($memberId, $organizationId);
```
#### Get member organizations invited

```php
$result = $client->getMemberOrganizationsInvited($memberId);
```
#### Get member organizations invited field

```php
$result = $client->getMemberOrganizationsInvitedField($memberId, $fieldName);
```
#### Update member pref color blind

```php
$result = $client->updateMemberPrefColorBlind($memberId, $attributes);
```
#### Update member pref minutes between summaries

```php
$result = $client->updateMemberPrefMinutesBetweenSummaries($memberId, $attributes);
```
#### Get member saved searches

```php
$result = $client->getMemberSavedSearches($memberId);
```
#### Add member saved search

```php
$result = $client->addMemberSavedSearch($memberId, $attributes);
```
#### Delete member saved search

```php
$result = $client->deleteMemberSavedSearch($memberId, $savedSearcheId);
```
#### Get member saved search

```php
$result = $client->getMemberSavedSearch($memberId, $savedSearcheId);
```
#### Update member saved search

```php
$result = $client->updateMemberSavedSearch($memberId, $savedSearcheId, $attributes);
```
#### Update member saved search name

```php
$result = $client->updateMemberSavedSearchName($memberId, $savedSearcheId, $attributes);
```
#### Update member saved search pos

```php
$result = $client->updateMemberSavedSearchPos($memberId, $savedSearcheId, $attributes);
```
#### Update member saved search query

```php
$result = $client->updateMemberSavedSearchQuery($memberId, $savedSearcheId, $attributes);
```
#### Get member tokens

```php
$result = $client->getMemberTokens($memberId);
```
#### Update member username

```php
$result = $client->updateMemberUsername($memberId, $attributes);
```

### Notifications

#### Get notification

```php
$result = $client->getNotification($notificationId);
```
#### Update notification

```php
$result = $client->updateNotification($notificationId, $attributes);
```
#### Get notification field

```php
$result = $client->getNotificationField($notificationId, $fieldName);
```
#### Get notification board

```php
$result = $client->getNotificationBoard($notificationId);
```
#### Get notification board field

```php
$result = $client->getNotificationBoardField($notificationId, $fieldName);
```
#### Get notification card

```php
$result = $client->getNotificationCard($notificationId);
```
#### Get notification card field

```php
$result = $client->getNotificationCardField($notificationId, $fieldName);
```
#### Get notification entities

```php
$result = $client->getNotificationEntities($notificationId);
```
#### Get notification list

```php
$result = $client->getNotificationList($notificationId);
```
#### Get notification list field

```php
$result = $client->getNotificationListField($notificationId, $fieldName);
```
#### Get notification member

```php
$result = $client->getNotificationMember($notificationId);
```
#### Get notification member field

```php
$result = $client->getNotificationMemberField($notificationId, $fieldName);
```
#### Get notification member creator

```php
$result = $client->getNotificationMemberCreator($notificationId);
```
#### Get notification member creator field

```php
$result = $client->getNotificationMemberCreatorField($notificationId, $fieldName);
```
#### Get notification organization

```php
$result = $client->getNotificationOrganization($notificationId);
```
#### Get notification organization field

```php
$result = $client->getNotificationOrganizationField($notificationId, $fieldName);
```
#### Update notification unread

```php
$result = $client->updateNotificationUnread($notificationId, $attributes);
```
#### Add notification all read

```php
$result = $client->addNotificationAllRead($attributes);
```

### Organizations

#### Add organization

```php
$result = $client->addOrganization($attributes);
```
#### Delete organization

```php
$result = $client->deleteOrganization($organizationId);
```
#### Get organization

```php
$result = $client->getOrganization($organizationId);
```
#### Update organization

```php
$result = $client->updateOrganization($organizationId, $attributes);
```
#### Get organization field

```php
$result = $client->getOrganizationField($organizationId, $fieldName);
```
#### Get organization actions

```php
$result = $client->getOrganizationActions($organizationId, $attributes);
```
#### Get organization boards

```php
$result = $client->getOrganizationBoards($organizationId);
```
#### Get organization boards filter

```php
$result = $client->getOrganizationBoardsFilter($organizationId, $filter);
```
#### Get organization deltas

```php
$result = $client->getOrganizationDeltas($organizationId);
```
#### Update organization desc

```php
$result = $client->updateOrganizationDesc($organizationId, $attributes);
```
#### Update organization display name

```php
$result = $client->updateOrganizationDisplayName($organizationId, $attributes);
```
#### Delete organization logo

```php
$result = $client->deleteOrganizationLogo($organizationId);
```
#### Add organization logo

```php
$result = $client->addOrganizationLogo($organizationId, $attributes);
```
#### Get organization members

```php
$result = $client->getOrganizationMembers($organizationId);
```
#### Update organization members

```php
$result = $client->updateOrganizationMembers($organizationId, $attributes);
```
#### Delete organization member

```php
$result = $client->deleteOrganizationMember($organizationId, $memberId);
```
#### Get organization members filter

```php
$result = $client->getOrganizationMembersFilter($organizationId, $filter);
```
#### Update organization member

```php
$result = $client->updateOrganizationMember($organizationId, $memberId, $attributes);
```
#### Delete organization member all

```php
$result = $client->deleteOrganizationMemberAll($organizationId, $memberId);
```
#### Get organization member cards

```php
$result = $client->getOrganizationMemberCards($organizationId, $memberId);
```
#### Update organization member deactivated

```php
$result = $client->updateOrganizationMemberDeactivated($organizationId, $memberId, $attributes);
```
#### Get organization memberships

```php
$result = $client->getOrganizationMemberships($organizationId);
```
#### Get organization membership

```php
$result = $client->getOrganizationMembership($organizationId, $membershipId);
```
#### Update organization membership

```php
$result = $client->updateOrganizationMembership($organizationId, $membershipId, $attributes);
```
#### Get organization members invited

```php
$result = $client->getOrganizationMembersInvited($organizationId);
```
#### Get organization members invited field

```php
$result = $client->getOrganizationMembersInvitedField($organizationId, $fieldName);
```
#### Update organization name

```php
$result = $client->updateOrganizationName($organizationId, $attributes);
```
#### Delete organization pref associated domain

```php
$result = $client->deleteOrganizationPrefAssociatedDomain($organizationId);
```
#### Update organization pref associated domain

```php
$result = $client->updateOrganizationPrefAssociatedDomain($organizationId, $attributes);
```
#### Update organization pref board visibility restrict org

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictOrg($organizationId, $attributes);
```
#### Update organization pref board visibility restrict private

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPrivate($organizationId, $attributes);
```
#### Update organization pref board visibility restrict public

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPublic($organizationId, $attributes);
```
#### Update organization pref external members disabled

```php
$result = $client->updateOrganizationPrefExternalMembersDisabled($organizationId, $attributes);
```
#### Update organization pref google apps version

```php
$result = $client->updateOrganizationPrefGoogleAppsVersion($organizationId, $attributes);
```
#### Delete organization pref org invite restrict

```php
$result = $client->deleteOrganizationPrefOrgInviteRestrict($organizationId);
```
#### Update organization pref org invite restrict

```php
$result = $client->updateOrganizationPrefOrgInviteRestrict($organizationId, $attributes);
```
#### Update organization pref permission level

```php
$result = $client->updateOrganizationPrefPermissionLevel($organizationId, $attributes);
```
#### Update organization website

```php
$result = $client->updateOrganizationWebsite($organizationId, $attributes);
```

### Search

#### Get search

```php
$result = $client->getSearch($attributes);
```
#### Get search member

```php
$result = $client->getSearchMembers($attributes);
```

### Sessions

#### Add session

```php
$result = $client->addSession($attributes);
```
#### Update session

```php
$result = $client->updateSession($sessionId, $attributes);
```
#### Update session status

```php
$result = $client->updateSessionStatus($sessionId, $attributes);
```
#### Get session socket

```php
$result = $client->getSessionSocket();
```

### Tokens

#### Delete token

```php
$result = $client->deleteToken($tokenId);
```
#### Get token

```php
$result = $client->getToken($tokenId);
```
#### Get token field

```php
$result = $client->getTokenField($tokenId, $fieldName);
```
#### Get token member

```php
$result = $client->getTokenMember($tokenId);
```
#### Get token member field

```php
$result = $client->getTokenMemberField($tokenId, $fieldName);
```
#### Get token webhooks

```php
$result = $client->getTokenWebhooks($tokenId);
```
#### Add token webhook

```php
$result = $client->addTokenWebhook($tokenId, $attributes);
```
#### Update token webhooks

```php
$result = $client->updateTokenWebhooks($tokenId, $attributes);
```
#### Delete token webhook

```php
$result = $client->deleteTokenWebhook($tokenId, $webhookId);
```
#### Get token webhook

```php
$result = $client->getTokenWebhook($tokenId, $webhookId);
```

### Types

#### Get type

```php
$result = $client->getType($typeId);
```

### Webhooks

#### Add webhook

```php
$result = $client->addWebhook($attributes);
```
#### Delete webhook

```php
$result = $client->deleteWebhook($webhookId);
```
#### Get webhook

```php
$result = $client->getWebhook($webhookId);
```
#### Update webhook

```php
$result = $client->updateWebhook($webhookId, $attributes);
```
#### Get webhook field

```php
$result = $client->getWebhookField($webhookId, $fieldName);
```
#### Update webhook active

```php
$result = $client->updateWebhookActive($webhookId, $attributes);
```
#### Update webhook callback

```php
$result = $client->updateWebhookCallbackURL($webhookId, $attributes);
```
#### Update webhook description

```php
$result = $client->updateWebhookDescription($webhookId, $attributes);
```
#### Update webhook id model

```php
$result = $client->updateWebhookIdModel($webhookId, $attributes);
```
