[notstarted]: https://img.shields.io/badge/status-not%20started-orange.svg?style=flat
[tested]: https://img.shields.io/badge/status-tested-green.svg?style=flat
[wip]: https://img.shields.io/badge/status-in%20progress-yellow.svg?style=flat

# Progress

## authorization

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/authorize|![tested]|

## action

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/actions/[idAction]|![notstarted]|
|GET|/1/actions/[idAction]/[field]|![notstarted]|
|GET|/1/actions/[idAction]/board|![notstarted]|
|GET|/1/actions/[idAction]/board/[field]|![notstarted]|
|GET|/1/actions/[idAction]/card|![notstarted]|
|GET|/1/actions/[idAction]/card/[field]|![notstarted]|
|GET|/1/actions/[idAction]/entities|![notstarted]|
|GET|/1/actions/[idAction]/list|![notstarted]|
|GET|/1/actions/[idAction]/list/[field]|![notstarted]|
|GET|/1/actions/[idAction]/member|![notstarted]|
|GET|/1/actions/[idAction]/member/[field]|![notstarted]|
|GET|/1/actions/[idAction]/memberCreator|![notstarted]|
|GET|/1/actions/[idAction]/memberCreator/[field]|![notstarted]|
|GET|/1/actions/[idAction]/organization|![notstarted]|
|GET|/1/actions/[idAction]/organization/[field]|![notstarted]|
|PUT|/1/actions/[idAction]|![notstarted]|
|PUT|/1/actions/[idAction]/text|![notstarted]|
|DELETE|/1/actions/[idAction]|![notstarted]|

## batch

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/batch|![tested]|

## board

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/boards/[board_id]|![tested]|
|GET|/1/boards/[board_id]/[field]|![notstarted]|
|GET|/1/boards/[board_id]/actions|![notstarted]|
|GET|/1/boards/[board_id]/boardStars|![notstarted]|
|GET|/1/boards/[board_id]/cards|![tested]|
|GET|/1/boards/[board_id]/cards/[filter]|![notstarted]|
|GET|/1/boards/[board_id]/cards/[idCard]|![notstarted]|
|GET|/1/boards/[board_id]/checklists|![notstarted]|
|GET|/1/boards/[board_id]/deltas|![notstarted]|
|GET|/1/boards/[board_id]/labels|![notstarted]|
|GET|/1/boards/[board_id]/labels/[idLabel]|![notstarted]|
|GET|/1/boards/[board_id]/lists|![tested]|
|GET|/1/boards/[board_id]/lists/[filter]|![notstarted]|
|GET|/1/boards/[board_id]/members|![notstarted]|
|GET|/1/boards/[board_id]/members/[filter]|![notstarted]|
|GET|/1/boards/[board_id]/members/[idMember]/cards|![notstarted]|
|GET|/1/boards/[board_id]/membersInvited|![notstarted]|
|GET|/1/boards/[board_id]/membersInvited/[field]|![notstarted]|
|GET|/1/boards/[board_id]/memberships|![notstarted]|
|GET|/1/boards/[board_id]/memberships/[idMembership]|![notstarted]|
|GET|/1/boards/[board_id]/myPrefs|![notstarted]|
|GET|/1/boards/[board_id]/organization|![notstarted]|
|GET|/1/boards/[board_id]/organization/[field]|![notstarted]|
|PUT|/1/boards/[board_id]|![notstarted]|
|PUT|/1/boards/[board_id]/closed|![tested]|
|PUT|/1/boards/[board_id]/desc|![tested]|
|PUT|/1/boards/[board_id]/idOrganization|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/blue|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/green|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/orange|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/purple|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/red|![notstarted]|
|PUT|/1/boards/[board_id]/labelNames/yellow|![notstarted]|
|PUT|/1/boards/[board_id]/members|![notstarted]|
|PUT|/1/boards/[board_id]/members/[idMember]|![notstarted]|
|PUT|/1/boards/[board_id]/memberships/[idMembership]|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/emailPosition|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/idEmailList|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/showListGuide|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebar|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarActivity|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarBoardActions|![notstarted]|
|PUT|/1/boards/[board_id]/myPrefs/showSidebarMembers|![notstarted]|
|PUT|/1/boards/[board_id]/name|![tested]|
|PUT|/1/boards/[board_id]/prefs/background|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/calendarFeedEnabled|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/cardAging|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/cardCovers|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/comments|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/invitations|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/permissionLevel|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/selfJoin|![notstarted]|
|PUT|/1/boards/[board_id]/prefs/voting|![notstarted]|
|PUT|/1/boards/[board_id]/subscribed|![notstarted]|
|POST|/1/boards|![tested]|
|POST|/1/boards/[board_id]/calendarKey/generate|![tested]|
|POST|/1/boards/[board_id]/checklists|![tested]|
|POST|/1/boards/[board_id]/emailKey/generate|![tested]|
|POST|/1/boards/[board_id]/labels|![notstarted]|
|POST|/1/boards/[board_id]/lists|![tested]|
|POST|/1/boards/[board_id]/markAsViewed|![tested]|
|POST|/1/boards/[board_id]/powerUps|![tested]|
|DELETE|/1/boards/[board_id]/members/[idMember]|![notstarted]|
|DELETE|/1/boards/[board_id]/powerUps/[powerUp]|![tested]|

## card

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/cards/[card id or shortlink]|![wip]|
|GET|/1/cards/[card id or shortlink]/[field]|![notstarted]|
|GET|/1/cards/[card id or shortlink]/actions|![notstarted]|
|GET|/1/cards/[card id or shortlink]/attachments|![notstarted]|
|GET|/1/cards/[card id or shortlink]/attachments/[idAttachment]|![notstarted]|
|GET|/1/cards/[card id or shortlink]/board|![notstarted]|
|GET|/1/cards/[card id or shortlink]/board/[field]|![notstarted]|
|GET|/1/cards/[card id or shortlink]/checkItemStates|![notstarted]|
|GET|/1/cards/[card id or shortlink]/checklists|![notstarted]|
|GET|/1/cards/[card id or shortlink]/list|![notstarted]|
|GET|/1/cards/[card id or shortlink]/list/[field]|![notstarted]|
|GET|/1/cards/[card id or shortlink]/members|![notstarted]|
|GET|/1/cards/[card id or shortlink]/membersVoted|![notstarted]|
|GET|/1/cards/[card id or shortlink]/stickers|![notstarted]|
|GET|/1/cards/[card id or shortlink]/stickers/[idSticker]|![notstarted]|
|PUT|/1/cards/[card id or shortlink]|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/actions/[idAction]/comments|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/name|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/pos|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/state|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/checklist/[idChecklistCurrent]/checkItem/[idCheckItem]|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/closed|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/desc|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/due|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/idAttachmentCover|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/idBoard|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/idList|![tested]|
|PUT|/1/cards/[card id or shortlink]/idMembers|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/labels|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/name|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/pos|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/stickers/[idSticker]|![notstarted]|
|PUT|/1/cards/[card id or shortlink]/subscribed|![notstarted]|
|POST|/1/cards|![tested]|
|POST|/1/cards/[card id or shortlink]/actions/comments|![notstarted]|
|POST|/1/cards/[card id or shortlink]/attachments|![notstarted]|
|POST|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem|![notstarted]|
|POST|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]/convertToCard|![notstarted]|
|POST|/1/cards/[card id or shortlink]/checklists|![notstarted]|
|POST|/1/cards/[card id or shortlink]/idLabels|![notstarted]|
|POST|/1/cards/[card id or shortlink]/idMembers|![notstarted]|
|POST|/1/cards/[card id or shortlink]/labels|![notstarted]|
|POST|/1/cards/[card id or shortlink]/markAssociatedNotificationsRead|![notstarted]|
|POST|/1/cards/[card id or shortlink]/membersVoted|![notstarted]|
|POST|/1/cards/[card id or shortlink]/stickers|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/actions/[idAction]/comments|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/attachments/[idAttachment]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/checklist/[idChecklist]/checkItem/[idCheckItem]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/checklists/[idChecklist]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/idLabels/[idLabel]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/idMembers/[idMember]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/labels/[color]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/membersVoted/[idMember]|![notstarted]|
|DELETE|/1/cards/[card id or shortlink]/stickers/[idSticker]|![notstarted]|

## checklist

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/checklists/[idChecklist]|![notstarted]|
|GET|/1/checklists/[idChecklist]/[field]|![notstarted]|
|GET|/1/checklists/[idChecklist]/board|![notstarted]|
|GET|/1/checklists/[idChecklist]/board/[field]|![notstarted]|
|GET|/1/checklists/[idChecklist]/cards|![notstarted]|
|GET|/1/checklists/[idChecklist]/cards/[filter]|![notstarted]|
|GET|/1/checklists/[idChecklist]/checkItems|![notstarted]|
|GET|/1/checklists/[idChecklist]/checkItems/[idCheckItem]|![notstarted]|
|PUT|/1/checklists/[idChecklist]|![notstarted]|
|PUT|/1/checklists/[idChecklist]/idCard|![notstarted]|
|PUT|/1/checklists/[idChecklist]/name|![notstarted]|
|PUT|/1/checklists/[idChecklist]/pos|![notstarted]|
|POST|/1/checklists|![tested]|
|POST|/1/checklists/[idChecklist]/checkItems|![notstarted]|
|DELETE|/1/checklists/[idChecklist]|![notstarted]|
|DELETE|/1/checklists/[idChecklist]/checkItems/[idCheckItem]|![notstarted]|

## label

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/labels/[idLabel]|![notstarted]|
|GET|/1/labels/[idLabel]/board|![notstarted]|
|GET|/1/labels/[idLabel]/board/[field]|![notstarted]|
|PUT|/1/labels/[idLabel]|![notstarted]|
|PUT|/1/labels/[idLabel]/color|![notstarted]|
|PUT|/1/labels/[idLabel]/name|![notstarted]|
|POST|/1/labels|![notstarted]|
|DELETE|/1/labels/[idLabel]|![notstarted]|

## list

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/lists/[idList]|![wip]|
|GET|/1/lists/[idList]/[field]|![notstarted]|
|GET|/1/lists/[idList]/actions|![notstarted]|
|GET|/1/lists/[idList]/board|![notstarted]|
|GET|/1/lists/[idList]/board/[field]|![notstarted]|
|GET|/1/lists/[idList]/cards|![tested]|
|GET|/1/lists/[idList]/cards/[filter]|![notstarted]|
|PUT|/1/lists/[idList]|![notstarted]|
|PUT|/1/lists/[idList]/closed|![notstarted]|
|PUT|/1/lists/[idList]/idBoard|![notstarted]|
|PUT|/1/lists/[idList]/name|![notstarted]|
|PUT|/1/lists/[idList]/pos|![notstarted]|
|PUT|/1/lists/[idList]/subscribed|![notstarted]|
|POST|/1/lists|![tested]|
|POST|/1/lists/[idList]/archiveAllCards|![notstarted]|
|POST|/1/lists/[idList]/cards|![notstarted]|
|POST|/1/lists/[idList]/moveAllCards|![notstarted]|

## member

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/members/[idMember or username]|![tested]|
|GET|/1/members/[idMember or username]/[field]|![notstarted]|
|GET|/1/members/[idMember or username]/actions|![notstarted]|
|GET|/1/members/[idMember or username]/boardBackgrounds|![notstarted]|
|GET|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![notstarted]|
|GET|/1/members/[idMember or username]/boardStars|![notstarted]|
|GET|/1/members/[idMember or username]/boardStars/[idBoardStar]|![notstarted]|
|GET|/1/members/[idMember or username]/boards|![notstarted]|
|GET|/1/members/[idMember or username]/boards/[filter]|![notstarted]|
|GET|/1/members/[idMember or username]/boardsInvited|![notstarted]|
|GET|/1/members/[idMember or username]/boardsInvited/[field]|![notstarted]|
|GET|/1/members/[idMember or username]/cards|![notstarted]|
|GET|/1/members/[idMember or username]/cards/[filter]|![notstarted]|
|GET|/1/members/[idMember or username]/customBoardBackgrounds|![notstarted]|
|GET|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![notstarted]|
|GET|/1/members/[idMember or username]/customEmoji|![notstarted]|
|GET|/1/members/[idMember or username]/customEmoji/[idCustomEmoji]|![notstarted]|
|GET|/1/members/[idMember or username]/customStickers|![notstarted]|
|GET|/1/members/[idMember or username]/customStickers/[idCustomSticker]|![notstarted]|
|GET|/1/members/[idMember or username]/deltas|![notstarted]|
|GET|/1/members/[idMember or username]/notifications|![notstarted]|
|GET|/1/members/[idMember or username]/notifications/[filter]|![notstarted]|
|GET|/1/members/[idMember or username]/organizations|![notstarted]|
|GET|/1/members/[idMember or username]/organizations/[filter]|![notstarted]|
|GET|/1/members/[idMember or username]/organizationsInvited|![notstarted]|
|GET|/1/members/[idMember or username]/organizationsInvited/[field]|![notstarted]|
|GET|/1/members/[idMember or username]/savedSearches|![notstarted]|
|GET|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![notstarted]|
|GET|/1/members/[idMember or username]/tokens|![notstarted]|
|PUT|/1/members/[idMember or username]|![notstarted]|
|PUT|/1/members/[idMember or username]/avatarSource|![notstarted]|
|PUT|/1/members/[idMember or username]/bio|![notstarted]|
|PUT|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![notstarted]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]|![notstarted]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]/idBoard|![notstarted]|
|PUT|/1/members/[idMember or username]/boardStars/[idBoardStar]/pos|![notstarted]|
|PUT|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![notstarted]|
|PUT|/1/members/[idMember or username]/fullName|![notstarted]|
|PUT|/1/members/[idMember or username]/initials|![notstarted]|
|PUT|/1/members/[idMember or username]/prefs/colorBlind|![notstarted]|
|PUT|/1/members/[idMember or username]/prefs/minutesBetweenSummaries|![notstarted]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![notstarted]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/name|![notstarted]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/pos|![notstarted]|
|PUT|/1/members/[idMember or username]/savedSearches/[idSavedSearch]/query|![notstarted]|
|PUT|/1/members/[idMember or username]/username|![notstarted]|
|POST|/1/members/[idMember or username]/avatar|![notstarted]|
|POST|/1/members/[idMember or username]/boardBackgrounds|![notstarted]|
|POST|/1/members/[idMember or username]/boardStars|![notstarted]|
|POST|/1/members/[idMember or username]/customBoardBackgrounds|![notstarted]|
|POST|/1/members/[idMember or username]/customEmoji|![notstarted]|
|POST|/1/members/[idMember or username]/customStickers|![notstarted]|
|POST|/1/members/[idMember or username]/oneTimeMessagesDismissed|![notstarted]|
|POST|/1/members/[idMember or username]/savedSearches|![notstarted]|
|DELETE|/1/members/[idMember or username]/boardBackgrounds/[idBoardBackground]|![notstarted]|
|DELETE|/1/members/[idMember or username]/boardStars/[idBoardStar]|![notstarted]|
|DELETE|/1/members/[idMember or username]/customBoardBackgrounds/[idBoardBackground]|![notstarted]|
|DELETE|/1/members/[idMember or username]/customStickers/[idCustomSticker]|![notstarted]|
|DELETE|/1/members/[idMember or username]/savedSearches/[idSavedSearch]|![notstarted]|

## notification

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/notifications/[idNotification]|![notstarted]|
|GET|/1/notifications/[idNotification]/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/board|![notstarted]|
|GET|/1/notifications/[idNotification]/board/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/card|![notstarted]|
|GET|/1/notifications/[idNotification]/card/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/entities|![notstarted]|
|GET|/1/notifications/[idNotification]/list|![notstarted]|
|GET|/1/notifications/[idNotification]/list/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/member|![notstarted]|
|GET|/1/notifications/[idNotification]/member/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/memberCreator|![notstarted]|
|GET|/1/notifications/[idNotification]/memberCreator/[field]|![notstarted]|
|GET|/1/notifications/[idNotification]/organization|![notstarted]|
|GET|/1/notifications/[idNotification]/organization/[field]|![notstarted]|
|PUT|/1/notifications/[idNotification]|![notstarted]|
|PUT|/1/notifications/[idNotification]/unread|![notstarted]|
|POST|/1/notifications/all/read|![notstarted]|

## organization

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/organizations/[idOrg or name]|![notstarted]|
|GET|/1/organizations/[idOrg or name]/[field]|![notstarted]|
|GET|/1/organizations/[idOrg or name]/actions|![notstarted]|
|GET|/1/organizations/[idOrg or name]/boards|![notstarted]|
|GET|/1/organizations/[idOrg or name]/boards/[filter]|![notstarted]|
|GET|/1/organizations/[idOrg or name]/deltas|![notstarted]|
|GET|/1/organizations/[idOrg or name]/members|![notstarted]|
|GET|/1/organizations/[idOrg or name]/members/[filter]|![notstarted]|
|GET|/1/organizations/[idOrg or name]/members/[idMember]/cards|![notstarted]|
|GET|/1/organizations/[idOrg or name]/membersInvited|![notstarted]|
|GET|/1/organizations/[idOrg or name]/membersInvited/[field]|![notstarted]|
|GET|/1/organizations/[idOrg or name]/memberships|![notstarted]|
|GET|/1/organizations/[idOrg or name]/memberships/[idMembership]|![notstarted]|
|PUT|/1/organizations/[idOrg or name]|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/desc|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/displayName|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/members|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/members/[idMember]|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/members/[idMember]/deactivated|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/memberships/[idMembership]|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/name|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/associatedDomain|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/org|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/private|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/boardVisibilityRestrict/public|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/externalMembersDisabled|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/googleAppsVersion|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/orgInviteRestrict|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/prefs/permissionLevel|![notstarted]|
|PUT|/1/organizations/[idOrg or name]/website|![notstarted]|
|POST|/1/organizations|![tested]|
|POST|/1/organizations/[idOrg or name]/logo|![notstarted]|
|DELETE|/1/organizations/[idOrg or name]|![tested]|
|DELETE|/1/organizations/[idOrg or name]/logo|![notstarted]|
|DELETE|/1/organizations/[idOrg or name]/members/[idMember]|![notstarted]|
|DELETE|/1/organizations/[idOrg or name]/members/[idMember]/all|![notstarted]|
|DELETE|/1/organizations/[idOrg or name]/prefs/associatedDomain|![notstarted]|
|DELETE|/1/organizations/[idOrg or name]/prefs/orgInviteRestrict|![notstarted]|

## search

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/search|![tested]|
|GET|/1/search/members|![tested]|

## session

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/sessions/socket|![notstarted]|
|PUT|/1/sessions/[idSession]|![notstarted]|
|PUT|/1/sessions/[idSession]/status|![notstarted]|
|POST|/1/sessions|![notstarted]|

## token

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/tokens/[token]|![notstarted]|
|GET|/1/tokens/[token]/[field]|![notstarted]|
|GET|/1/tokens/[token]/member|![notstarted]|
|GET|/1/tokens/[token]/member/[field]|![notstarted]|
|GET|/1/tokens/[token]/webhooks|![notstarted]|
|GET|/1/tokens/[token]/webhooks/[idWebhook]|![notstarted]|
|PUT|/1/tokens/[token]/webhooks|![notstarted]|
|POST|/1/tokens/[token]/webhooks|![notstarted]|
|DELETE|/1/tokens/[token]|![notstarted]|
|DELETE|/1/tokens/[token]/webhooks/[idWebhook]|![notstarted]|

## type

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/types/[id]|![notstarted]|

## webhook

|Method|Endpoint|Status|
|------|--------|------|
|GET|/1/webhooks/[idWebhook]|![notstarted]|
|GET|/1/webhooks/[idWebhook]/[field]|![notstarted]|
|PUT|/1/webhooks/[idWebhook]|![notstarted]|
|PUT|/1/webhooks/|![notstarted]|
|PUT|/1/webhooks/[idWebhook]/active|![notstarted]|
|PUT|/1/webhooks/[idWebhook]/callbackURL|![notstarted]|
|PUT|/1/webhooks/[idWebhook]/description|![notstarted]|
|PUT|/1/webhooks/[idWebhook]/idModel|![notstarted]|
|POST|/1/webhooks|![notstarted]|
|DELETE|/1/webhooks/[idWebhook]|![notstarted]|
