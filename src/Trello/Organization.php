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
     * create a new organization
     *
     * @param  array $attributes Organization attributes to set
     *
     * @return Organization  Newly minted trello organization
     * @throws Exception_ValidationsFailed
     */
    public static function create($attributes = [])
    {
        $defaults = ['displayName' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['displayName'])) {
            throw new \Trello\Exception\ValidationsFailed(
                'attempted to create organization without display name; it\'s gotta have a display name'
            );
        }
        return static::doCreate(static::getBasePath(), $attributes);
    }

    /**
     * fetch an organization
     *
     * @param  string|array $organization_id Organization id(s) to fetch
     *
     * @return Collection|Organization  Trello board matching id
     * @throws Exception\ValidationsFailed
     */
    public static function fetch($organization_id = null)
    {
        if (empty($organization_id)) {
            throw new \Trello\Exception\ValidationsFailed(
                'attempted to fetch organization without id; it\'s gotta have an id'
            );
        }

        return static::doFetch($organization_id);
    }

    /**
     * Search for organizations by keyword and filters
     *
     * @param  string $keyword Keyword to search
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of organizations with name, id, organization
     * @throws Exception_DownForMaintenance If search request breaks!
     */
    public static function search($keyword = null, $filters = [])
    {
        $filters['modelTypes'] = 'organizations';
        $results = static::doSearch($keyword, $filters);
        return new Collection($results->organizations);
    }

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
     * Get organization boards
     *
     * @param  string $organization_id
     * @param  array  $filters Optional filters
     *
     * @return Collection          Collection of boards in organization
     * @throws Exception_DownForMaintenance If search request breaks!
     */
    public static function boards($organization_id = null, $options = [])
    {
        if ($organization_id) {
            $results = static::get(static::getBasePath($organization_id).'/boards', $options);
            $ids = [];
            foreach ($results as $result) {
                if (property_exists($result, 'id')) {
                    $ids[] = $result->id;
                }
            }
            $boards = Board::fetch($ids);
            if (!is_array($boards)) {
                $boards = [$boards];
            }
            return new Collection($boards);
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
     * @throws Exception_DownForMaintenance If search request breaks!
     */
    public static function members($organization_id = null, $options = [])
    {
        if ($organization_id) {
            $results = static::get(static::getBasePath($organization_id).'/members');
            $ids = [];
            foreach ($results as $result) {
                if (property_exists($result, 'id')) {
                    $ids[] = $result->id;
                }
            }
            $members = Member::fetch($ids);
            if (!is_array($members)) {
                $members = [$members];
            }
            return new Collection($members);
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
