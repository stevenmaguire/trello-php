[notstarted]: https://img.shields.io/badge/status-not%20started-orange.svg?style=flat
[tested]: https://img.shields.io/badge/status-tested-green.svg?style=flat
[wip]: https://img.shields.io/badge/status-in%20progress-yellow.svg?style=flat
[pass]: https://img.shields.io/badge/status-not%20pertinent-gray.svg?style=flat

# Progress

## authorization

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/authorize|![tested]|

## action

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/actions/[idAction]|![tested]|
|GET|/1/actions/[idAction]/[field]|![tested]|
|GET|/1/actions/[idAction]/board|![tested]|
|GET|/1/actions/[idAction]/board/[field]|![tested]|
|GET|/1/actions/[idAction]/card|![tested]|
|GET|/1/actions/[idAction]/card/[field]|![tested]|
|GET|/1/actions/[idAction]/entities|![tested]|
|GET|/1/actions/[idAction]/list|![tested]|
|GET|/1/actions/[idAction]/list/[field]|![tested]|
|GET|/1/actions/[idAction]/member|![tested]|
|GET|/1/actions/[idAction]/member/[field]|![tested]|
|GET|/1/actions/[idAction]/memberCreator|![tested]|
|GET|/1/actions/[idAction]/memberCreator/[field]|![tested]|
|GET|/1/actions/[idAction]/organization|![tested]|
|GET|/1/actions/[idAction]/organization/[field]|![tested]|
|PUT|/1/actions/[idAction]|![tested]|
|PUT|/1/actions/[idAction]/text|![tested]|
|DELETE|/1/actions/[idAction]|![tested]|

## batch

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/batch|![tested]|

## board

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/boards/[board_id]|![tested]|
|GET|/1/boards/[board_id]/[field]|![tested]|
|GET|/1/boards/[board_id]/actions|![tested]|
|GET|/1/boards/[board_id]/boardStars|![tested]|
|GET|/1/boards/[board_id]/cards|![tested]|
|GET|/1/boards/[board_id]/cards/[filter]|![tested]|
|GET|/1/boards/[board_id]/cards/[idCard]|![tested]|
|GET|/1/boards/[board_id]/checklists|![tested]|
|GET|/1/boards/[board_id]/deltas|![tested]|
|GET|/1/boards/[board_id]/labels|![tested]|
|GET|/1/boards/[board_id]/labels/[idLabel]|![tested]|
|GET|/1/boards/[board_id]/lists|![tested]|
|GET|/1/boards/[board_id]/lists/[filter]|![tested]|
|GET|/1/boards/[board_id]/members|![tested]|
|GET|/1/boards/[board_id]/members/[filter]|![tested]|
|GET|/1/boards/[board_id]/members/[idMember]/cards|![tested]|
|GET|/1/boards/[board_id]/membersInvited|![tested]|
|GET|/1/boards/[board_id]/membersInvited/[field]|![tested]|
|GET|/1/boards/[board_id]/memberships|![tested]|
|GET|/1/boards/[board_id]/memberships/[idMembership]|![tested]|
|GET|/1/boards/[board_id]/myPrefs|![tested]|
|GET|/1/boards/[board_id]/organization|![tested]|
|GET|/1/boards/[board_id]/organization/[field]|![tested]|
|PUT|/1/boards/[board_id]|![tested]|
|PUT|/1/boards/[board_id]/closed|![tested]|
|PUT|/1/boards/[board_id]/desc|![tested]|
|PUT|/1/boards/[board_id]/idOrganization|![tested]|
|PUT|/1/boards/[board_id]/labelNames/blue|![tested]|
|PUT|/1/boards/[board_id]/labelNames/green|![tested]|
|PUT|/1/boards/[board_id]/labelNames/orange|![tested]|
|PUT|/1/boards/[board_id]/labelNames/purple|![tested]|
|PUT|/1/boards/[board_id]/labelNames/red|![tested]|
|PUT|/1/boards/[board_id]/labelNames/yellow|![tested]|
|PUT|/1/boards/[board_id]/members|![tested]|
|PUT|/1/boards/[board_id]/members/[idMember]|![tested]|
|PUT|/1/boards/[board_id]/memberships/[idMembership]|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/emailPosition|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/idEmailList|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/showListGuide|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebar|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarActivity|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarBoardActions|![tested]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarMembers|![tested]|
|PUT|/1/boards/[board_id]/name|![tested]|
|PUT|/1/boards/[board_id]/prefs/background|![tested]|
|PUT|/1/boards/[board_id]/prefs/calendarFeedEnabled|![tested]|
|PUT|/1/boards/[board_id]/prefs/cardAging|![tested]|
|PUT|/1/boards/[board_id]/prefs/cardCovers|![tested]|
|PUT|/1/boards/[board_id]/prefs/comments|![tested]|
|PUT|/1/boards/[board_id]/prefs/invitations|![tested]|
|PUT|/1/boards/[board_id]/prefs/permissionLevel|![tested]|
|PUT|/1/boards/[board_id]/prefs/selfJoin|![tested]|
|PUT|/1/boards/[board_id]/prefs/voting|![tested]|
|PUT|/1/boards/[board_id]/subscribed|![tested]|
|POST|/1/boards|![tested]|
|POST|/1/boards/[board_id]/calendarKey/generate|![tested]|
|POST|/1/boards/[board_id]/checklists|![tested]|
|POST|/1/boards/[board_id]/emailKey/generate|![tested]|
|POST|/1/boards/[board_id]/labels|![tested]|
|POST|/1/boards/[board_id]/lists|![tested]|
|POST|/1/boards/[board_id]/markAsViewed|![tested]|
|POST|/1/boards/[board_id]/powerUps|![tested]|
|DELETE|/1/boards/[board_id]/members/[idMember]|![tested]|
|DELETE|/1/boards/[board_id]/powerUps/[powerUp]|![tested]|

## card

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/cards/[card id or shortlink]|![tested]|
|GET|/1/cards/[card id or shortlink]/[field]|![tested]|
|GET|/1/cards/[card id or shortlink]/actions|![tested]|
|GET|/1/cards/[card id or shortlink]/attachments|![tested]|
|GET|/1/cards/[card id or shortlink]/attachments/[idAttachment]|![tested]|
|GET|/1/cards/[card id or shortlink]/board|![tested]|
|GET|/1/cards/[card id or shortlink]/board/[field]|![tested]|
|GET|/1/cards/[card id or shortlink]/checkItemStates|![tested]|
|GET|/1/cards/[card id or shortlink]/checklists|![tested]|
|GET|/1/cards/[card id or shortlink]/list|![tested]|
|GET|/1/cards/[card id or shortlink]/list/[field]|![tested]|
|GET|/1/cards/[card id or shortlink]/members|![tested]|
|GET|/1/cards/[card id or shortlink]/membersVoted|![tested]|
|GET|/1/cards/[card id or shortlink]/stickers|![tested]|
|GET|/1/cards/[card id or shortlink]/stickers/[idSticker]|![tested]|
|PUT|/1/cards/[card id or shortlink]|![tested]|
|PUT|/1/cards/[card id or shortlink]/actions/[idAction]/comments|![tested]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/name|![tested]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/pos|![tested]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/state|![tested]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklistCurrent]/checkItem/[idCheckItem]|![tested]|
|PUT|/1/cards/[card id or shortlink]/closed|![tested]|
|PUT|/1/cards/[card id or shortlink]/desc|![tested]|
|PUT|/1/cards/[card id or shortlink]/due|![tested]|
|PUT|/1/cards/[card id or shortlink]/idAttachmentCover|![tested]|
|PUT|/1/cards/[card id or shortlink]/idBoard|![tested]|
|PUT|/1/cards/[card id or shortlink]/idList|![tested]|
|PUT|/1/cards/[card id or shortlink]/idMembers|![tested]|
|PUT|/1/cards/[card id or shortlink]/labels|![tested]|
|PUT|/1/cards/[card id or shortlink]/name|![tested]|
|PUT|/1/cards/[card id or shortlink]/pos|![tested]|
|PUT|/1/cards/[card id or shortlink]/stickers/[idSticker]|![tested]|
|PUT|/1/cards/[card id or shortlink]/subscribed|![tested]|
|POST|/1/cards|![tested]|
|POST|/1/cards/[card id or shortlink]/actions/comments|![tested]|
|POST|/1/cards/[card id or shortlink]/attachments|![tested]|
|POST|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem|![tested]|
|POST|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/convertToCard|![tested]|
|POST|/1/cards/[card id or shortlink]/checklists|![tested]|
|POST|/1/cards/[card id or shortlink]/idLabels|![tested]|
|POST|/1/cards/[card id or shortlink]/idMembers|![tested]|
|POST|/1/cards/[card id or shortlink]/labels|![tested]|
|POST|/1/cards/[card id or shortlink]/markAssociatedNotificationsRead|![tested]|
|POST|/1/cards/[card id or shortlink]/membersVoted|![tested]|
|POST|/1/cards/[card id or shortlink]/stickers|![tested]|
|DELETE|/1/cards/[card id or shortlink]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/actions/[idAction]/comments|![tested]|
|DELETE|/1/cards/[card id or shortlink]/attachments/[idAttachment]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/checklists/[idChecklist]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/idLabels/[idLabel]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/idMembers/[idMember]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/labels/[color]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/membersVoted/[idMember]|![tested]|
|DELETE|/1/cards/[card id or shortlink]/stickers/[idSticker]|![tested]|

## checklist

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/checklists/[idChecklist]|![tested]|
|GET|/1/checklists/[idChecklist]/[field]|![tested]|
|GET|/1/checklists/[idChecklist]/board|![tested]|
|GET|/1/checklists/[idChecklist]/board/[field]|![tested]|
|GET|/1/checklists/[idChecklist]/cards|![tested]|
|GET|/1/checklists/[idChecklist]/cards/[filter]|![tested]|
|GET|/1/checklists/[idChecklist]/checkItems|![tested]|
|GET|/1/checklists/[idChecklist]/checkItems/[idCheckItem]|![tested]|
|PUT|/1/checklists/[idChecklist]|![tested]|
|PUT|/1/checklists/[idChecklist]/idCard|![tested]|
|PUT|/1/checklists/[idChecklist]/name|![tested]|
|PUT|/1/checklists/[idChecklist]/pos|![tested]|
|POST|/1/checklists|![tested]|
|POST|/1/checklists/[idChecklist]/checkItems|![tested]|
|DELETE|/1/checklists/[idChecklist]|![tested]|
|DELETE|/1/checklists/[idChecklist]/checkItems/[idCheckItem]|![tested]|

## label

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/labels/[idLabel]|![tested]|
|GET|/1/labels/[idLabel]/board|![tested]|
|GET|/1/labels/[idLabel]/board/[field]|![tested]|
|PUT|/1/labels/[idLabel]|![tested]|
|PUT|/1/labels/[idLabel]/color|![tested]|
|PUT|/1/labels/[idLabel]/name|![tested]|
|POST|/1/labels|![tested]|
|DELETE|/1/labels/[idLabel]|![tested]|

## list

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/lists/[idList]|![tested]|
|GET|/1/lists/[idList]/[field]|![tested]|
|GET|/1/lists/[idList]/actions|![tested]|
|GET|/1/lists/[idList]/board|![tested]|
|GET|/1/lists/[idList]/board/[field]|![tested]|
|GET|/1/lists/[idList]/cards|![tested]|
|GET|/1/lists/[idList]/cards/[filter]|![tested]|
|PUT|/1/lists/[idList]|![tested]|
|PUT|/1/lists/[idList]/closed|![tested]|
|PUT|/1/lists/[idList]/idBoard|![tested]|
|PUT|/1/lists/[idList]/name|![tested]|
|PUT|/1/lists/[idList]/pos|![tested]|
|PUT|/1/lists/[idList]/subscribed|![tested]|
|POST|/1/lists|![tested]|
|POST|/1/lists/[idList]/archiveAllCards|![tested]|
|POST|/1/lists/[idList]/cards|![tested]|
|POST|/1/lists/[idList]/moveAllCards|![tested]|

## member

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/members/[idMember or username]|![tested]|
|GET|/1/members/[idMember or username]/[field]|![tested]|
|GET|/1/members/[idMember or username]/actions|![tested]|
|GET|/1/members/[idMember or username]/boardBackgrounds|![tested]|
|GET|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![tested]|
|GET|/1/members/[idMember or username]/boardStars|![tested]|
|GET|/1/members/[idMember or username]/boardStars/[idBoardStar]|![tested]|
|GET|/1/members/[idMember or username]/boards|![tested]|
|GET|/1/members/[idMember or username]/boards/[filter]|![tested]|
|GET|/1/members/[idMember or username]/boardsInvited|![tested]|
|GET|/1/members/[idMember or username]/boardsInvited/[field]|![tested]|
|GET|/1/members/[idMember or username]/cards|![tested]|
|GET|/1/members/[idMember or username]/cards/[filter]|![tested]|
|GET|/1/members/[idMember or username]/customBoardBackgrounds|![tested]|
|GET|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![tested]|
|GET|/1/members/[idMember or username]/customEmoji|![tested]|
|GET|/1/members/[idMember or username]/customEmoji/[idCustomEmoji]|![tested]|
|GET|/1/members/[idMember or username]/customStickers|![tested]|
|GET|/1/members/[idMember or username]/customStickers/[idCustomSticker]|![tested]|
|GET|/1/members/[idMember or username]/deltas|![tested]|
|GET|/1/members/[idMember or username]/notifications|![tested]|
|GET|/1/members/[idMember or username]/notifications/[filter]|![tested]|
|GET|/1/members/[idMember or username]/organizations|![tested]|
|GET|/1/members/[idMember or username]/organizations/[filter]|![tested]|
|GET|/1/members/[idMember or username]/organizationsInvited|![tested]|
|GET|/1/members/[idMember or username]/organizationsInvited/[field]|![tested]|
|GET|/1/members/[idMember or username]/savedSearches|![tested]|
|GET|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![tested]|
|GET|/1/members/[idMember or username]/tokens|![tested]|
|PUT|/1/members/[idMember or username]|![tested]|
|PUT|/1/members/[idMember or username]/avatarSource|![tested]|
|PUT|/1/members/[idMember or username]/bio|![tested]|
|PUT|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![tested]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]|![tested]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]/idBoard|![tested]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]/pos|![tested]|
|PUT|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![tested]|
|PUT|/1/members/[idMember or username]/fullName|![tested]|
|PUT|/1/members/[idMember or username]/initials|![tested]|
|PUT|/1/members/[idMember or username]/prefs/colorBlind|![tested]|
|PUT|/1/members/[idMember or username]/prefs/minutesBetweenSummaries|![tested]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![tested]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/name|![tested]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/pos|![tested]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/query|![tested]|
|PUT|/1/members/[idMember or username]/username|![tested]|
|POST|/1/members/[idMember or username]/avatar|![tested]|
|POST|/1/members/[idMember or username]/boardBackgrounds|![tested]|
|POST|/1/members/[idMember or username]/boardStars|![tested]|
|POST|/1/members/[idMember or username]/customBoardBackgrounds|![tested]|
|POST|/1/members/[idMember or username]/customEmoji|![tested]|
|POST|/1/members/[idMember or username]/customStickers|![tested]|
|POST|/1/members/[idMember or username]/oneTimeMessagesDismissed|![tested]|
|POST|/1/members/[idMember or username]/savedSearches|![tested]|
|DELETE|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![tested]|
|DELETE|/1/members/[idMember or username]/boardStars/[idBoardStar]|![tested]|
|DELETE|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![tested]|
|DELETE|/1/members/[idMember or username]/customStickers/[idCustomSticker]|![tested]|
|DELETE|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![tested]|

## notification

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/notifications/[idNotification]|![tested]|
|GET|/1/notifications/[idNotification]/[field]|![tested]|
|GET|/1/notifications/[idNotification]/board|![tested]|
|GET|/1/notifications/[idNotification]/board/[field]|![tested]|
|GET|/1/notifications/[idNotification]/card|![tested]|
|GET|/1/notifications/[idNotification]/card/[field]|![tested]|
|GET|/1/notifications/[idNotification]/entities|![tested]|
|GET|/1/notifications/[idNotification]/list|![tested]|
|GET|/1/notifications/[idNotification]/list/[field]|![tested]|
|GET|/1/notifications/[idNotification]/member|![tested]|
|GET|/1/notifications/[idNotification]/member/[field]|![tested]|
|GET|/1/notifications/[idNotification]/memberCreator|![tested]|
|GET|/1/notifications/[idNotification]/memberCreator/[field]|![tested]|
|GET|/1/notifications/[idNotification]/organization|![tested]|
|GET|/1/notifications/[idNotification]/organization/[field]|![tested]|
|PUT|/1/notifications/[idNotification]|![tested]|
|PUT|/1/notifications/[idNotification]/unread|![tested]|
|POST|/1/notifications/all/read|![tested]|

## organization

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/organizations/[idOrg or name]|![tested]|
|GET|/1/organizations/[idOrg or name]/[field]|![tested]|
|GET|/1/organizations/[idOrg or name]/actions|![tested]|
|GET|/1/organizations/[idOrg or name]/boards|![tested]|
|GET|/1/organizations/[idOrg or name]/boards/[filter]|![tested]|
|GET|/1/organizations/[idOrg or name]/deltas|![tested]|
|GET|/1/organizations/[idOrg or name]/members|![tested]|
|GET|/1/organizations/[idOrg or name]/members/[filter]|![tested]|
|GET|/1/organizations/[idOrg or name]/members/[idMember]/cards|![tested]|
|GET|/1/organizations/[idOrg or name]/membersInvited|![tested]|
|GET|/1/organizations/[idOrg or name]/membersInvited/[field]|![tested]|
|GET|/1/organizations/[idOrg or name]/memberships|![tested]|
|GET|/1/organizations/[idOrg or name]/memberships/[idMembership]|![tested]|
|PUT|/1/organizations/[idOrg or name]|![tested]|
|PUT|/1/organizations/[idOrg or name]/desc|![tested]|
|PUT|/1/organizations/[idOrg or name]/displayName|![tested]|
|PUT|/1/organizations/[idOrg or name]/members|![tested]|
|PUT|/1/organizations/[idOrg or name]/members/[idMember]|![tested]|
|PUT|/1/organizations/[idOrg or name]/members/[idMember]/deactivated|![tested]|
|PUT|/1/organizations/[idOrg or name]/memberships/[idMembership]|![tested]|
|PUT|/1/organizations/[idOrg or name]/name|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/associatedDomain|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/org|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/private|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/public|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/externalMembersDisabled|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/googleAppsVersion|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/orgInviteRestrict|![tested]|
|PUT|/1/organizations/[idOrg or name]/prefs/permissionLevel|![tested]|
|PUT|/1/organizations/[idOrg or name]/website|![tested]|
|POST|/1/organizations|![tested]|
|POST|/1/organizations/[idOrg or name]/logo|![tested]|
|DELETE|/1/organizations/[idOrg or name]|![tested]|
|DELETE|/1/organizations/[idOrg or name]/logo|![tested]|
|DELETE|/1/organizations/[idOrg or name]/members/[idMember]|![tested]|
|DELETE|/1/organizations/[idOrg or name]/members/[idMember]/all|![tested]|
|DELETE|/1/organizations/[idOrg or name]/prefs/associatedDomain|![tested]|
|DELETE|/1/organizations/[idOrg or name]/prefs/orgInviteRestrict|![tested]|

## search

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/search|![tested]|
|GET|/1/search/members|![tested]|

## session

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/sessions/socket|![tested]|
|PUT|/1/sessions/[idSession]|![tested]|
|PUT|/1/sessions/[idSession]/status|![tested]|
|POST|/1/sessions|![tested]|

## token

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/tokens/[token]|![tested]|
|GET|/1/tokens/[token]/[field]|![tested]|
|GET|/1/tokens/[token]/member|![tested]|
|GET|/1/tokens/[token]/member/[field]|![tested]|
|GET|/1/tokens/[token]/webhooks|![tested]|
|GET|/1/tokens/[token]/webhooks/[idWebhook]|![tested]|
|PUT|/1/tokens/[token]/webhooks|![tested]|
|POST|/1/tokens/[token]/webhooks|![tested]|
|DELETE|/1/tokens/[token]|![tested]|
|DELETE|/1/tokens/[token]/webhooks/[idWebhook]|![tested]|

## type

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/types/[id]|![tested]|

## webhook

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/webhooks/[idWebhook]|![tested]|
|GET|/1/webhooks/[idWebhook]/[field]|![tested]|
|PUT|/1/webhooks/[idWebhook]|![tested]|
|PUT|/1/webhooks/|![tested]|
|PUT|/1/webhooks/[idWebhook]/active|![tested]|
|PUT|/1/webhooks/[idWebhook]/callbackURL|![tested]|
|PUT|/1/webhooks/[idWebhook]/description|![tested]|
|PUT|/1/webhooks/[idWebhook]/idModel|![tested]|
|POST|/1/webhooks|![tested]|
|DELETE|/1/webhooks/[idWebhook]|![tested]|
