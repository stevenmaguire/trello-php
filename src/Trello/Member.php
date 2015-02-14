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
    use Relationships\Actions;

    /**
     * Id
     *
     * @var string $id
     */
    protected $id;

    /**
     * Avatar hash
     *
     * @var string $avatarHash
     */
    protected $avatarHash;

    /**
     * Bio
     *
     * @var string $bio
     */
    protected $bio;

    /**
     * Bio data
     *
     * @var string $bioData
     */
    protected $bioData;

    /**
     * Is confirmed
     *
     * @var boolean $confirmed
     */
    protected $confirmed;

    /**
     * Full name
     *
     * @var string $fullName
     */
    protected $fullName;

    /**
     * Admins for premium organizations
     *
     * @var array $idPremOrgsAdmin
     */
    protected $idPremOrgsAdmin;

    /**
     * Initials
     *
     * @var string $initials
     */
    protected $initials;

    /**
     * Member type
     *
     * @var string $memberType
     */
    protected $memberType;

    /**
     * Products
     *
     * @var array $products
     */
    protected $products;

    /**
     * Connectivity status
     *
     * @var string $status
     */
    protected $status;

    /**
     * User url
     *
     * @var string $url
     */
    protected $url;

    /**
     * Username
     *
     * @var string $username
     */
    protected $username;

    /**
     * Avatar source
     *
     * @var string $avatarSource
     */
    protected $avatarSource;

    /**
     * Gravatar hash
     *
     * @var string $gravatarHash
     */
    protected $gravatarHash;

    /**
     * Board ids
     *
     * @var array $idBoards
     */
    protected $idBoards;

    /**
     * Organization ids
     *
     * @var array $idOrganizations
     */
    protected $idOrganizations;

    /**
     * Login types
     *
     * @var string $loginTypes
     */
    protected $loginTypes;

    /**
     * One time messages dismissed
     *
     * @var array $oneTimeMessagesDismissed
     */
    protected $oneTimeMessagesDismissed;

    /**
     * Preferences
     *
     * @var stdClass $prefs
     */
    protected $prefs;

    /**
     * Trophies
     *
     * @var array $trophies
     */
    protected $trophies;

    /**
     * Uploaded avatar hash
     *
     * @var string $uploadedAvatarHash
     */
    protected $uploadedAvatarHash;

    /**
     * Premium features
     *
     * @var array $premiumFeatures
     */
    protected $premiumFeatures;

    /**
     * Pinned board ids
     *
     * @var string $idBoardsPinned
     */
    protected $idBoardsPinned;


    /**
     * Members base path
     *
     * @var string
     */
    protected static $base_path = 'members';

    /**
     * Gets current user data
     *
     * @return Model
     */
    public static function currentUser()
    {
        $response = Http::get(static::getBasePath().'/me');

        return static::factory($response);
    }

    /**
     * Gets current user organizations
     *
     * @return Collection
     */
    public static function currentUserOrganizations()
    {
        $organizations = Http::get(static::getBasePath().'/my/organizations');
        $ids = Organization::getIds($organizations);

        try {
            return Organization::fetchMany($ids);
        } catch (Exception $e) {
            if (is_array($organizations)) {
                return new Collection($organizations);
            }

            return new Collection;
        }
    }
}
