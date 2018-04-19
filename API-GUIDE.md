# Trello PHP

## Access the API

### Users

#### Get Current User

```php
$result = $client->getCurrentUser();
```

API Signature:
GET /members/me


#### Current User Boards

```php
$result = $client->getCurrentUserBoards();
```

API Signature:
GET /members/my/boards


#### Get Current User Pinned Boards

```php
$result = $client->getCurrentUserPinnedBoards();
```

API Signature:
GET /members/my/boards/pinned


#### Get Current User Cards

```php
$result = $client->getCurrentUserCards();
```

API Signature:
GET /members/my/cards


#### Get Current User Organizations

```php
$result = $client->getCurrentUserOrganizations();
```

API Signature:
GET /members/my/organizations


### Actions

#### Delete action

```php
$result = $client->deleteAction($actionId);
```

API Signature:
DELETE /actions/{actionId}

#### Get action

```php
$result = $client->getAction($actionId);
```

API Signature:
GET /actions/{actionId}

#### Update action

```php
$result = $client->updateAction($actionId, $attributes);
```

API Signature:
PUT /actions/{actionId}

#### Get action field

```php
$result = $client->getActionField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/{fieldName}

#### Get action board

```php
$result = $client->getActionBoard($actionId);
```

API Signature:
GET /actions/{actionId}/board

#### Get action board field

```php
$result = $client->getActionBoardField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/board/{fieldName}

#### Get action card

```php
$result = $client->getActionCard($actionId);
```

API Signature:
GET /actions/{actionId}/card

#### Get action card field

```php
$result = $client->getActionCardField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/card/{fieldName}

#### Get action entities

```php
$result = $client->getActionEntities($actionId);
```

API Signature:
GET /actions/{actionId}/entities

#### Get action list

```php
$result = $client->getActionList($actionId);
```

API Signature:
GET /actions/{actionId}/list

#### Get action list field

```php
$result = $client->getActionListField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/list/{fieldName}

#### Get action member

```php
$result = $client->getActionMember($actionId);
```

API Signature:
GET /actions/{actionId}/member

#### Get action member field

```php
$result = $client->getActionMemberField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/member/{fieldName}

#### Get action member creator

```php
$result = $client->getActionMemberCreator($actionId);
```

API Signature:
GET /actions/{actionId}/memberCreator

#### Get action member creator field

```php
$result = $client->getActionMemberCreatorField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/memberCreator/{fieldName}

#### Get action organization

```php
$result = $client->getActionOrganization($actionId);
```

API Signature:
GET /actions/{actionId}/organization

#### Get action organization field

```php
$result = $client->getActionOrganizationField($actionId, $fieldName);
```

API Signature:
GET /actions/{actionId}/organization/{fieldName}

#### Update action text

```php
$result = $client->updateActionText($actionId, $attributes);
```

API Signature:
PUT /actions/{actionId}/text


### Authorization

#### Get authorize

```php
$result = $client->getAuthorize($attributes);
```

API Signature:
GET /authorize


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
GET /tokens/{token}


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
GET /batch


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
POST /boards

#### Get board

```php
$result = $client->getBoard($boardId);
```

API Signature:
GET /boards/{boardId}

#### Update board

```php
$result = $client->updateBoard($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}

#### Get board field

```php
$result = $client->getBoardField($boardId, $fieldName);
```

API Signature:
GET /boards/{boardId}/{fieldName}

#### Get board actions

```php
$result = $client->getBoardActions($boardId, $attributes);
```

API Signature:
GET /boards/{boardId}/actions

#### Get board board stars

```php
$result = $client->getBoardBoardStars($boardId);
```

API Signature:
GET /boards/{boardId}/boardStars

#### Add board calendar key generate

```php
$result = $client->addBoardCalendarKeyGenerate($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/calendarKey/generate

#### Get board cards

```php
$result = $client->getBoardCards($boardId);

// Or to get the custom fields for a card, pass the 'customFieldItems' flag:
$result = $client->getBoardCards($boardId, [
    'customFieldItems' => true,
]);

```

API Signature:
GET /boards/{boardId}/cards

#### Get board card

```php
$result = $client->getBoardCard($boardId, $cardId);
```

API Signature:
GET /boards/{boardId}/cards/{cardId}

#### Get board cards with filter

```php
$result = $client->getBoardCardsWithFilter($boardId, $filter);
```

API Signature:
GET /boards/{boardId}/cards/{cardId}

#### Get board checklists

```php
$result = $client->getBoardChecklists($boardId);
```

API Signature:
GET /boards/{boardId}/checklists

#### Add board checklist

```php
$result = $client->addBoardChecklist($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/checklists

#### Update board closed

```php
$result = $client->updateBoardClosed($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/closed

#### Get board deltas

```php
$result = $client->getBoardDeltas($boardId);
```

API Signature:
GET /boards/{boardId}/deltas

#### Update board desc

```php
$result = $client->updateBoardDesc($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/desc

#### Add board email key generate

```php
$result = $client->addBoardEmailKeyGenerate($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/emailKey/generate

#### Update board id organization

```php
$result = $client->updateBoardIdOrganization($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/idOrganization

#### Update board label name blue

```php
$result = $client->updateBoardLabelNameBlue($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/blue

#### Update board label name green

```php
$result = $client->updateBoardLabelNameGreen($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/green

#### Update board label name orange

```php
$result = $client->updateBoardLabelNameOrange($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/orange

#### Update board label name purple

```php
$result = $client->updateBoardLabelNamePurple($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/purple

#### Update board label name red

```php
$result = $client->updateBoardLabelNameRed($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/red

#### Update board label name yellow

```php
$result = $client->updateBoardLabelNameYellow($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/labelNames/yellow


#### Get board custom fields

```php
$result = $client->getBoardCustomFields($boardId);
```

API Signature:
GET /boards/{boardId}/customFields


#### Get board labels

```php
$result = $client->getBoardLabels($boardId);
```

API Signature:
GET /boards/{boardId}/labels

#### Add board label

```php
$result = $client->addBoardLabel($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/labels

#### Get board label

```php
$result = $client->getBoardLabel($boardId, $labelId);
```

API Signature:
GET /boards/{boardId}/labels/{labelId}

#### Get board lists

```php
$result = $client->getBoardLists($boardId);
```

API Signature:
GET /boards/{boardId}/lists

#### Add board list

```php
$result = $client->addBoardList($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/lists

#### Get board list

```php
$result = $client->getBoardList($boardId, $listId);
```

API Signature:
GET /boards/{boardId}/lists/{listId}

#### Add board mark as viewed

```php
$result = $client->addBoardMarkAsViewed($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/markAsViewed

#### Get board members

```php
$result = $client->getBoardMembers($boardId);
```

API Signature:
GET /boards/{boardId}/members

#### Update board members

```php
$result = $client->updateBoardMembers($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/members

#### Delete board member

```php
$result = $client->deleteBoardMember($boardId, $memberId);
```

API Signature:
DELETE /boards/{boardId}/members/{memberId}

#### Get board member

```php
$result = $client->getBoardMember($boardId, $memberId);
```

API Signature:
GET /boards/{boardId}/members/{memberId}

#### Update board member

```php
$result = $client->updateBoardMember($boardId, $memberId, $attributes);
```

API Signature:
PUT /boards/{boardId}/members/{memberId}

#### Get board member cards

```php
$result = $client->getBoardMemberCards($boardId, $memberId);
```

API Signature:
GET /boards/{boardId}/members/{memberId}/cards

#### Get board memberships

```php
$result = $client->getBoardMemberships($boardId);
```

API Signature:
GET /boards/{boardId}/memberships

#### Get board membership

```php
$result = $client->getBoardMembership($boardId, $membershipId);
```

API Signature:
GET /boards/{boardId}/memberships/{membershipId}

#### Update board membership

```php
$result = $client->updateBoardMembership($boardId, $membershipId, $attributes);
```

API Signature:
PUT /boards/{boardId}/memberships/{membershipId}

#### Get board members inviteds

```php
$result = $client->getBoardMembersInviteds($boardId);
```

API Signature:
GET /boards/{boardId}/membersInvited

#### Get board members invited

```php
$result = $client->getBoardMembersInvited($boardId, $membersInvitedId);
```

API Signature:
GET /boards/{boardId}/membersInvited/{membersInvitedId}

#### Get board my pref

```php
$result = $client->getBoardMyPref($boardId);
```

API Signature:
GET /boards/{boardId}/myPrefs

#### Update board my pref email position

```php
$result = $client->updateBoardMyPrefEmailPosition($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/emailPosition

#### Update board my pref id email list

```php
$result = $client->updateBoardMyPrefIdEmailList($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/idEmailList

#### Update board my pref show list guide

```php
$result = $client->updateBoardMyPrefShowListGuide($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/showListGuide

#### Update board my pref show sidebar

```php
$result = $client->updateBoardMyPrefShowSidebar($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/showSidebar

#### Update board my pref show sidebar activity

```php
$result = $client->updateBoardMyPrefShowSidebarActivity($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/showSidebarActivity

#### Update board my pref show sidebar board action

```php
$result = $client->updateBoardMyPrefShowSidebarBoardAction($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/showSidebarBoardActions

#### Update board my pref show sidebar member

```php
$result = $client->updateBoardMyPrefShowSidebarMember($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/myPrefs/showSidebarMembers

#### Update board name

```php
$result = $client->updateBoardName($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/name

#### Get board organization

```php
$result = $client->getBoardOrganization($boardId);
```

API Signature:
GET /boards/{boardId}/organization

#### Get board organization field

```php
$result = $client->getBoardOrganizationField($boardId, $fieldName);
```

API Signature:
GET /boards/{boardId}/organization/{fieldName}

#### Add board power up

```php
$result = $client->addBoardPowerUp($boardId, $attributes);
```

API Signature:
POST /boards/{boardId}/powerUps

#### Delete board power up

```php
$result = $client->deleteBoardPowerUp($boardId, $powerUpId);
```

API Signature:
DELETE /boards/{boardId}/powerUps/{powerUpId}

#### Update board pref background

```php
$result = $client->updateBoardPrefBackground($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/background

#### Update board pref calendar feed enabled

```php
$result = $client->updateBoardPrefCalendarFeedEnabled($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/calendarFeedEnabled

#### Update board pref card aging

```php
$result = $client->updateBoardPrefCardAging($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/cardAging

#### Update board pref card covers

```php
$result = $client->updateBoardPrefCardCovers($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/cardCovers

#### Update board pref comment

```php
$result = $client->updateBoardPrefComment($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/comments

#### Update board pref invitation

```php
$result = $client->updateBoardPrefInvitation($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/invitations

#### Update board pref permission level

```php
$result = $client->updateBoardPrefPermissionLevel($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/permissionLevel

#### Update board pref self join

```php
$result = $client->updateBoardPrefSelfJoin($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/selfJoin

#### Update board pref voting

```php
$result = $client->updateBoardPrefVoting($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/prefs/voting

#### Update board subscribed

```php
$result = $client->updateBoardSubscribed($boardId, $attributes);
```

API Signature:
PUT /boards/{boardId}/subscribed


### Cards

#### Add card

```php
$result = $client->addCard($attributes);
```

API Signature:
POST /cards

#### Delete card

```php
$result = $client->deleteCard($cardId);
```

API Signature:
DELETE /cards/{cardId}

#### Get card

```php
$result = $client->getCard($cardId);
```

API Signature:
GET /cards/{cardId}

#### Update card

```php
$result = $client->updateCard($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}

#### Get card field

```php
$result = $client->getCardField($cardId, $fieldName);
```

API Signature:
GET /cards/{cardId}/{fieldName}

#### Get card action

```php
$result = $client->getCardAction($cardId);
```

API Signature:
GET /cards/{cardId}/actions

#### Delete card action comment

```php
$result = $client->deleteCardActionComment($cardId, $actionId);
```

API Signature:
DELETE /cards/{cardId}/actions/{actionId}/comments

#### Update card action comments

```php
$result = $client->updateCardActionComments($cardId, $actionId, $attributes);
```

API Signature:
PUT /cards/{cardId}/actions/{actionId}/comments

#### Add card action comment

```php
$result = $client->addCardActionComment($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/actions/comments

#### Get card attachments

```php
$result = $client->getCardAttachments($cardId);
```

API Signature:
GET /cards/{cardId}/attachments

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
POST /cards/{cardId}/attachments

#### Delete card attachment

```php
$result = $client->deleteCardAttachment($cardId, $attachmentId);
```

API Signature:
DELETE /cards/{cardId}/attachments/{attachmentId}

#### Get card attachment

```php
$result = $client->getCardAttachment($cardId, $attachmentId);
```

API Signature:
GET /cards/{cardId}/attachments/{attachmentId}

#### Get card board

```php
$result = $client->getCardBoard($cardId);
```

API Signature:
GET /cards/{cardId}/board

#### Get card board field

```php
$result = $client->getCardBoardField($cardId, $fieldName);
```

API Signature:
GET /cards/{cardId}/board/{fieldName}

#### Get card check item state

```php
$result = $client->getCardCheckItemState($cardId);
```

API Signature:
GET /cards/{cardId}/checkItemStates

#### Add card checklist check item

```php
$result = $client->addCardChecklistCheckItem($cardId, $checklistId, $attributes);
```

API Signature:
POST /cards/{cardId}/checklist/{checklistId}/checkItem

#### Delete card checklist check item

```php
$result = $client->deleteCardChecklistCheckItem($cardId, $checklistId, $checkItemId);
```

API Signature:
DELETE /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}

#### Update card checklist check item

```php
$result = $client->updateCardChecklistCheckItem($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
PUT /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}

#### Add card checklist check item convert to card

```php
$result = $client->addCardChecklistCheckItemConvertToCard($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
POST /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}/convertToCard

#### Update card checklist check item name

```php
$result = $client->updateCardChecklistCheckItemName($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
PUT /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}/name

#### Update card checklist check item pos

```php
$result = $client->updateCardChecklistCheckItemPos($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
PUT /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}/pos

#### Update card checklist check item state

```php
$result = $client->updateCardChecklistCheckItemState($cardId, $checklistId, $checkItemId, $attributes);
```

API Signature:
PUT /cards/{cardId}/checklist/{checklistId}/checkItem/{checkItemId}/state

#### Get card checklists

```php
$result = $client->getCardChecklists($cardId);
```

API Signature:
GET /cards/{cardId}/checklists

#### Add card checklist

```php
$result = $client->addCardChecklist($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/checklists

#### Delete card checklist

```php
$result = $client->deleteCardChecklist($cardId, $checklistId);
```

API Signature:
DELETE /cards/{cardId}/checklists/{checklistId}


#### Get card custom field

```php
$result = $client->getCardCustomField($cardId, $customFieldId);
```

API Signature:
GET /cards/{cardId}/customField/{customFieldId}


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
PUT /cards/{cardId}/customField/{customFieldId}/item


#### Update card closed

```php
$result = $client->updateCardClosed($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/closed

#### Update card desc

```php
$result = $client->updateCardDesc($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/desc

#### Update card due

```php
$result = $client->updateCardDue($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/due

#### Update card id attachment cover

```php
$result = $client->updateCardIdAttachmentCover($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/idAttachmentCover

#### Update card id board

```php
$result = $client->updateCardIdBoard($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/idBoard

#### Add card id label

```php
$result = $client->addCardIdLabel($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/idLabels

#### Delete card id label

```php
$result = $client->deleteCardIdLabel($cardId, $idLabelId);
```

API Signature:
DELETE /cards/{cardId}/idLabels/{idLabelId}

#### Update card id list

```php
$result = $client->updateCardIdList($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/idList

#### Add card id member

```php
$result = $client->addCardIdMember($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/idMembers

#### Update card id members

```php
$result = $client->updateCardIdMembers($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/idMembers

#### Delete card id member

```php
$result = $client->deleteCardIdMember($cardId, $idMemberId);
```

API Signature:
DELETE /cards/{cardId}/idMembers/{idMemberId}

#### Add card label

```php
$result = $client->addCardLabel($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/labels

#### Update card label

```php
$result = $client->updateCardLabel($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/labels

#### Delete card label

```php
$result = $client->deleteCardLabel($cardId, $labelId);
```

API Signature:
DELETE /cards/{cardId}/labels/{labelId}

#### Get card list

```php
$result = $client->getCardList($cardId);
```

API Signature:
GET /cards/{cardId}/list

#### Get card list field

```php
$result = $client->getCardListField($cardId, $fieldName);
```

API Signature:
GET /cards/{cardId}/list/{fieldName}

#### Add card mark associated notifications read

```php
$result = $client->addCardMarkAssociatedNotificationsRead($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/markAssociatedNotificationsRead

#### Get card members

```php
$result = $client->getCardMembers($cardId);
```

API Signature:
GET /cards/{cardId}/members

#### Get card members voted

```php
$result = $client->getCardMembersVoted($cardId);
```

API Signature:
GET /cards/{cardId}/membersVoted

#### Add card members voted

```php
$result = $client->addCardMembersVoted($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/membersVoted

#### Delete card members voted

```php
$result = $client->deleteCardMembersVoted($cardId, $membersVotedId);
```

API Signature:
DELETE /cards/{cardId}/membersVoted/{membersVotedId}

#### Update card name

```php
$result = $client->updateCardName($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/name

#### Update card pos

```php
$result = $client->updateCardPos($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/pos

#### Get card stickers

```php
$result = $client->getCardStickers($cardId);
```

API Signature:
GET /cards/{cardId}/stickers

#### Add card sticker

```php
$result = $client->addCardSticker($cardId, $attributes);
```

API Signature:
POST /cards/{cardId}/stickers

#### Delete card sticker

```php
$result = $client->deleteCardSticker($cardId, $stickerId);
```

API Signature:
DELETE /cards/{cardId}/stickers/{stickerId}

#### Get card sticker

```php
$result = $client->getCardSticker($cardId, $stickerId);
```

API Signature:
GET /cards/{cardId}/stickers/{stickerId}

#### Update card sticker

```php
$result = $client->updateCardSticker($cardId, $stickerId, $attributes);
```

API Signature:
PUT /cards/{cardId}/stickers/{stickerId}

#### Update card subscribed

```php
$result = $client->updateCardSubscribed($cardId, $attributes);
```

API Signature:
PUT /cards/{cardId}/subscribed


### Checklists

#### Add checklist

```php
$result = $client->addChecklist($attributes);
```

API Signature:
POST /checklists

#### Delete checklist

```php
$result = $client->deleteChecklist($checklistId);
```

API Signature:
DELETE /checklists/{checklistId}

#### Get checklist

```php
$result = $client->getChecklist($checklistId);
```

API Signature:
GET /checklists/{checklistId}

#### Update checklist

```php
$result = $client->updateChecklist($checklistId, $attributes);
```

API Signature:
PUT /checklists/{checklistId}

#### Get checklist field

```php
$result = $client->getChecklistField($checklistId, $fieldName);
```

API Signature:
GET /checklists/{checklistId}/{fieldName}

#### Get checklist board

```php
$result = $client->getChecklistBoard($checklistId);
```

API Signature:
GET /checklists/{checklistId}/board

#### Get checklist board field

```php
$result = $client->getChecklistBoardField($checklistId, $fieldName);
```

API Signature:
GET /checklists/{checklistId}/board/{fieldName}

#### Get checklist cards

```php
$result = $client->getChecklistCards($checklistId);
```

API Signature:
GET /checklists/{checklistId}/cards

#### Get checklist card

```php
$result = $client->getChecklistCard($checklistId, $cardId);
```

API Signature:
GET /checklists/{checklistId}/cards/{cardId}

#### Get checklist check items

```php
$result = $client->getChecklistCheckItems($checklistId);
```

API Signature:
GET /checklists/{checklistId}/checkItems

#### Add checklist check item

```php
$result = $client->addChecklistCheckItem($checklistId, $attributes);
```

API Signature:
POST /checklists/{checklistId}/checkItems

#### Delete checklist check item

```php
$result = $client->deleteChecklistCheckItem($checklistId, $checkItemId);
```

API Signature:
DELETE /checklists/{checklistId}/checkItems/{checkItemId}

#### Get checklist check item

```php
$result = $client->getChecklistCheckItem($checklistId, $checkItemId);
```

API Signature:
GET /checklists/{checklistId}/checkItems/{checkItemId}

#### Update checklist id card

```php
$result = $client->updateChecklistIdCard($checklistId, $attributes);
```

API Signature:
PUT /checklists/{checklistId}/idCard

#### Update checklist name

```php
$result = $client->updateChecklistName($checklistId, $attributes);
```

API Signature:
PUT /checklists/{checklistId}/name

#### Update checklist pos

```php
$result = $client->updateChecklistPos($checklistId, $attributes);
```

API Signature:
PUT /checklists/{checklistId}/pos

### CustomFields

#### Create custom field

```php
$result = $client->addCustomField($attributes);
```

API Signature:
POST /customFields


#### Add option to a custom field

```php
$result = $client->addCustomFieldOption($customFieldId, $attributes);
```

API Signature:
POST /customField/{customFieldId}/options


#### Update custom field option

```php
$result = $client->updateCustomFieldOption($customFieldId, $optionId, $attributes);
```

API Signature:
PUT /customField/{customFieldId}/options/{optionId}


#### Delete custom field

```php
$result = $client->deleteCustomField($customFieldId);
```

API Signature:
DELETE /customField/{customFieldId}


### Labels

#### Add label

```php
$result = $client->addLabel($attributes);
```

API Signature:
POST /labels

#### Delete label

```php
$result = $client->deleteLabel($labelId);
```

API Signature:
DELETE /labels/{labelId}

#### Get label

```php
$result = $client->getLabel($labelId);
```

API Signature:
GET /labels/{labelId}

#### Update label

```php
$result = $client->updateLabel($labelId, $attributes);
```

API Signature:
PUT /labels/{labelId}

#### Get label board

```php
$result = $client->getLabelBoard($labelId);
```

API Signature:
GET /labels/{labelId}/board

#### Get label board field

```php
$result = $client->getLabelBoardField($labelId, $fieldName);
```

API Signature:
GET /labels/{labelId}/board/{fieldName}

#### Update label color

```php
$result = $client->updateLabelColor($labelId, $attributes);
```

API Signature:
PUT /labels/{labelId}/color

#### Update label name

```php
$result = $client->updateLabelName($labelId, $attributes);
```

API Signature:
PUT /labels/{labelId}/name


### Lists

#### Add list

```php
$result = $client->addList($attributes);
```

API Signature:
POST /lists

#### Get list

```php
$result = $client->getList($listId);
```

API Signature:
GET /lists/{listId}

#### Update list

```php
$result = $client->updateList($listId, $attributes);
```

API Signature:
PUT /lists/{listId}

#### Get list field

```php
$result = $client->getListField($listId, $fieldName);
```

API Signature:
GET /lists/{listId}/{fieldName}

#### Get list actions

```php
$result = $client->getListActions($listId, $attributes);
```

API Signature:
GET /lists/{listId}/actions

#### Add list archive all cards

```php
$result = $client->addListArchiveAllCards($listId, $attributes);
```

API Signature:
POST /lists/{listId}/archiveAllCards

#### Get list board

```php
$result = $client->getListBoard($listId);
```

API Signature:
GET /lists/{listId}/board

#### Get list board field

```php
$result = $client->getListBoardField($listId, $fieldName);
```

API Signature:
GET /lists/{listId}/board/{fieldName}

#### Get list cards

```php
$result = $client->getListCards($listId);
```

API Signature:
GET /lists/{listId}/cards

#### Add list card

```php
$result = $client->addListCard($listId, $attributes);
```

API Signature:
POST /lists/{listId}/cards

#### Get list card

```php
$result = $client->getListCard($listId, $cardId);
```

API Signature:
GET /lists/{listId}/cards/{cardId}

#### Update list closed

```php
$result = $client->updateListClosed($listId, $attributes);
```

API Signature:
PUT /lists/{listId}/closed

#### Update list id board

```php
$result = $client->updateListIdBoard($listId, $attributes);
```

API Signature:
PUT /lists/{listId}/idBoard

#### Add list move all cards

```php
$result = $client->addListMoveAllCards($listId, $attributes);
```

API Signature:
POST /lists/{listId}/moveAllCards

#### Update list name

```php
$result = $client->updateListName($listId, $attributes);
```

API Signature:
PUT /lists/{listId}/name

#### Update list pos

```php
$result = $client->updateListPos($listId, $attributes);
```

API Signature:
PUT /lists/{listId}/pos

#### Update list subscribed

```php
$result = $client->updateListSubscribed($listId, $attributes);
```

API Signature:
PUT /lists/{listId}/subscribed


### Members

#### Get member

```php
$result = $client->getMember($memberId);
```

API Signature:
GET /members/{memberId}

#### Update member

```php
$result = $client->updateMember($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}

#### Get member field

```php
$result = $client->getMemberField($memberId, $fieldName);
```

API Signature:
GET /members/{memberId}/{fieldName}

#### Get member actions

```php
$result = $client->getMemberActions($memberId, $attributes);
```

API Signature:
GET /members/{memberId}/actions

#### Add member avatar

```php
$result = $client->addMemberAvatar($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/avatar

#### Update member avatar source

```php
$result = $client->updateMemberAvatarSource($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/avatarSource

#### Update member bio

```php
$result = $client->updateMemberBio($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/bio

#### Get member board backgrounds

```php
$result = $client->getMemberBoardBackgrounds($memberId);
```

API Signature:
GET /members/{memberId}/boardBackgrounds

#### Add member board background

```php
$result = $client->addMemberBoardBackground($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/boardBackgrounds

#### Delete member board background

```php
$result = $client->deleteMemberBoardBackground($memberId, $boardBackgroundId);
```

API Signature:
DELETE /members/{memberId}/boardBackgrounds/{boardBackgroundId}

#### Get member board background

```php
$result = $client->getMemberBoardBackground($memberId, $boardBackgroundId);
```

API Signature:
GET /members/{memberId}/boardBackgrounds/{boardBackgroundId}

#### Update member board background

```php
$result = $client->updateMemberBoardBackground($memberId, $boardBackgroundId, $attributes);
```

API Signature:
PUT /members/{memberId}/boardBackgrounds/{boardBackgroundId}

#### Get member boards

```php
$result = $client->getMemberBoards($memberId);
```

API Signature:
GET /members/{memberId}/boards

#### Get member board

```php
$result = $client->getMemberBoard($memberId, $boardId);
```

API Signature:
GET /members/{memberId}/boards/{boardId}

#### Get member boards invited

```php
$result = $client->getMemberBoardsInvited($memberId);
```

API Signature:
GET /members/{memberId}/boardsInvited

#### Get member boards invited field

```php
$result = $client->getMemberBoardsInvitedField($memberId, $fieldName);
```

API Signature:
GET /members/{memberId}/boardsInvited/{fieldName}

#### Get member board stars

```php
$result = $client->getMemberBoardStars($memberId);
```

API Signature:
GET /members/{memberId}/boardStars

#### Add member board star

```php
$result = $client->addMemberBoardStar($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/boardStars

#### Delete member board star

```php
$result = $client->deleteMemberBoardStar($memberId, $boardStarId);
```

API Signature:
DELETE /members/{memberId}/boardStars/{boardStarId}

#### Get member board star

```php
$result = $client->getMemberBoardStar($memberId, $boardStarId);
```

API Signature:
GET /members/{memberId}/boardStars/{boardStarId}

#### Update member board star

```php
$result = $client->updateMemberBoardStar($memberId, $boardStarId, $attributes);
```

API Signature:
PUT /members/{memberId}/boardStars/{boardStarId}

#### Update member board star id board

```php
$result = $client->updateMemberBoardStarIdBoard($memberId, $boardStarId, $attributes);
```

API Signature:
PUT /members/{memberId}/boardStars/{boardStarId}/idBoard

#### Update member board star pos

```php
$result = $client->updateMemberBoardStarPos($memberId, $boardStarId, $attributes);
```

API Signature:
PUT /members/{memberId}/boardStars/{boardStarId}/pos

#### Get member cards

```php
$result = $client->getMemberCards($memberId);
```

API Signature:
GET /members/{memberId}/cards

#### Get member card

```php
$result = $client->getMemberCard($memberId, $cardId);
```

API Signature:
GET /members/{memberId}/cards/{cardId}

#### Get member custom board backgrounds

```php
$result = $client->getMemberCustomBoardBackgrounds($memberId);
```

API Signature:
GET /members/{memberId}/customBoardBackgrounds

#### Add member custom board background

```php
$result = $client->addMemberCustomBoardBackground($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/customBoardBackgrounds

#### Delete member custom board background

```php
$result = $client->deleteMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```

API Signature:
DELETE /members/{memberId}/customBoardBackgrounds/{customBoardBackgroundId}

#### Get member custom board background

```php
$result = $client->getMemberCustomBoardBackground($memberId, $customBoardBackgroundId);
```

API Signature:
GET /members/{memberId}/customBoardBackgrounds/{customBoardBackgroundId}

#### Update member custom board background

```php
$result = $client->updateMemberCustomBoardBackground($memberId, $customBoardBackgroundId, $attributes);
```

API Signature:
PUT /members/{memberId}/customBoardBackgrounds/{customBoardBackgroundId}

#### Get member custom emojis

```php
$result = $client->getMemberCustomEmojis($memberId);
```

API Signature:
GET /members/{memberId}/customEmoji

#### Add member custom emoji

```php
$result = $client->addMemberCustomEmoji($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/customEmoji

#### Get member custom emoji

```php
$result = $client->getMemberCustomEmoji($memberId, $customEmojiId);
```

API Signature:
GET /members/{memberId}/customEmoji/{customEmojiId}

#### Get member custom stickers

```php
$result = $client->getMemberCustomStickers($memberId);
```

API Signature:
GET /members/{memberId}/customStickers

#### Add member custom sticker

```php
$result = $client->addMemberCustomSticker($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/customStickers

#### Delete member custom sticker

```php
$result = $client->deleteMemberCustomSticker($memberId, $customStickerId);
```

API Signature:
DELETE /members/{memberId}/customStickers/{customStickerId}

#### Get member custom sticker

```php
$result = $client->getMemberCustomSticker($memberId, $customStickerId);
```

API Signature:
GET /members/{memberId}/customStickers/{customStickerId}

#### Get member deltas

```php
$result = $client->getMemberDeltas($memberId);
```

API Signature:
GET /members/{memberId}/deltas

#### Update member full name

```php
$result = $client->updateMemberFullName($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/fullName

#### Update member initials

```php
$result = $client->updateMemberInitials($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/initials

#### Get member notifications

```php
$result = $client->getMemberNotifications($memberId);
```

API Signature:
GET /members/{memberId}/notifications

#### Get member notification

```php
$result = $client->getMemberNotification($memberId, $notificationId);
```

API Signature:
GET /members/{memberId}/notifications/{notificationId}

#### Add member one time messages dismissed

```php
$result = $client->addMemberOneTimeMessagesDismissed($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/oneTimeMessagesDismissed

#### Get member organizations

```php
$result = $client->getMemberOrganizations($memberId);
```

API Signature:
GET /members/{memberId}/organizations

#### Get member organization

```php
$result = $client->getMemberOrganization($memberId, $organizationId);
```

API Signature:
GET /members/{memberId}/organizations/{organizationId}

#### Get member organizations invited

```php
$result = $client->getMemberOrganizationsInvited($memberId);
```

API Signature:
GET /members/{memberId}/organizationsInvited

#### Get member organizations invited field

```php
$result = $client->getMemberOrganizationsInvitedField($memberId, $fieldName);
```

API Signature:
GET /members/{memberId}/organizationsInvited/{fieldName}

#### Update member pref color blind

```php
$result = $client->updateMemberPrefColorBlind($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/prefs/colorBlind

#### Update member pref minutes between summaries

```php
$result = $client->updateMemberPrefMinutesBetweenSummaries($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/prefs/minutesBetweenSummaries

#### Get member saved searches

```php
$result = $client->getMemberSavedSearches($memberId);
```

API Signature:
GET /members/{memberId}/savedSearches

#### Add member saved search

```php
$result = $client->addMemberSavedSearch($memberId, $attributes);
```

API Signature:
POST /members/{memberId}/savedSearches

#### Delete member saved search

```php
$result = $client->deleteMemberSavedSearch($memberId, $savedSearcheId);
```

API Signature:
DELETE /members/{memberId}/savedSearches/{savedSearcheId}

#### Get member saved search

```php
$result = $client->getMemberSavedSearch($memberId, $savedSearcheId);
```

API Signature:
GET /members/{memberId}/savedSearches/{savedSearcheId}

#### Update member saved search

```php
$result = $client->updateMemberSavedSearch($memberId, $savedSearcheId, $attributes);
```

API Signature:
PUT /members/{memberId}/savedSearches/{savedSearcheId}

#### Update member saved search name

```php
$result = $client->updateMemberSavedSearchName($memberId, $savedSearcheId, $attributes);
```

API Signature:
PUT /members/{memberId}/savedSearches/{savedSearcheId}/name

#### Update member saved search pos

```php
$result = $client->updateMemberSavedSearchPos($memberId, $savedSearcheId, $attributes);
```

API Signature:
PUT /members/{memberId}/savedSearches/{savedSearcheId}/pos

#### Update member saved search query

```php
$result = $client->updateMemberSavedSearchQuery($memberId, $savedSearcheId, $attributes);
```

API Signature:
PUT /members/{memberId}/savedSearches/{savedSearcheId}/query

#### Get member tokens

```php
$result = $client->getMemberTokens($memberId);
```

API Signature:
GET /members/{memberId}/tokens

#### Update member username

```php
$result = $client->updateMemberUsername($memberId, $attributes);
```

API Signature:
PUT /members/{memberId}/username


### Notifications

#### Get notification

```php
$result = $client->getNotification($notificationId);
```

API Signature:
GET /notifications/{notificationId}

#### Update notification

```php
$result = $client->updateNotification($notificationId, $attributes);
```

API Signature:
PUT /notifications/{notificationId}

#### Get notification field

```php
$result = $client->getNotificationField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/{fieldName}

#### Get notification board

```php
$result = $client->getNotificationBoard($notificationId);
```

API Signature:
GET /notifications/{notificationId}/board

#### Get notification board field

```php
$result = $client->getNotificationBoardField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/board/{fieldName}

#### Get notification card

```php
$result = $client->getNotificationCard($notificationId);
```

API Signature:
GET /notifications/{notificationId}/card

#### Get notification card field

```php
$result = $client->getNotificationCardField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/card/{fieldName}

#### Get notification entities

```php
$result = $client->getNotificationEntities($notificationId);
```

API Signature:
GET /notifications/{notificationId}/entities

#### Get notification list

```php
$result = $client->getNotificationList($notificationId);
```

API Signature:
GET /notifications/{notificationId}/list

#### Get notification list field

```php
$result = $client->getNotificationListField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/list/{fieldName}

#### Get notification member

```php
$result = $client->getNotificationMember($notificationId);
```

API Signature:
GET /notifications/{notificationId}/member

#### Get notification member field

```php
$result = $client->getNotificationMemberField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/member/{fieldName}

#### Get notification member creator

```php
$result = $client->getNotificationMemberCreator($notificationId);
```

API Signature:
GET /notifications/{notificationId}/memberCreator

#### Get notification member creator field

```php
$result = $client->getNotificationMemberCreatorField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/memberCreator/{fieldName}

#### Get notification organization

```php
$result = $client->getNotificationOrganization($notificationId);
```

API Signature:
GET /notifications/{notificationId}/organization

#### Get notification organization field

```php
$result = $client->getNotificationOrganizationField($notificationId, $fieldName);
```

API Signature:
GET /notifications/{notificationId}/organization/{fieldName}

#### Update notification unread

```php
$result = $client->updateNotificationUnread($notificationId, $attributes);
```

API Signature:
PUT /notifications/{notificationId}/unread

#### Add notification all read

```php
$result = $client->addNotificationAllRead($attributes);
```

API Signature:
POST /notifications/all/read


### Organizations

#### Add organization

```php
$result = $client->addOrganization($attributes);
```

API Signature:
POST /organizations

#### Delete organization

```php
$result = $client->deleteOrganization($organizationId);
```

API Signature:
DELETE /organizations/{organizationId}

#### Get organization

```php
$result = $client->getOrganization($organizationId);
```

API Signature:
GET /organizations/{organizationId}

#### Update organization

```php
$result = $client->updateOrganization($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}

#### Get organization field

```php
$result = $client->getOrganizationField($organizationId, $fieldName);
```

API Signature:
GET /organizations/{organizationId}/{fieldName}

#### Get organization actions

```php
$result = $client->getOrganizationActions($organizationId, $attributes);
```

API Signature:
GET /organizations/{organizationId}/actions

#### Get organization boards

```php
$result = $client->getOrganizationBoards($organizationId);
```

API Signature:
GET /organizations/{organizationId}/boards

#### Get organization boards filter

```php
$result = $client->getOrganizationBoardsFilter($organizationId, $filter);
```

API Signature:
GET /organizations/{organizationId}/boards/{filter}

#### Get organization deltas

```php
$result = $client->getOrganizationDeltas($organizationId);
```

API Signature:
GET /organizations/{organizationId}/deltas

#### Update organization desc

```php
$result = $client->updateOrganizationDesc($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/desc

#### Update organization display name

```php
$result = $client->updateOrganizationDisplayName($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/displayName

#### Delete organization logo

```php
$result = $client->deleteOrganizationLogo($organizationId);
```

API Signature:
DELETE /organizations/{organizationId}/logo

#### Add organization logo

```php
$result = $client->addOrganizationLogo($organizationId, $attributes);
```

API Signature:
POST /organizations/{organizationId}/logo

#### Get organization members

```php
$result = $client->getOrganizationMembers($organizationId);
```

API Signature:
GET /organizations/{organizationId}/members

#### Update organization members

```php
$result = $client->updateOrganizationMembers($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/members

#### Delete organization member

```php
$result = $client->deleteOrganizationMember($organizationId, $memberId);
```

API Signature:
DELETE /organizations/{organizationId}/members/{memberId}

#### Get organization members filter

```php
$result = $client->getOrganizationMembersFilter($organizationId, $filter);
```

API Signature:
GET /organizations/{organizationId}/members/{filter}

#### Update organization member

```php
$result = $client->updateOrganizationMember($organizationId, $memberId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/members/{memberId}

#### Delete organization member all

```php
$result = $client->deleteOrganizationMemberAll($organizationId, $memberId);
```

API Signature:
DELETE /organizations/{organizationId}/members/{memberId}/all

#### Get organization member cards

```php
$result = $client->getOrganizationMemberCards($organizationId, $memberId);
```

API Signature:
GET /organizations/{organizationId}/members/{memberId}/cards

#### Update organization member deactivated

```php
$result = $client->updateOrganizationMemberDeactivated($organizationId, $memberId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/members/{memberId}/deactivated

#### Get organization memberships

```php
$result = $client->getOrganizationMemberships($organizationId);
```

API Signature:
GET /organizations/{organizationId}/memberships

#### Get organization membership

```php
$result = $client->getOrganizationMembership($organizationId, $membershipId);
```

API Signature:
GET /organizations/{organizationId}/memberships/{membershipId}

#### Update organization membership

```php
$result = $client->updateOrganizationMembership($organizationId, $membershipId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/memberships/{membershipId}

#### Get organization members invited

```php
$result = $client->getOrganizationMembersInvited($organizationId);
```

API Signature:
GET /organizations/{organizationId}/membersInvited

#### Get organization members invited field

```php
$result = $client->getOrganizationMembersInvitedField($organizationId, $fieldName);
```

API Signature:
GET /organizations/{organizationId}/membersInvited/{fieldName}

#### Update organization name

```php
$result = $client->updateOrganizationName($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/name

#### Delete organization pref associated domain

```php
$result = $client->deleteOrganizationPrefAssociatedDomain($organizationId);
```

API Signature:
DELETE /organizations/{organizationId}/prefs/associatedDomain

#### Update organization pref associated domain

```php
$result = $client->updateOrganizationPrefAssociatedDomain($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/associatedDomain

#### Update organization pref board visibility restrict org

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictOrg($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/boardVisibilityRestrict/org

#### Update organization pref board visibility restrict private

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPrivate($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/boardVisibilityRestrict/private

#### Update organization pref board visibility restrict public

```php
$result = $client->updateOrganizationPrefBoardVisibilityRestrictPublic($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/boardVisibilityRestrict/public

#### Update organization pref external members disabled

```php
$result = $client->updateOrganizationPrefExternalMembersDisabled($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/externalMembersDisabled

#### Update organization pref google apps version

```php
$result = $client->updateOrganizationPrefGoogleAppsVersion($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/googleAppsVersion

#### Delete organization pref org invite restrict

```php
$result = $client->deleteOrganizationPrefOrgInviteRestrict($organizationId);
```

API Signature:
DELETE /organizations/{organizationId}/prefs/orgInviteRestrict

#### Update organization pref org invite restrict

```php
$result = $client->updateOrganizationPrefOrgInviteRestrict($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/orgInviteRestrict

#### Update organization pref permission level

```php
$result = $client->updateOrganizationPrefPermissionLevel($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/prefs/permissionLevel

#### Update organization website

```php
$result = $client->updateOrganizationWebsite($organizationId, $attributes);
```

API Signature:
PUT /organizations/{organizationId}/website


### Search

#### Get search

```php
$result = $client->getSearch($attributes);
```

API Signature:
GET /search

#### Get search member

```php
$result = $client->getSearchMembers($attributes);
```

API Signature:
GET /search/members


### Sessions

#### Add session

```php
$result = $client->addSession($attributes);
```

API Signature:
POST /sessions

#### Update session

```php
$result = $client->updateSession($sessionId, $attributes);
```

API Signature:
PUT /sessions/{sessionId}

#### Update session status

```php
$result = $client->updateSessionStatus($sessionId, $attributes);
```

API Signature:
PUT /sessions/{sessionId}/status

#### Get session socket

```php
$result = $client->getSessionSocket();
```

API Signature:
GET /sessions/socket


### Tokens

#### Delete token

```php
$result = $client->deleteToken($tokenId);
```

API Signature:
DELETE /tokens/{tokenId}

#### Get token

```php
$result = $client->getToken($tokenId);
```

API Signature:
GET /tokens/{token}

#### Get token field

```php
$result = $client->getTokenField($tokenId, $fieldName);
```

API Signature:
GET /tokens/{tokenId}/{fieldName}

#### Get token member

```php
$result = $client->getTokenMember($tokenId);
```

API Signature:
GET /tokens/{tokenId}/member

#### Get token member field

```php
$result = $client->getTokenMemberField($tokenId, $fieldName);
```

API Signature:
GET /tokens/{tokenId}/member/{fieldName}

#### Get token webhooks

```php
$result = $client->getTokenWebhooks($tokenId);
```

API Signature:
GET /tokens/{tokenId}/webhooks

#### Add token webhook

```php
$result = $client->addTokenWebhook($tokenId, $attributes);
```

API Signature:
POST /tokens/{tokenId}/webhooks

#### Update token webhooks

```php
$result = $client->updateTokenWebhooks($tokenId, $attributes);
```

API Signature:
PUT /tokens/{tokenId}/webhooks

#### Delete token webhook

```php
$result = $client->deleteTokenWebhook($tokenId, $webhookId);
```

API Signature:
DELETE /tokens/{tokenId}/webhooks/{webhookId}

#### Get token webhook

```php
$result = $client->getTokenWebhook($tokenId, $webhookId);
```

API Signature:
GET /tokens/{tokenId}/webhooks/{webhookId}


### Types

#### Get type

```php
$result = $client->getType($typeId);
```

API Signature:
GET /types/{typeId}


### Webhooks

#### Add webhook

```php
$result = $client->addWebhook($attributes);
```

API Signature:
POST /webhooks

#### Delete webhook

```php
$result = $client->deleteWebhook($webhookId);
```

API Signature:
DELETE /webhooks/{webhookId}

#### Get webhook

```php
$result = $client->getWebhook($webhookId);
```

API Signature:
GET /webhooks/{webhookId}

#### Update webhook

```php
$result = $client->updateWebhook($webhookId, $attributes);
```

API Signature:
PUT /webhooks/{webhookId}

#### Get webhook field

```php
$result = $client->getWebhookField($webhookId, $fieldName);
```

API Signature:
GET /webhooks/{webhookId}/{fieldName}

#### Update webhook active

```php
$result = $client->updateWebhookActive($webhookId, $attributes);
```

API Signature:
PUT /webhooks/{webhookId}/active

#### Update webhook callback

```php
$result = $client->updateWebhookCallbackURL($webhookId, $attributes);
```

API Signature:
PUT /webhooks/{webhookId}/callbackURL

#### Update webhook description

```php
$result = $client->updateWebhookDescription($webhookId, $attributes);
```

API Signature:
PUT /webhooks/{webhookId}/description

#### Update webhook id model

```php
$result = $client->updateWebhookIdModel($webhookId, $attributes);
```

API Signature:
PUT /webhooks/{webhookId}/idModel

####