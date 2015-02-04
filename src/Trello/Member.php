<?php namespace Trello;

/**
 * Trello member
 * Reads and manages members
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 */
class Member extends Model
{
    /*
    [id] => 545df696e29c0dddaed31967
    [avatarHash] =>
    [bio] =>
    [bioData] =>
    [confirmed] => 1
    [fullName] => Matilda Wormwood
    [idPremOrgsAdmin] => Array
    [initials] => MW
    [memberType] => normal
    [products] => Array
    [status] => disconnected
    [url] => https://trello.com/matildawormwood12
    [username] => matildawormwood12
    [avatarSource] => none
    [email] =>
    [gravatarHash] => 39aaaada0224f26f0bb8f1965326dcb7
    [idBoards] => Array
    [idOrganizations] => Array
    [loginTypes] =>
    [oneTimeMessagesDismissed] => Array
    [prefs] => stdClass Object
        (
            [colorBlind] =>
            [minutesBeforeDeadlineToNotify] => 1440
            [minutesBetweenSummaries] => 1
            [sendSummaries] => 1
        )
    [trophies] => Array
    [uploadedAvatarHash] =>
    [premiumFeatures] => Array
    [idBoardsPinned] =>
    */
    /**
     * Members base path
     *
     * @var string
     */
    protected static $base_path = 'members';

    /**
     * Gets current user
     *
     * @return Card  Newly minted trello card?
     */
    public static function currentUser()
    {
        return static::get(static::getBasePath().'/me');
    }
}
