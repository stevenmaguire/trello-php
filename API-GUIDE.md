# Trello PHP

## Access the API

### Users

#### Get Current User

```php
$result = $client->getCurrentUser();
```

API Signature:
```php
'getCurrentUser' => ['get', 'members/me']
```

#### Current User Boards

```php
$result = $client->getCurrentUserBoards();
```

API Signature:
```php
'getCurrentUserBoards' => ['get', 'members/my/boards']
```

#### Get Current User Pinned Boards

```php
$result = $client->getCurrentUserPinnedBoards();
```

API Signature:
```php
'getCurrentUserPinnedBoards' => ['get', 'members/my/boards/pinned']
```

#### Get Current User Cards

```php
$result = $client->getCurrentUserCards();
```

API Signature:
```php
'getCurrentUserCards' => ['get', 'members/my/cards']
```

#### Get Current User Organizations

```php
$result = $client->getCurrentUserOrganizations();
```

API Signature:
```php
'getCurrentUserOrganizations' => ['get', 'members/my/organizations']
```

### Actions

#### Delete action

```php
$result = $client->deleteAction($actionId);
```

API Signature:
```php
'deleteAction' => ['delete', 'actions/%s']
```
#### Get action

```php
$result = $client->getAction($actionId);
```

API Signature:
```php
'getAction' => ['get', 'actions/%s']
```
#### Update action

```php
$result = $client->updateAction($actionId, $attributes);
```

API Signature:
```php
'updateAction' => ['put', 'actions/%s']
```
#### Get action field

```php
$result = $client->getActionField($actionId, $fieldName);
```

API Signature:
```php
'getActionField' => ['get', 'actions/%s/%s']
```
#### Get action board

```php
$result = $client->getActionBoard($actionId);
```

API Signature:
```php
'getActionBoard' => ['get', 'actions/%s/board']
```
#### Get action board field

```php
$result = $client->getActionBoardField($actionId, $fieldName);
```

API Signature:
```php
'getActionBoardField' => ['get', 'actions/%s/board/%s']
```
#### Get action card

```php
$result = $client->getActionCard($actionId);
```

API Signature:
```php
'getActionCard' => ['get', 'actions/%s/card']
```
#### Get action card field

```php
$result = $client->getActionCardField($actionId, $fieldName);
```

API Signature:
```php
'getActionCardField' => ['get', 'actions/%s/card/%s']
```
#### Get action entities

```php
$result = $client->getActionEntities($actionId);
```

API Signature:
```php
'getActionEntities' => ['get', 'actions/%s/entities']
```
#### Get action list

```php
$result = $client->getActionList($actionId);
```

API Signature:
```php
'getActionList' => ['get', 'actions/%s/list']
```
#### Get action list field

```php
$result = $client->getActionListField($actionId, $fieldName);
```

API Signature:
```php
'getActionListField' => ['get', 'actions/%s/list/%s']
```
#### Get action member

```php
$result = $client->getActionMember($actionId);
```

API Signature:
```php
'getActionMember' => ['get', 'actions/%s/member']
```
#### Get action member field

```php
$result = $client->getActionMemberField($actionId, $fieldName);
```

API Signature:
```php
'getActionMemberField' => ['get', 'actions/%s/member/%s']
```
#### Get action member creator

```php
$result = $client->getActionMemberCreator($actionId);
```

API Signature:
```php
'getActionMemberCreator' => ['get', 'actions/%s/memberCreator']
```
#### Get action member creator field

```php
$result = $client->getActionMemberCreatorField($actionId, $fieldName);
```

API Signature:
```php
'getActionMemberCreatorField' => ['get', 'actions/%s/memberCreator/%s']
```
#### Get action organization

```php
$result = $client->getActionOrganization($actionId);
```

API Signature:
```php
'getActionOrganization' => ['get', 'actions/%s/organization']
```
#### Get action organization field

```php
$result = $client->getActionOrganizationField($actionId, $fieldName);
```

API Signature:
```php
'getActionOrganizationField' => ['get', 'actions/%s/organization/%s']
```
#### Update action text

```php
$result = $client->updateActionText($actionId, $attributes);
```

API Signature:
```php
'updateActionText' => ['put', 'actions/%s/text']
```

### Authorization

#### Get authorize

```php
$result = $client->getAuthorize($attributes);
```

API Signature:
```php
'getAuthorize' => ['get', 'authorize']
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

API Signature:
```php
'getToken' => ['get', 'tokens/%s']
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

API Signature:
```php
'getBatch' => ['get', 'batch']
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

API Signature:
```php
'addBoard' => ['post', 'boards']
```
#### Get board

```php
$result = $client->getBoard($boardId);
```

API Signature:
```php
'getBoard' => ['get', 'boards/%s']
```
#### Update board

```php
$result = $client->updateBoard($boardId, $attributes);
```

API Signature:
```php
'updateBoard' => ['put', 'boards/%s']
```
#### Get board field

```php
$result = $client->getBoardField($boardId, $fieldName);
```

API Signature:
```php
'getBoardField' => ['get', 'boards/%s/%s']
```
#### Get board actions

```php
$result = $client->getBoardActions($boardId, $attributes);
```

API Signature:
```php
'getBoardActions' => ['get', 'boards/%s/actions']
```
#### Get board board stars

```php
$result = $client->getBoardBoardStars($boardId);
```

API Signature:
```php
'getBoardBoardStars' => ['get', 'boards/%s/boardStars']
```
#### Add board calendar key generate

```php
$result = $client->addBoardCalendarKeyGenerate($boardId, $attributes);
```

API Signature:
```php
'addBoardCalendarKeyGenerate' => ['post', 'boards/%s/calendarKey/generate']
```
#### Get board cards

```php
$result = $client->getBoardCards($boardId);
```

API Signature:
```php
'getBoardCards' => ['get', 'boards/%s/cards']
```
#### Get board card

```php
$result = $client->getBoardCard($boardId, $cardId);
```

API Signature:
```php
'getBoardCard' => ['get', 'boards/%s/cards/%s']
```
#### Get board cards with filter

```php
$result = $client->getBoardCardsWithFilter($boardId, $filter);
```

API Signature:
```php
'getBoardCardsWithFilter' => ['get', 'boards/%s/cards/%s']
```
#### Get board checklists

```php
$result = $client->getBoardChecklists($boardId);
```

API Signature:
```php
'getBoardChecklists' => ['get', 'boards/%s/checklists']
```
#### Add board checklist

```php
$result = $client->addBoardChecklist($boardId, $attributes);
```

API Signature:
```php
'addBoardChecklist' => ['post', 'boards/%s/checklists']
```
#### Update board closed

```php
$result = $client->updateBoardClosed($boardId, $attributes);
```

API Signature:
```php
'updateBoardClosed' => ['put', 'boards/%s/closed']
```
#### Get board deltas

```php
$result = $client->getBoardDeltas($boardId);
```

API Signature:
```php
'getBoardDeltas' => ['get', 'boards/%s/deltas']
```
#### Update board desc

```php
$result = $client->updateBoardDesc($boardId, $attributes);
```

API Signature:
```php
'updateBoardDesc' => ['put', 'boards/%s/desc']
```
#### Add board email key generate

```php
$result = $client->addBoardEmailKeyGenerate($boardId, $attributes);
```

API Signature:
```php
'addBoardEmailKeyGenerate' => ['post', 'boards/%s/emailKey/generate']
```
#### Update board id organization

```php
$result = $client->updateBoardIdOrganization($boardId, $attributes);
```

API Signature:
```php
'updateBoardIdOrganization' => ['put', 'boards/%s/idOrganization']
```
#### Update board label name blue

```php
$result = $client->updateBoardLabelNameBlue($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNameBlue' => ['put', 'boards/%s/labelNames/blue']
```
#### Update board label name green

```php
$result = $client->updateBoardLabelNameGreen($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNameGreen' => ['put', 'boards/%s/labelNames/green']
```
#### Update board label name orange

```php
$result = $client->updateBoardLabelNameOrange($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNameOrange' => ['put', 'boards/%s/labelNames/orange']
```
#### Update board label name purple

```php
$result = $client->updateBoardLabelNamePurple($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNamePurple' => ['put', 'boards/%s/labelNames/purple']
```
#### Update board label name red

```php
$result = $client->updateBoardLabelNameRed($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNameRed' => ['put', 'boards/%s/labelNames/red']
```
#### Update board label name yellow

```php
$result = $client->updateBoardLabelNameYellow($boardId, $attributes);
```

API Signature:
```php
'updateBoardLabelNameYellow' => ['put', 'boards/%s/labelNames/yellow']
```

#### Get board custom fields

```php
$result = $client->getBoardCustomFields($boardId);
```

API Signature:
```php
'getBoardCustomFields' => ['get', 'boards/%s/customFields']
```

#### Get board labels

```php
$result = $client->getBoardLabels($boardId);
```

API Signature:
```php
'getBoardLabels' => ['get', 'boards/%s/labels']
```
#### Add board label

```php
$result = $client->addBoardLabel($boardId, $attributes);
```

API Signature:
```php
'addBoardLabel' => ['post', 'boards/%s/labels']
```
#### Get board label

```php
$result = $client->getBoardLabel($boardId, $labelId);
```

API Signature:
```php
'getBoardLabel' => ['get', 'boards/%s/labels/%s']
```
#### Get board lists

```php
$result = $client->getBoardLists($boardId);
```

API Signature:
```php
'getBoardLists' => ['get', 'boards/%s/lists']
```
#### Add board list

```php
$result = $client->addBoardList($boardId, $attributes);
```

API Signature:
```php
'addBoardList' => ['post', 'boards/%s/lists']
```
#### Get board list

```php
$result = $client->getBoardList($boardId, $listId);
```

API Signature:
```php
'getBoardList' => ['get', 'boards/%s/lists/%s']
```
#### Add board mark as viewed

```php
$result = $client->addBoardMarkAsViewed($boardId, $attributes);
```

API Signature:
```php
'addBoardMarkAsViewed' => ['post', 'boards/%s/markAsViewed']
```
#### Get board members

```php
$result = $client->getBoardMembers($boardId);
```

API Signature:
```php
'getBoardMembers' => ['get', 'boards/%s/members']
```
#### Update board members

```php
$result = $client->updateBoardMembers($boardId, $attributes);
```

API Signature:
```php
'updateBoardMembers' => ['put', 'boards/%s/members']
```
#### Delete board member

```php
$result = $client->deleteBoardMember($boardId, $memberId);
```

API Signature:
```php
'deleteBoardMember' => ['delete', 'boards/%s/members/%s']
```
#### Get board member

```php
$result = $client->getBoardMember($boardId, $memberId);
```

API Signature:
```php
'getBoardMember' => ['get', 'boards/%s/members/%s']
```
#### Update board member

```php
$result = $client->updateBoardMember($boardId, $memberId, $attributes);
```

API Signature:
```php
'updateBoardMember' => ['put', 'boards/%s/members/%s']
```
#### Get board member cards

```php
$result = $client->getBoardMemberCards($boardId, $memberId);
```

API Signature:
```php
'getBoardMemberCards' => ['get', 'boards/%s/members/%s/cards']
```
#### Get board memberships

```php
$result = $client->getBoardMemberships($boardId);
```

API Signature:
```php
'getBoardMemberships' => ['get', 'boards/%s/memberships']
```
#### Get board membership

```php
$result = $client->getBoardMembership($boardId, $membershipId);
```

API Signature:
```php
'getBoardMembership' => ['get', 'boards/%s/memberships/%s']
```
#### Update board membership

```php
$result = $client->updateBoardMembership($boardId, $membershipId, $attributes);
```

API Signature:
```php
'updateBoardMembership' => ['put', 'boards/%s/memberships/%s']
```
#### Get board members inviteds

```php
$result = $client->getBoardMembersInviteds($boardId);
```

API Signature:
```php
'getBoardMembersInviteds' => ['get', 'boards/%s/membersInvited']
```
#### Get board members invited

```php
$result = $client->getBoardMembersInvited($boardId, $membersInvitedId);
```

API Signature:
```php
'getBoardMembersInvited' => ['get', 'boards/%s/membersInvited/%s']
```
#### Get board my pref

```php
$result = $client->getBoardMyPref($boardId);
```

API Signature:
```php
'getBoardMyPref' => ['get', 'boards/%s/myPrefs']
```
#### Update board my pref email position

```php
$result = $client->updateBoardMyPrefEmailPosition($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefEmailPosition' => ['put', 'boards/%s/myPrefs/emailPosition']
```
#### Update board my pref id email list

```php
$result = $client->updateBoardMyPrefIdEmailList($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefIdEmailList' => ['put', 'boards/%s/myPrefs/idEmailList']
```
#### Update board my pref show list guide

```php
$result = $client->updateBoardMyPrefShowListGuide($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefShowListGuide' => ['put', 'boards/%s/myPrefs/showListGuide']
```
#### Update board my pref show sidebar

```php
$result = $client->updateBoardMyPrefShowSidebar($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefShowSidebar' => ['put', 'boards/%s/myPrefs/showSidebar']
```
#### Update board my pref show sidebar activity

```php
$result = $client->updateBoardMyPrefShowSidebarActivity($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefShowSidebarActivity' => ['put', 'boards/%s/myPrefs/showSidebarActivity']
```
#### Update board my pref show sidebar board action

```php
$result = $client->updateBoardMyPrefShowSidebarBoardAction($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefShowSidebarBoardAction' => ['put', 'boards/%s/myPrefs/showSidebarBoardActions']
```
#### Update board my pref show sidebar member

```php
$result = $client->updateBoardMyPrefShowSidebarMember($boardId, $attributes);
```

API Signature:
```php
'updateBoardMyPrefShowSidebarMember' => ['put', 'boards/%s/myPrefs/showSidebarMembers']
```
#### Update board name

```php
$result = $client->updateBoardName($boardId, $attributes);
```

API Signature:
```php
'updateBoardName' => ['put', 'boards/%s/name']
```
#### Get board organization

```php
$result = $client->getBoardOrganization($boardId);
```

API Signature:
```php
'getBoardOrganization' => ['get', 'boards/%s/organization']
```
#### Get board organization field

```php
$result = $client->getBoardOrganizationField($boardId, $fieldName);
```

API Signature:
```php
'getBoardOrganizationField' => ['get', 'boards/%s/organization/%s']
```
#### Add board power up

```php
$result = $client->addBoardPowerUp($boardId, $attributes);
```

API Signature:
```php
'addBoardPowerUp' => ['post', 'boards/%s/powerUps']
```
#### Delete board power up

```php
$result = $client->deleteBoardPowerUp($boardId, $powerUpId);
```

API Signature:
```php
'deleteBoardPowerUp' => ['delete', 'boards/%s/powerUps/%s']
```
#### Update board pref background

```php
$result = $client->updateBoardPrefBackground($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefBackground' => ['put', 'boards/%s/prefs/background']
```
#### Update board pref calendar feed enabled

```php
$result = $client->updateBoardPrefCalendarFeedEnabled($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefCalendarFeedEnabled' => ['put', 'boards/%s/prefs/calendarFeedEnabled']
```
#### Update board pref card aging

```php
$result = $client->updateBoardPrefCardAging($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefCardAging' => ['put', 'boards/%s/prefs/cardAging']
```
#### Update board pref card covers

```php
$result = $client->updateBoardPrefCardCovers($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefCardCovers' => ['put', 'boards/%s/prefs/cardCovers']
```
#### Update board pref comment

```php
$result = $client->updateBoardPrefComment($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefComment' => ['put', 'boards/%s/prefs/comments']
```
#### Update board pref invitation

```php
$result = $client->updateBoardPrefInvitation($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefInvitation' => ['put', 'boards/%s/prefs/invitations']
```
#### Update board pref permission level

```php
$result = $client->updateBoardPrefPermissionLevel($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefPermissionLevel' => ['put', 'boards/%s/prefs/permissionLevel']
```
#### Update board pref self join

```php
$result = $client->updateBoardPrefSelfJoin($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefSelfJoin' => ['put', 'boards/%s/prefs/selfJoin']
```
#### Update board pref voting

```php
$result = $client->updateBoardPrefVoting($boardId, $attributes);
```

API Signature:
```php
'updateBoardPrefVoting' => ['put', 'boards/%s/prefs/voting']
```
#### Update board subscribed

```php
$result = $client->updateBoardSubscribed($boardId, $attributes);
```

API Signature:
```php
'updateBoardSubscribed' => ['put', 'boards/%s/subscribed']
```

### Cards

#### Add card

```php
$result = $client->addCard($attributes);
```

API Signature:
```php
'addCard' => ['post', 'cards']
```
#### Delete card

```php
$result = $client->deleteCard($cardId);
```

API Signature:
```php
'deleteCard' => ['delete', 'cards/%s']
```
#### Get card

```php
$result = $client->getCard($cardId);
```

API Signature:
```php
'getCard' => ['get', 'cards/%s']
```
#### Update card

```php
$result = $client->updateCard($cardId, $attributes);
```

API Signature:
```php
'updateCard' => ['put', 'cards/%s']
```
#### Get card field

```php
$result = $client->getCardField($cardId, $fieldName);
```

API Signature:
```php
'getCardField' => ['get', 'cards/%s/%s']
```
#### Get card action

```php
$result = $client->getCardAction($cardId);
```

API Signature:
```php
'getCardAction' => ['get', 'cards/%s/actions']
```
#### Delete card action comment

```php
$result = $client->deleteCardActionComment($cardId, $actionId);
```

API Signature:
```php
'deleteCardActionComment' => ['delete', 'cards/%s/actions/%s/comments']
```
#### Update card action comments

```php
$result = $client->updateCardActionComments($cardId, $actionId, $attributes);
```

API Signature:
```php
'updateCardActionComments' => ['put', 'cards/%s/actions/%s/comments']
```
#### Add card action comment

```php
$result = $client->addCardActionComment($cardId, $attributes);
```

API Signature:
```php
'addCardActionComment' => ['post', 'cards/%s/actions/comments']
```
#### Get card attachments

```php
$result = $client->getCardAttachments($cardId);
```

API Signature:
```php
'getCardAttachments' => ['get', 'cards/%s/attachments']
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

API Signature:
```php
'addCardAttachment' => ['post', 'cards/%s/attachments']
```
#### Delete card attachment

```php
$result = $client->deleteCardAttachment($cardId, $attachmentId);
```

API Signature:
```php
'deleteCardAttachment' => ['delete', 'cards/%s/attachments/%s']
```
#### Get card attachment

```php
$result = $client->getCardAttachment($cardId, $attachmentId);
```

API Signature:
```php
'getCardAttachment' => ['get', 'cards/%s/attachments/%s']
```
#### Get card board

```php
$result = $client->getCardBoard($cardId);
```

API Signature:
```php
'getCardBoard' => ['get', 'cards/%s/board']
```
#### Get card board field

```php
$result = $client->getCardBoardField($cardId, $fieldName);
```

API Signature:
```php
'getCardBoardField' => ['get', 'cards/%s/board/%s']
```
#### Get card check item state

```php
$result = $client->getCardCheckItemState($cardId);
```

API Signature:
```php
'getCardCheckItemState' => ['get', 'cards/%s/checkItemStates']
```
#### Add card checklist check item

```php
$result = $client->addCardChecklistCheckItem($cardId, $checklistId, $attributes);
```

API Signature:
```php
'addCardChecklistCheckItem' => ['post', 'cards/%s/checklist/%s/checkItem']
```
#### Delete card checklist check item

```php
$result = $client->deleteCardChecklistCheckItem($cardId, $checklistId, $checkItemId);
```

API Signature:
```php
'deleteCardChecklistCheckItem' => ['delete', 'cards/%s/checklist/%s/checkItem/%s']
```
#### Update card checklist check item

```php
$result = $client->updateCardChecklistCheckItem($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
```php
'updateCardChecklistCheckItem' => ['put', 'cards/%s/checklist/%s/checkItem/%s']
```
#### Add card checklist check item convert to card

```php
$result = $client->addCardChecklistCheckItemConvertToCard($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
```php
'addCardChecklistCheckItemConvertToCard' => ['post', 'cards/%s/checklist/%s/checkItem/%s/convertToCard']
```
#### Update card checklist check item name

```php
$result = $client->updateCardChecklistCheckItemName($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
```php
'updateCardChecklistCheckItemName' => ['put', 'cards/%s/checklist/%s/checkItem/%s/name']
```
#### Update card checklist check item pos

```php
$result = $client->updateCardChecklistCheckItemPos($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
```php
'updateCardChecklistCheckItemPos' => ['put', 'cards/%s/checklist/%s/checkItem/%s/pos']
```
#### Update card checklist check item state

```php
$result = $client->updateCardChecklistCheckItemState($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
```php
'updateCardChecklistCheckItemState' => ['put', 'cards/%s/checklist/%s/checkItem/%s/state']
```
#### Get card checklists

```php
$result = $client->getCardChecklists($cardId);
```

API Signature:
```php
'getCardChecklists' => ['get', 'cards/%s/checklists']
```
#### Add card checklist

```php
$result = $client->addCardChecklist($cardId, $attributes);
```

API Signature:
```php
'addCardChecklist' => ['post', 'cards/%s/checklists']
```
#### Delete card checklist

```php
$result = $client->deleteCardChecklist($cardId, $checklistId);
```

API Signature:
```php
'deleteCardChecklist' => ['delete', 'cards/%s/checklists/%s']
```

#### Get card custom field

```php
$result = $client->getCardCustomField($cardId, $customFieldId);
```

API Signature:
```php
'getCardCustomField' => ['get', 'cards/%s/customField/%s']
```

#### Update card custom field

```php
// Updating a checkbox:
$attributes = [
    'value' => ['checked' => 'true'] // or 'false'
];

// Updating a date:
$attributes = [
    'value' => ['date' => date('c', $the_date)]  // or date('c') for 'now'
];

// Updating a dropdown:
$attributes = [
    'idValue' => '<insert option id>'
];

// Updating a number:
$attributes = [
    'value' => ['number' => '<insert number as string>']
];

// Updating a text field:
$attributes = [
    'value' => ['text' => '<insert text>']
];

$result = $client->updateCardCustomField($cardId, $customFieldId, $attributes);
```

API Signature:
```php
'updateCardCustomField' => ['putAsBody', 'cards/%s/customField/%s/item']
```

#### Update card closed

```php
$result = $client->updateCardClosed($cardId, $attributes);
```

API Signature:
```php
'updateCardClosed' => ['put', 'cards/%s/closed']
```
#### Update card desc

```php
$result = $client->updateCardDesc($cardId, $attributes);
```

API Signature:
```php
'updateCardDesc' => ['put', 'cards/%s/desc']
```
#### Update card due

```php
$result = $client->updateCardDue($cardId, $attributes);
```

API Signature:
```php
'updateCardDue' => ['put', 'cards/%s/due']
```
#### Update card id attachment cover

```php
$result = $client->updateCardIdAttachmentCover($cardId, $attributes);
```

API Signature:
```php
'updateCardIdAttachmentCover' => ['put', 'cards/%s/idAttachmentCover']
```
#### Update card id board

```php
$result = $client->updateCardIdBoard($cardId, $attributes);
```

API Signature:
```php
'updateCardIdBoard' => ['put', 'cards/%s/idBoard']
```
#### Add card id label

```php
$result = $client->addCardIdLabel($cardId, $attributes);
```

API Signature:
```php
'addCardIdLabel' => ['post', 'cards/%s/idLabels']
```
#### Delete card id label

```php
$result = $client->deleteCardIdLabel($cardId, $idLabelId);
```

API Signature:
```php
'deleteCardIdLabel' => ['delete', 'cards/%s/idLabels/%s']
```
#### Update card id list

```php
$result = $client->updateCardIdList($cardId, $attributes);
```

API Signature:
```php
'updateCardIdList' => ['put', 'cards/%s/idList']
```
#### Add card id member

```php
$result = $client->addCardIdMember($cardId, $attributes);
```

API Signature:
```php
'addCardIdMember' => ['post', 'cards/%s/idMembers']
```
#### Update card id members

```php
$result = $client->updateCardIdMembers($cardId, $attributes);
```

API Signature:
```php
'updateCardIdMembers' => ['put', 'cards/%s/idMembers']
```
#### Delete card id member

```php
$result = $client->deleteCardIdMember($cardId, $idMemberId);
```

API Signature:
```php
'deleteCardIdMember' => ['delete', 'cards/%s/idMembers/%s']
```
#### Add card label

```php
$result = $client->addCardLabel($cardId, $attributes);
```

API Signature:
```php
'addCardLabel' => ['post', 'cards/%s/labels']
```
#### Update card label

```php
$result = $client->updateCardLabel($cardId, $attributes);
```

API Signature:
```php
'updateCardLabel' => ['put', 'cards/%s/labels']
```
#### Delete card label

```php
$result = $client->deleteCardLabel($cardId, $labelId);
```

API Signature:
```php
'deleteCardLabel' => ['delete', 'cards/%s/labels/%s']
```
#### Get card list

```php
$result = $client->getCardList($cardId);
```

API Signature:
```php
'getCardList' => ['get', 'cards/%s/list']
```
#### Get card list field

```php
$result = $client->getCardListField($cardId, $fieldName);
```

API Signature:
```php
'getCardListField' => ['get', 'cards/%s/list/%s']
```
#### Add card mark associated notifications read

```php
$result = $client->addCardMarkAssociatedNotificationsRead($cardId, $attributes);
```

API Signature:
```php
'addCardMarkAssociatedNotificationsRead' => ['post', 'cards/%s/markAssociatedNotificationsRead']
```
#### Get card members

```php
$result = $client->getCardMembers($cardId);
```

API Signature:
```php
'getCardMembers' => ['get', 'cards/%s/members']
```
#### Get card members voted

```php
$result = $client->getCardMembersVoted($cardId);
```

API Signature:
```php
'getCardMembersVoted' => ['get', 'cards/%s/membersVoted']
```
#### Add card members voted

```php
$result = $client->addCardMembersVoted($cardId, $attributes);
```

API Signature:
```php
'addCardMembersVoted' => ['post', 'cards/%s/membersVoted']
```
#### Delete card members voted

```php
$result = $client->deleteCardMembersVoted($cardId, $membersVotedId);
```

API Signature:
```php
'deleteCardMembersVoted' => ['delete', 'cards/%s/membersVoted/%s']
```
#### Update card name

```php
$result = $client->updateCardName($cardId, $attributes);
```

API Signature:
```php
'updateCardName' => ['put', 'cards/%s/name']
```
#### Update card pos

```php
$result = $client->updateCardPos($cardId, $attributes);
```

API Signature:
```php
'updateCardPos' => ['put', 'cards/%s/pos']
```
#### Get card stickers

```php
$result = $client->getCardStickers($cardId);
```

API Signature:
```php
'getCardStickers' => ['get', 'cards/%s/stickers']
```
#### Add card sticker

```php
$result = $client->addCardSticker($cardId, $attributes);
```

API Signature:
```php
'addCardSticker' => ['post', 'cards/%s/stickers']
```
#### Delete card sticker

```php
$result = $client->deleteCardSticker($cardId, $stickerId);
```

API Signature:
```php
'deleteCardSticker' => ['delete', 'cards/%s/stickers/%s']
```
#### Get card sticker

```php
$result = $client->getCardSticker($cardId, $stickerId);
```

API Signature:
```php
'getCardSticker' => ['get', 'cards/%s/stickers/%s']
```
#### Update card sticker

```php
$result = $client->updateCardSticker($cardId, $stickerId, $attributes);
```

API Signature:
```php
'updateCardSticker' => ['put', 'cards/%s/stickers/%s']
```
#### Update card subscribed

```php
$result = $client->updateCardSubscribed($cardId, $attributes);
```

API Signature:
```php
'updateCardSubscribed' => ['put', 'cards/%s/subscribed']
```

### Checklists

#### Add checklist

```php
$result = $client->addChecklist($attributes);
```

API Signature:
```php
'addChecklist' => ['post', 'checklists']
```
#### Delete checklist

```php
$result = $client->deleteChecklist($checklistId);
```

API Signature:
```php
'deleteChecklist' => ['delete', 'checklists/%s']
```
#### Get checklist

```php
$result = $client->getChecklist($checklistId);
```

API Signature:
```php
'getChecklist' => ['get', 'checklists/%s']
```
#### Update checklist

```php
$result = $client->updateChecklist($checklistId, $attributes);
```

API Signature:
```php
'updateChecklist' => ['put', 'checklists/%s']
```
#### Get checklist field

```php
$result = $client->getChecklistField($checklistId, $fieldName);
```

API Signature:
```php
'getChecklistField' => ['get', 'checklists/%s/%s']
```
#### Get checklist board

```php
$result = $client->getChecklistBoard($checklistId);
```

API Signature:
```php
'getChecklistBoard' => ['get', 'checklists/%s/board']
```
#### Get checklist board field

```php
$result = $client->getChecklistBoardField($checklistId, $fieldName);
```

API Signature:
```php
'getChecklistBoardField' => ['get', 'checklists/%s/board/%s']
```
#### Get checklist cards

```php
$result = $client->getChecklistCards($checklistId);
```

API Signature:
```php
'getChecklistCards' => ['get', 'checklists/%s/cards']
```
#### Get checklist card

```php
$result = $client->getChecklistCard($checklistId, $cardId);
```

API Signature:
```php
'getChecklistCard' => ['get', 'checklists/%s/cards/%s']
```
#### Get checklist check items

```php
$result = $client->getChecklistCheckItems($checklistId);
```

API Signature:
```php
'getChecklistCheckItems' => ['get', 'checklists/%s/checkItems']
```
#### Add checklist check item

```php
$result = $client->addChecklistCheckItem($checklistId, $attributes);
```

API Signature:
```php
'addChecklistCheckItem' => ['post', 'checklists/%s/checkItems']
```
#### Delete checklist check item

```php
$result = $client->deleteChecklistCheckItem($checklistId, $checkItemId);
```

API Signature:
```php
'deleteChecklistCheckItem' => ['delete', 'checklists/%s/checkItems/%s']
```
#### Get checklist check item

```php
$result = $client->getChecklistCheckItem($checklistId, $checkItemId);
```

API Signature:
```php
'getChecklistCheckItem' => ['get', 'checklists/%s/checkItems/%s']
```
#### Update checklist id card

```php
$result = $client->updateChecklistIdCard($checklistId, $attributes);
```

API Signature:
```php
'updateChecklistIdCard' => ['put', 'checklists/%s/idCard']
```
#### Update checklist name

```php
$result = $client->updateChecklistName($checklistId, $attributes);
```

API Signature:
```php
'updateChecklistName' => ['put', 'checklists/%s/name']
```
#### Update checklist pos

```php
$result = $client->updateChecklistPos($checklistId, $attributes);
```

API Signature:
```php
'updateChecklistPos' => ['put', 'checklists/%s/pos']
```
### CustomFields

#### Create custom field

```php
$result = $client->addCustomField($attributes);
```

API Signature:
```php
'addCustomField' => ['post', 'customFields']
```

#### Add option to a custom field

```php
$result = $client->addCustomFieldOption($customFieldId, $attributes);
```

API Signature:
```php
'addCustomFieldOption' => ['post', 'customField/%s/options']
```

#### Update custom field option

```php
$result = $client->updateCustomFieldOption($customFieldId, $optionId, $attributes);
```

API Signature:
```php
'updateCustomFieldOption' => ['put', 'customField/%s/options/%s']
```

#### Delete custom field

```php
$result = $client->deleteCustomField($customFieldId);
```

API Signature:
```php
'deleteCustomField' => ['delete', 'customField/%s']
```

### Labels

#### Add label

```php
$result = $client->addLabel($attributes);
```

API Signature:
```php
'addLabel' => ['post', 'labels']
```
#### Delete label

```php
$result = $client->deleteLabel($labelId);
```

API Signature:
```php
'deleteLabel' => ['delete', 'labels/%s']
```
#### Get label

```php
$result = $client->getLabel($labelId);
```

API Signature:
```php
'getLabel' => ['get', 'labels/%s']
```
#### Update label

```php
$result = $client->updateLabel($labelId, $attributes);
```

API Signature:
```php
'updateLabel' => ['put', 'labels/%s']
```
#### Get label board

```php
$result = $client->getLabelBoard($labelId);
```

API Signature:
```php
'getLabelBoard' => ['get', 'labels/%s/board']
```
#### Get label board field

```php
$result = $client->getLabelBoardField($labelId, $fieldName);
```

API Signature:
```php
'getLabelBoardField' => ['get', 'labels/%s/board/%s']
```
#### Update label color

```php
$result = $client->updateLabelColor($labelId, $attributes);
```

API Signature:
```php
'updateLabelColor' => ['put', 'labels/%s/color']
```
#### Update label name

```php
$result = $client->updateLabelName($labelId, $attributes);
```

API Signature:
```php
'updateLabelName' => ['put', 'labels/%s/name']
```

### Lists

#### Add list

```php
$result = $client->addList($attributes);
```

API Signature:
```php
'addList' => ['post', 'lists']
```
#### Get list

```php
$result = $client->getList($listId);
```

API Signature:
```php
'getList' => ['get', 'lists/%s']
```
#### Update list

```php
$result = $client->updateList($listId, $attributes);
```

API Signature:
```php
'updateList' => ['put', 'lists/%s']
```
#### Get list field

```php
$result = $client->getListField($listId, $fieldName);
```

API Signature:
```php
'getListField' => ['get', 'lists/%s/%s']
```
#### Get list actions

```php
$result = $client->getListActions($listId, $attributes);
```

API Signature:
```php
'getListActions' => ['get', 'lists/%s/actions']
```
#### Add list archive all cards

```php
$result = $client->addListArchiveAllCards($listId, $attributes);
```

API Signature:
```php
'addListArchiveAllCards' => ['post', 'lists/%s/archiveAllCards']
```
#### Get list board

```php
$result = $client->getListBoard($listId);
```

API Signature:
```php
'getListBoard' => ['get', 'lists/%s/board']
```
#### Get list board field

```php
$result = $client->getListBoardField($listId, $fieldName);
```

API Signature:
```php
'getListBoardField' => ['get', 'lists/%s/board/%s']
```
#### Get list cards

```php
$result = $client->getListCards($listId);
```

API Signature:
```php
'getListCards' => ['get', 'lists/%s/cards']
```
#### Add list card

```php
$result = $client->addListCard($listId, $attributes);
```

API Signature:
```php
'addListCard' => ['post', 'lists/%s/cards']
```
#### Get list card

```php
$result = $client->getListCard($listId, $cardId);
```

API Signature:
```php
'getListCard' => ['get', 'lists/%s/cards/%s']
```
#### Update list closed

```php
$result = $client->updateListClosed($listId, $attributes);
```

API Signature:
```php
'updateListClosed' => ['put', 'lists/%s/closed']
```
#### Update list id board

```php
$result = $client->updateListIdBoard($listId, $attributes);
```

API Signature:
```php
'updateListIdBoard' => ['put', 'lists/%s/idBoard']
```
#### Add list move all cards

```php
$result = $client->addListMoveAllCards($listId, $attributes);
```

API Signature:
```php
'addListMoveAllCards' => ['post', 'lists/%s/moveAllCards']
```
#### Update list name

```php
$result = $client->updateListName($listId, $attributes);
```

API Signature:
```php
'updateListName' => ['put', 'lists/%s/name']
```
#### Update list pos

```php
$result = $client->updateListPos($listId, $attributes);
```

API Signature:
```php
'updateListPos' => ['put', 'lists/%s/pos']
```
#### Update list subscribed

```php
$result = $client->updateListSubscribed($listId, $attributes);
```

API Signature:
```php
'updateListSubscribed' => ['put', 'lists/%s/subscribed']
```

### Members

#### Get member

```php
$result = $client->getMember($memberId);
```

API Signature:
```php
'getMember' => ['get', 'members/%s']
```
#### Update member

```php
$result = $client->updateMember($memberId, $attributes);
```

API Signature:
```php
'updateMember' => ['put', 'members/%s']
```
#### Get member field

```php
$result = $client->getMemberField($memberId, $fieldName);
```

API Signature:
```php
'getMemberField' => ['get', 'members/%s/%s']
```
#### Get member actions

```php
$result = $client->getMemberActions($memberId, $attributes);
```

API Signature:
```php
'getMemberActions' => ['get', 'members/%s/actions']
```
#### Add member avatar

```php
$result = $client->addMemberAvatar($memberId, $attributes);
```

API Signature:
```php
'addMemberAvatar' => ['post', 'members/%s/avatar']
```
#### Update member avatar source

```php
$result = $client->updateMemberAvatarSource($memberId, $attributes);
```

API Signature:
```php
'updateMemberAvatarSource' => ['put', 'members/%s/avatarSource']
```
#### Update member bio

```php
$result = $client->updateMemberBio($memberId, $attributes);
```

API Signature:
```php
'updateMemberBio' => ['put', 'members/%s/bio']
```
#### Get member board backgrounds

```php
$result = $client->getMemberBoardBackgrounds($memberId);
```

API Signature:
```php
'getMemberBoardBackgrounds' => ['get', 'members/%s/boardBackgrounds']
```
#### Add member board background

```php
$result = $client->addMemberBoardBackground($memberId, $attributes);
```

API Signature:
```php
'addMemberBoardBackground' => ['post', 'members/%s/boardBackgrounds']
```
#### Delete member board background

```php
$result = $client->deleteMemberBoardBackground($memberId, $boardBackgroundId);
```

API Signature:
```php
'deleteMemberBoardBackground' => ['delete', 'members/%s/boardBackgrounds/%s']
```
#### Get member board background

```php
$result = $client->getMemberBoardBackground($memberId, $boardBackgroundId);
```

API Signature:
```php
'getMemberBoardBackground' => ['get', 'members/%s/boardBackgrounds/%s']
```
#### Update member board background

```php
$result = $client->updateMemberBoardBackground($memberId, $boardBackgroundId, $attributes);
```

API Signature:
```php
'updateMemberBoardBackground' => ['put', 'members/%s/boardBackgrounds/%s']
```
#### Get member boards

```php
$result = $client->getMemberBoards($memberId);
```

API Signature:
```php
'getMemberBoards' => ['get', 'members/%s/boards']
```
#### Get member board

```php
$result = $client->getMemberBoard($memberId, $boardId);
```

API Signature:
```php
'getMemberBoard' => ['get', 'members/%s/boards/%s']
```
#### Get member boards invited

```php
$result = $client->getMemberBoardsInvited($memberId);
```

API Signature:
```php
'getMemberBoardsInvited' => ['get', 'members/%s/boardsInvited']
```
#### Get member boards invited field

```php
$result = $client->getMemberBoardsInvitedField($memberId, $fieldName);
```

API Signature:
```php
'getMemberBoardsInvitedField' => ['get', 'members/%s/boardsInvited/%s']
```
#### Get member board stars

```php
$result = $client->getMemberBoardStars($memberId);
```

API Signature:
```php
'getMemberBoardStars' => ['get', 'members/%s/boardStars']
```
#### Add member board star

```php
$result = $client->addMemberBoardStar($memberId, $attributes);
```

API Signature:
```php
'addMemberBoardStar' => ['post', 'members/%s/boardStars']
```
#### Delete member board star

```php
$result = $client->deleteMemberBoardStar($memberId, $boardStarId);
```

API Signature:
```php
'deleteMemberBoardStar' => ['delete', 'members/%s/boardStars/%s']
```
#### Get member board star

```php
$result = $client->getMemberBoardStar($memberId, $boardStarId);
```

API Signature:
```php
'getMemberBoardStar' => ['get', 'members/%s/boardStars/%s']
```
#### Update member board star

```php
$result = $client->updateMemberBoardStar($memberId, $boardStarId, $attributes);
```

API Signature:
```php
'updateMemberBoardStar' => ['put', 'members/%s/boardStars/%s']
```
#### Update member board star id board

```php
$result = $client->updateMemberBoardStarIdBoard($memberId, $boardStarId, $attributes);
```

API Signature:
```php
'updateMemberBoardStarIdBoard' => ['put', 'members/%s/boardStars/%s/idBoard']
```
#### Update member board star pos

```php
$result = $client->updateMemberBoardStarPos($memberId, $boardStarId, $attributes);
```

API Signature:
```php
'updateMemberBoardStarPos' => ['put', 'members/%s/boardStars/%s/pos']
```
#### Get member cards

```php
$result = $client->getMemberCards($memberId);
```

API Signature:
```php
'getMemberCards' => ['get', 'members/%s/cards']
```
#### Get member card

```php
$result = $client->getMemberCard($memberId, $cardId);
```

API Signature:
```php
'getMemberCard' => ['get', 'members/%s/cards/%s']
```
#### Get member custom board backgrounds

```php
$result = $client->getMemberCustomBoardBackgrounds($memberId);
```

API Signature:
```php
'getMemberCustomBoardBackgrounds' => ['get', 'members/%s/customBoardBackgrounds']
```
#### Add member custom board background

```php
$result = $client->addMemberCustomBoardBackground($memberId, $attributes);
```

API Signature:
```php
'addMemberCustomBoardBackground' => ['post', 'members/%s/customBoardBackgrounds']
```
#### Delete member custom board background

```php
$result = $client->deleteMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```

API Signature:
```php
'deleteMemberCustomBoardBackground' => ['delete', 'members/%s/customBoardBackgrounds/%s']
```
#### Get member custom board background

```php
$result = $client->getMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```

API Signature:
```php
'getMemberCustomBoardBackground' => ['get', 'members/%s/customBoardBackgrounds/%s']
```
#### Update member custom board background

```php
$result = $client->updateMemberCustomBoardBackground($memberId, $customBoardBackgroundId, $attributes);
```

API Signature:
```php
'updateMemberCustomBoardBackground' => ['put', 'members/%s/customBoardBackgrounds/%s']
```
#### Get member custom emojis

```php
$result = $client->getMemberCustomEmojis($memberId);
```

API Signature:
```php
'getMemberCustomEmojis' => ['get', 'members/%s/customEmoji']
```
#### Add member custom emoji

```php
$result = $client->addMemberCustomEmoji($memberId, $attributes);
```

API Signature:
```php
'addMemberCustomEmoji' => ['post', 'members/%s/customEmoji']
```
#### Get member custom emoji

```php
$result = $client->getMemberCustomEmoji($memberId, $customEmojiId);
```

API Signature:
```php
'getMemberCustomEmoji' => ['get', 'members/%s/customEmoji/%s']
```
#### Get member custom stickers

```php
$result = $client->getMemberCustomStickers($memberId);
```

API Signature:
```php
'getMemberCustomStickers' => ['get', 'members/%s/customStickers']
```
#### Add member custom sticker

```php
$result = $client->addMemberCustomSticker($memberId, $attributes);
```

API Signature:
```php
'addMemberCustomSticker' => ['post', 'members/%s/customStickers']
```
#### Delete member custom sticker

```php
$result = $client->deleteMemberCustomSticker($memberId, $customStickerId);
```

API Signature:
```php
'deleteMemberCustomSticker' => ['delete', 'members/%s/customStickers/%s']
```
#### Get member custom sticker

```php
$result = $client->getMemberCustomSticker($memberId, $customStickerId);
```

API Signature:
```php
'getMemberCustomSticker' => ['get', 'members/%s/customStickers/%s']
```
#### Get member deltas

```php
$result = $client->getMemberDeltas($memberId);
```

API Signature:
```php
'getMemberDeltas' => ['get', 'members/%s/deltas']
```
#### Update member full name

```php
$result = $client->updateMemberFullName($memberId, $attributes);
```

API Signature:
```php
'updateMemberFullName' => ['put', 'members/%s/fullName']
```
#### Update member initials

```php
$result = $client->updateMemberInitials($memberId, $attributes);
```

API Signature:
```php
'updateMemberInitials' => ['put', 'members/%s/initials']
```
#### Get member notifications

```php
$result = $client->getMemberNotifications($memberId);
```

API Signature:
```php
'getMemberNotifications' => ['get', 'members/%s/notifications']
```
#### Get member notification

```php
$result = $client->getMemberNotification($memberId, $notificationId);
```

API Signature:
```php
'getMemberNotification' => ['get', 'members/%s/notifications/%s']
```
#### Add member one time messages dismissed

```php
$result = $client->addMemberOneTimeMessagesDismissed($memberId, $attributes);
```

API Signature:
```php
'addMemberOneTimeMessagesDismissed' => ['post', 'members/%s/oneTimeMessagesDismissed']
```
#### Get member organizations

```php
$result = $client->getMemberOrganizations($memberId);
```

API Signature:
```php
'getMemberOrganizations' => ['get', 'members/%s/organizations']
```
#### Get member organization

```php
$result = $client->getMemberOrganization($memberId, $organizationId);
```

API Signature:
```php
'getMemberOrganization' => ['get', 'members/%s/organizations/%s']
```
#### Get member organizations invited

```php
$result = $client->getMemberOrganizationsInvited($memberId);
```

API Signature:
```php
'getMemberOrganizationsInvited' => ['get', 'members/%s/organizationsInvited']
```
#### Get member organizations invited field

```php
$result = $client->getMemberOrganizationsInvitedField($memberId, $fieldName);
```

API Signature:
```php
'getMemberOrganizationsInvitedField' => ['get', 'members/%s/organizationsInvited/%s']
```
#### Update member pref color blind

```php
$result = $client->updateMemberPrefColorBlind($memberId, $attributes);
```

API Signature:
```php
'updateMemberPrefColorBlind' => ['put', 'members/%s/prefs/colorBlind']
```
#### Update member pref minutes between summaries

```php
$result = $client->updateMemberPrefMinutesBetweenSummaries($memberId, $attributes);
```

API Signature:
```php
'updateMemberPrefMinutesBetweenSummaries' => ['put', 'members/%s/prefs/minutesBetweenSummaries']
```
#### Get member saved searches

```php
$result = $client->getMemberSavedSearches($memberId);
```

API Signature:
```php
'getMemberSavedSearches' => ['get', 'members/%s/savedSearches']
```
#### Add member saved search

```php
$result = $client->addMemberSavedSearch($memberId, $attributes);
```

API Signature:
```php
'addMemberSavedSearch' => ['post', 'members/%s/savedSearches']
```
#### Delete member saved search

```php
$result = $client->deleteMemberSavedSearch($memberId, $savedSearcheId);
```

API Signature:
```php
'deleteMemberSavedSearch' => ['delete', 'members/%s/savedSearches/%s']
```
#### Get member saved search

```php
$result = $client->getMemberSavedSearch($memberId, $savedSearcheId);
```

API Signature:
```php
'getMemberSavedSearch' => ['get', 'members/%s/savedSearches/%s']
```
#### Update member saved search

```php
$result = $client->updateMemberSavedSearch($memberId, $savedSearcheId, $attributes);
```

API Signature:
```php
'updateMemberSavedSearch' => ['put', 'members/%s/savedSearches/%s']
```
#### Update member saved search name

```php
$result = $client->updateMemberSavedSearchName($memberId, $savedSearcheId, $attributes);
```

API Signature:
```php
'updateMemberSavedSearchName' => ['put', 'members/%s/savedSearches/%s/name']
```
#### Update member saved search pos

```php
$result = $client->updateMemberSavedSearchPos($memberId, $savedSearcheId, $attributes);
```

API Signature:
```php
'updateMemberSavedSearchPos' => ['put', 'members/%s/savedSearches/%s/pos']
```
#### Update member saved search query

```php
$result = $client->updateMemberSavedSearchQuery($memberId, $savedSearcheId, $attributes);
```

API Signature:
```php
'updateMemberSavedSearchQuery' => ['put', 'members/%s/savedSearches/%s/query']
```
#### Get member tokens

```php
$result = $client->getMemberTokens($memberId);
```

API Signature:
```php
'getMemberTokens' => ['get', 'members/%s/tokens']
```
#### Update member username

```php
$result = $client->updateMemberUsername($memberId, $attributes);
```

API Signature:
```php
'updateMemberUsername' => ['put', 'members/%s/username']
```

### Notifications

#### Get notification

```php
$result = $client->getNotification($notificationId);
```

API Signature:
```php
'getNotification' => ['get', 'notifications/%s']
```
#### Update notification

```php
$result = $client->updateNotification($notificationId, $attributes);
```

API Signature:
```php
'updateNotification' => ['put', 'notifications/%s']
```
#### Get notification field

```php
$result = $client->getNotificationField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationField' => ['get', 'notifications/%s/%s']
```
#### Get notification board

```php
$result = $client->getNotificationBoard($notificationId);
```

API Signature:
```php
'getNotificationBoard' => ['get', 'notifications/%s/board']
```
#### Get notification board field

```php
$result = $client->getNotificationBoardField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationBoardField' => ['get', 'notifications/%s/board/%s']
```
#### Get notification card

```php
$result = $client->getNotificationCard($notificationId);
```

API Signature:
```php
'getNotificationCard' => ['get', 'notifications/%s/card']
```
#### Get notification card field

```php
$result = $client->getNotificationCardField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationCardField' => ['get', 'notifications/%s/card/%s']
```
#### Get notification entities

```php
$result = $client->getNotificationEntities($notificationId);
```

API Signature:
```php
'getNotificationEntities' => ['get', 'notifications/%s/entities']
```
#### Get notification list

```php
$result = $client->getNotificationList($notificationId);
```

API Signature:
```php
'getNotificationList' => ['get', 'notifications/%s/list']
```
#### Get notification list field

```php
$result = $client->getNotificationListField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationListField' => ['get', 'notifications/%s/list/%s']
```
#### Get notification member

```php
$result = $client->getNotificationMember($notificationId);
```

API Signature:
```php
'getNotificationMember' => ['get', 'notifications/%s/member']
```
#### Get notification member field

```php
$result = $client->getNotificationMemberField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationMemberField' => ['get', 'notifications/%s/member/%s']
```
#### Get notification member creator

```php
$result = $client->getNotificationMemberCreator($notificationId);
```

API Signature:
```php
'getNotificationMemberCreator' => ['get', 'notifications/%s/memberCreator']
```
#### Get notification member creator field

```php
$result = $client->getNotificationMemberCreatorField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationMemberCreatorField' => ['get', 'notifications/%s/memberCreator/%s']
```
#### Get notification organization

```php
$result = $client->getNotificationOrganization($notificationId);
```

API Signature:
```php
'getNotificationOrganization' => ['get', 'notifications/%s/organization']
```
#### Get notification organization field

```php
$result = $client->getNotificationOrganizationField($notificationId, $fieldName);
```

API Signature:
```php
'getNotificationOrganizationField' => ['get', 'notifications/%s/organization/%s']
```
#### Update notification unread

```php
$result = $client->updateNotificationUnread($notificationId, $attributes);
```

API Signature:
```php
'updateNotificationUnread' => ['put', 'notifications/%s/unread']
```
#### Add notification all read

```php
$result = $client->addNotificationAllRead($attributes);
```

API Signature:
```php
'addNotificationAllRead' => ['post', 'notifications/all/read']
```

### Organizations

#### Add organization

```php
$result = $client->addOrganization($attributes);
```

API Signature:
```php
'addOrganization' => ['post', 'organizations']
```
#### Delete organization

```php
$result = $client->deleteOrganization($organizationId);
```

API Signature:
```php
'deleteOrganization' => ['delete', 'organizations/%s']
```
#### Get organization

```php
$result = $client->getOrganization($organizationId);
```

API Signature:
```php
'getOrganization' => ['get', 'organizations/%s']
```
#### Update organization

```php
$result = $client->updateOrganization($organizationId, $attributes);
```

API Signature:
```php
'updateOrganization' => ['put', 'organizations/%s']
```
#### Get organization field

```php
$result = $client->getOrganizationField($organizationId, $fieldName);
```

API Signature:
```php
'getOrganizationField' => ['get', 'organizations/%s/%s']
```
#### Get organization actions

```php
$result = $client->getOrganizationActions($organizationId, $attributes);
```

API Signature:
```php
'getOrganizationActions' => ['get', 'organizations/%s/actions']
```
#### Get organization boards

```php
$result = $client->getOrganizationBoards($organizationId);
```

API Signature:
```php
'getOrganizationBoards' => ['get', 'organizations/%s/boards']
```
#### Get organization boards filter

```php
$result = $client->getOrganizationBoardsFilter($organizationId, $filter);
```

API Signature:
```php
'getOrganizationBoardsFilter' => ['get', 'organizations/%s/boards/%s']
```
#### Get organization deltas

```php
$result = $client->getOrganizationDeltas($organizationId);
```

API Signature:
```php
'getOrganizationDeltas' => ['get', 'organizations/%s/deltas']
```
#### Update organization desc

```php
$result = $client->updateOrganizationDesc($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationDesc' => ['put', 'organizations/%s/desc']
```
#### Update organization display name

```php
$result = $client->updateOrganizationDisplayName($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationDisplayName' => ['put', 'organizations/%s/displayName']
```
#### Delete organization logo

```php
$result = $client->deleteOrganizationLogo($organizationId);
```

API Signature:
```php
'deleteOrganizationLogo' => ['delete', 'organizations/%s/logo']
```
#### Add organization logo

```php
$result = $client->addOrganizationLogo($organizationId, $attributes);
```

API Signature:
```php
'addOrganizationLogo' => ['post', 'organizations/%s/logo']
```
#### Get organization members

```php
$result = $client->getOrganizationMembers($organizationId);
```

API Signature:
```php
'getOrganizationMembers' => ['get', 'organizations/%s/members']
```
#### Update organization members

```php
$result = $client->updateOrganizationMembers($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationMembers' => ['put', 'organizations/%s/members']
```
#### Delete organization member

```php
$result = $client->deleteOrganizationMember($organizationId, $memberId);
```

API Signature:
```php
'deleteOrganizationMember' => ['delete', 'organizations/%s/members/%s']
```
#### Get organization members filter

```php
$result = $client->getOrganizationMembersFilter($organizationId, $filter);
```

API Signature:
```php
'getOrganizationMembersFilter' => ['get', 'organizations/%s/members/%s']
```
#### Update organization member

```php
$result = $client->updateOrganizationMember($organizationId, $memberId, $attributes);
```

API Signature:
```php
'updateOrganizationMember' => ['put', 'organizations/%s/members/%s']
```
#### Delete organization member all

```php
$result = $client->deleteOrganizationMemberAll($organizationId, $memberId);
```

API Signature:
```php
'deleteOrganizationMemberAll' => ['delete', 'organizations/%s/members/%s/all']
```
#### Get organization member cards

```php
$result = $client->getOrganizationMemberCards($organizationId, $memberId);
```

API Signature:
```php
'getOrganizationMemberCards' => ['get', 'organizations/%s/members/%s/cards']
```
#### Update organization member deactivated

```php
$result = $client->updateOrganizationMemberDeactivated($organizationId, $memberId, $attributes);
```

API Signature:
```php
'updateOrganizationMemberDeactivated' => ['put', 'organizations/%s/members/%s/deactivated']
```
#### Get organization memberships

```php
$result = $client->getOrganizationMemberships($organizationId);
```

API Signature:
```php
'getOrganizationMemberships' => ['get', 'organizations/%s/memberships']
```
#### Get organization membership

```php
$result = $client->getOrganizationMembership($organizationId, $membershipId);
```

API Signature:
```php
'getOrganizationMembership' => ['get', 'organizations/%s/memberships/%s']
```
#### Update organization membership

```php
$result = $client->updateOrganizationMembership($organizationId, $membershipId, $attributes);
```

API Signature:
```php
'updateOrganizationMembership' => ['put', 'organizations/%s/memberships/%s']
```
#### Get organization members invited

```php
$result = $client->getOrganizationMembersInvited($organizationId);
```

API Signature:
```php
'getOrganizationMembersInvited' => ['get', 'organizations/%s/membersInvited']
```
#### Get organization members invited field

```php
$result = $client->getOrganizationMembersInvitedField($organizationId, $fieldName);
```

API Signature:
```php
'getOrganizationMembersInvitedField' => ['get', 'organizations/%s/membersInvited/%s']
```
#### Update organization name

```php
$result = $client->updateOrganizationName($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationName' => ['put', 'organizations/%s/name']
```
#### Delete organization pref associated domain

```php
$result = $client->deleteOrganizationPrefAssociatedDomain($organizationId);
```

API Signature:
```php
'deleteOrganizationPrefAssociatedDomain' => ['delete', 'organizations/%s/prefs/associatedDomain']
```
#### Update organization pref associated domain

```php
$result = $client->updateOrganizationPrefAssociatedDomain($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefAssociatedDomain' => ['put', 'organizations/%s/prefs/associatedDomain']
```
#### Update organization pref board visibility restrict org

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictOrg($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefBoardVisibilityRestrictOrg' => ['put', 'organizations/%s/prefs/boardVisibilityRestrict/org']
```
#### Update organization pref board visibility restrict private

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPrivate($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefBoardVisibilityRestrictPrivate' => ['put', 'organizations/%s/prefs/boardVisibilityRestrict/private']
```
#### Update organization pref board visibility restrict public

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPublic($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefBoardVisibilityRestrictPublic' => ['put', 'organizations/%s/prefs/boardVisibilityRestrict/public']
```
#### Update organization pref external members disabled

```php
$result = $client->updateOrganizationPrefExternalMembersDisabled($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefExternalMembersDisabled' => ['put', 'organizations/%s/prefs/externalMembersDisabled']
```
#### Update organization pref google apps version

```php
$result = $client->updateOrganizationPrefGoogleAppsVersion($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefGoogleAppsVersion' => ['put', 'organizations/%s/prefs/googleAppsVersion']
```
#### Delete organization pref org invite restrict

```php
$result = $client->deleteOrganizationPrefOrgInviteRestrict($organizationId);
```

API Signature:
```php
'deleteOrganizationPrefOrgInviteRestrict' => ['delete', 'organizations/%s/prefs/orgInviteRestrict']
```
#### Update organization pref org invite restrict

```php
$result = $client->updateOrganizationPrefOrgInviteRestrict($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefOrgInviteRestrict' => ['put', 'organizations/%s/prefs/orgInviteRestrict']
```
#### Update organization pref permission level

```php
$result = $client->updateOrganizationPrefPermissionLevel($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationPrefPermissionLevel' => ['put', 'organizations/%s/prefs/permissionLevel']
```
#### Update organization website

```php
$result = $client->updateOrganizationWebsite($organizationId, $attributes);
```

API Signature:
```php
'updateOrganizationWebsite' => ['put', 'organizations/%s/website']
```

### Search

#### Get search

```php
$result = $client->getSearch($attributes);
```

API Signature:
```php
'getSearch' => ['get', 'search']
```
#### Get search member

```php
$result = $client->getSearchMembers($attributes);
```

API Signature:
```php
'getSearchMembers' => ['get', 'search/members']
```

### Sessions

#### Add session

```php
$result = $client->addSession($attributes);
```

API Signature:
```php
'addSession' => ['post', 'sessions']
```
#### Update session

```php
$result = $client->updateSession($sessionId, $attributes);
```

API Signature:
```php
'updateSession' => ['put', 'sessions/%s']
```
#### Update session status

```php
$result = $client->updateSessionStatus($sessionId, $attributes);
```

API Signature:
```php
'updateSessionStatus' => ['put', 'sessions/%s/status']
```
#### Get session socket

```php
$result = $client->getSessionSocket();
```

API Signature:
```php
'getSessionSocket' => ['get', 'sessions/socket']
```

### Tokens

#### Delete token

```php
$result = $client->deleteToken($tokenId);
```

API Signature:
```php
'deleteToken' => ['delete', 'tokens/%s']
```
#### Get token

```php
$result = $client->getToken($tokenId);
```

API Signature:
```php
'getToken' => ['get', 'tokens/%s']
```
#### Get token field

```php
$result = $client->getTokenField($tokenId, $fieldName);
```

API Signature:
```php
'getTokenField' => ['get', 'tokens/%s/%s']
```
#### Get token member

```php
$result = $client->getTokenMember($tokenId);
```

API Signature:
```php
'getTokenMember' => ['get', 'tokens/%s/member']
```
#### Get token member field

```php
$result = $client->getTokenMemberField($tokenId, $fieldName);
```

API Signature:
```php
'getTokenMemberField' => ['get', 'tokens/%s/member/%s']
```
#### Get token webhooks

```php
$result = $client->getTokenWebhooks($tokenId);
```

API Signature:
```php
'getTokenWebhooks' => ['get', 'tokens/%s/webhooks']
```
#### Add token webhook

```php
$result = $client->addTokenWebhook($tokenId, $attributes);
```

API Signature:
```php
'addTokenWebhook' => ['post', 'tokens/%s/webhooks']
```
#### Update token webhooks

```php
$result = $client->updateTokenWebhooks($tokenId, $attributes);
```

API Signature:
```php
'updateTokenWebhooks' => ['put', 'tokens/%s/webhooks']
```
#### Delete token webhook

```php
$result = $client->deleteTokenWebhook($tokenId, $webhookId);
```

API Signature:
```php
'deleteTokenWebhook' => ['delete', 'tokens/%s/webhooks/%s']
```
#### Get token webhook

```php
$result = $client->getTokenWebhook($tokenId, $webhookId);
```

API Signature:
```php
'getTokenWebhook' => ['get', 'tokens/%s/webhooks/%s']
```

### Types

#### Get type

```php
$result = $client->getType($typeId);
```

API Signature:
```php
'getType' => ['get', 'types/%s']
```

### Webhooks

#### Add webhook

```php
$result = $client->addWebhook($attributes);
```

API Signature:
```php
'addWebhook' => ['post', 'webhooks']
```
#### Delete webhook

```php
$result = $client->deleteWebhook($webhookId);
```

API Signature:
```php
'deleteWebhook' => ['delete', 'webhooks/%s']
```
#### Get webhook

```php
$result = $client->getWebhook($webhookId);
```

API Signature:
```php
'getWebhook' => ['get', 'webhooks/%s']
```
#### Update webhook

```php
$result = $client->updateWebhook($webhookId, $attributes);
```

API Signature:
```php
'updateWebhook' => ['put', 'webhooks/%s']
```
#### Get webhook field

```php
$result = $client->getWebhookField($webhookId, $fieldName);
```

API Signature:
```php
'getWebhookField' => ['get', 'webhooks/%s/%s']
```
#### Update webhook active

```php
$result = $client->updateWebhookActive($webhookId, $attributes);
```

API Signature:
```php
'updateWebhookActive' => ['put', 'webhooks/%s/active']
```
#### Update webhook callback

```php
$result = $client->updateWebhookCallbackURL($webhookId, $attributes);
```

API Signature:
```php
'updateWebhookCallbackURL' => ['put', 'webhooks/%s/callbackURL']
```
#### Update webhook description

```php
$result = $client->updateWebhookDescription($webhookId, $attributes);
```

API Signature:
```php
'updateWebhookDescription' => ['put', 'webhooks/%s/description']
```
#### Update webhook id model

```php
$result = $client->updateWebhookIdModel($webhookId, $attributes);
```

API Signature:
```php
'updateWebhookIdModel' => ['put', 'webhooks/%s/idModel']
```