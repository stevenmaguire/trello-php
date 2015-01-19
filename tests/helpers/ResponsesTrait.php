<?php namespace Trello\Tests\Helpers;

trait ResponsesTrait
{
    public function getBoardResponse()
    {
        return '{
            "id": "54adfc38f03da056c186909a",
            "name": "Hank Hill",
            "desc": "",
            "descData": null,
            "closed": false,
            "idOrganization": "54adfc3807ce928cb64b661f",
            "pinned": false,
            "url": "https://trello.com/b/yloeyMJN/test",
            "shortUrl": "https://trello.com/b/yloeyMJN",
            "prefs": {
                "permissionLevel": "private",
                "voting": "disabled",
                "comments": "members",
                "invitations": "members",
                "selfJoin": true,
                "cardCovers": true,
                "cardAging": "regular",
                "calendarFeedEnabled": false,
                "background": "blue",
                "backgroundColor": "#0079BF",
                "backgroundImage": null,
                "backgroundImageScaled": null,
                "backgroundTile": false,
                "backgroundBrightness": "unknown",
                "canBePublic": true,
                "canBeOrg": true,
                "canBePrivate": true,
                "canInvite": true
            },
            "labelNames": {
                "green": "",
                "yellow": "",
                "orange": "",
                "red": "",
                "purple": "",
                "blue": "",
                "sky": "",
                "lime": "",
                "pink": "",
                "black": ""
            }
        }';
    }
}
