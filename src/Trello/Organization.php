<?php namespace Trello;

/**
 * Trello organization
 * Reads and manages organizations
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 */
class Organization extends Model
{
    /**
     * Organization id
     * @property string $id
     */
    protected $id;

    /**
     * Organization name
     * @property string $name
     */
    protected $name;

    /**
     * Organization display name
     * @property string $displayName
     */
    protected $displayName;

    /**
     * Organization description
     * @property string $desc
     */
    protected $desc;

    /**
     * Organization description data
     * @property stdClass $descData
     */
    protected $descData;

    /**
     * Organization url
     * @property string $url
     */
    protected $url;

    /**
     * Organization website address
     * @property string $website
     */
    protected $website;

    /**
     * Organization logo hash
     * @property string $logoHash
     */
    protected $logoHash;

    /**
     * Organization products
     * @property array $products
     */
    protected $products;

    /**
     * Organization power ups
     * @property array $powerUps
     */
    protected $powerUps;

    /**
     * Organizations base path
     *
     * @var string
     */
    protected static $base_path = 'organizations';

    /**
     * Search model
     *
     * @var string
     */
    protected static $search_model = 'organizations';

    /**
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['displayName' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['displayName'];

    /**
     * [deleteOrganization description]
     *
     * @param  [type]  [description]
     *
     * @return [type]  [description]
     */
    public static function deleteOrganization($organization_id = null)
    {
        if ($organization_id) {
            return static::delete(static::getBasePath($organization_id));
        }
        throw new \Trello\Exception\ValidationsFailed(
            'attempted to delete organization without id; it\'s gotta have an id'
        );
    }

    /**
     * Get organization actions
     *
     * @param  string $organization_id
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of actions in organization
     * @throws Trello\Exception\ValidationsFailed
     */
    public static function actions($organization_id = null, $options = [])
    {
        if ($organization_id) {
            $actions = static::get(static::getBasePath($organization_id).'/actions', $options);
            $ids = Action::getIds($actions);

            return Action::fetchMany($ids);
        }
        throw new \Trello\Exception\ValidationsFailed(
            'attempted to get organization actions without id; it\'s gotta have an id'
        );
    }

    /**
     * Get organization boards
     *
     * @param  string $organization_id
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of boards in organization
     * @throws Trello\Exception\ValidationsFailed
     */
    public static function boards($organization_id = null, $options = [])
    {
        if ($organization_id) {
            $boards = static::get(static::getBasePath($organization_id).'/boards', $options);
            $ids = Board::getIds($boards);

            return Board::fetchMany($ids);
        }
        throw new \Trello\Exception\ValidationsFailed(
            'attempted to get organization members without id; it\'s gotta have an id'
        );
    }

    /**
     * Get organization members
     *
     * @param  string $organization_id
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of members in organization
     * @throws Trello\Exception\ValidationsFailed
     */
    public static function members($organization_id = null, $options = [])
    {
        if ($organization_id) {
            $members = static::get(static::getBasePath($organization_id).'/members', $options);
            $ids = Member::getIds($members);

            return Member::fetchMany($ids);
        }
        throw new \Trello\Exception\ValidationsFailed(
            'attempted to get organization members without id; it\'s gotta have an id'
        );
    }

    /**
     * Remove organization
     *
     * @return boolean
     */
    public function remove()
    {
        return self::deleteOrganization($this->id);
    }
}
