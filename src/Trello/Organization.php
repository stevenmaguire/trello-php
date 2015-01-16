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
            throw new Exception_ValidationsFailed(
                'attempted to create organization without display name; it\'s gotta have a display name'
            );
        }
        return static::doCreate(static::getBasePath(), $attributes);
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

    public static function deleteOrganization($organization_id = null)
    {
        if ($organization_id) {
            return static::delete(static::getBasePath($organization_id));
        }
        throw new Exception_ValidationsFailed(
            'attempted to delete organization without id; it\'s gotta have an id'
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
