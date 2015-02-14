<?php namespace Trello\Tests;

use \PHPUnit_Framework_Error_Warning;
use \PHPUnit_Framework_TestCase;
use Trello\Configuration;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    protected $board_name = 'Hank Hill';
    protected $new_board_name = 'Hank Hill 2';
    protected $board_description = 'The patriarch of the Arlen, TX community.';
    protected $new_board_description = 'The patriarch of the Arlen, TX community. And master griller';
    protected $checklist_name = 'To complete';
    protected $list_name = 'To do';

    protected function boardData()
    {
        return '{
            "id": "54adfc38f03da056c186909a",
            "name": "'.$this->board_name.'",
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

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        PHPUnit_Framework_Error_Warning::$enabled = false;
        Configuration::environment(getenv('TRELLO_API_ENVIRONMENT'));
        Configuration::key(getenv('TRELLO_API_KEY'));
        Configuration::secret(getenv('TRELLO_API_SECRET'));
        Configuration::token(getenv('TRELLO_API_TOKEN'));
        Configuration::applicationName(getenv('TRELLO_API_APPNAME'));
        Configuration::oauthCallbackUrl(getenv('TRELLO_API_CALLBACK_URL'));
        Configuration::includeRawResults(true);
    }

    protected function randomNumber($max = 10)
    {
        return rand(1, $max);
    }

    protected function mockHttpClientResponse($response)
    {

    }

    protected function mockRequestMethod($client)
    {

    }

    protected function isHhvm()
    {
        try {
            $version = phpversion();
            if (stripos($version, 'hhvm') !== false) {
                return true;
            }
            if (stripos($version, 'hiphop') !== false) {
                return true;
            }
        } catch (Exception $e) {
            return true;
        }
        return false;
    }
}
