<?php
/**
 * Trello organization
 * Reads and manages organizations
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 */
class Trello_Organization extends Trello_Model
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
     * @return Trello_Organization  Newly minted trello organization
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function create($attributes = [])
    {
        $defaults = ['displayName' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['displayName'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create organization without display name; it\'s gotta have a display name'
            );
        }
        return self::_doCreate(static::getBasePath(), $attributes);
    }

    /**
     * Search for organizations by keyword and filters
     *
     * @param  string $keyword Keyword to search
     * @param  array  $filters Optional filters
     *
     * @return Trello_Collection          Collection of organizations with name, id, organization
     * @throws Trello_Exception_DownForMaintenance If search request breaks!
     */
    public static function search($keyword = null, $filters = [])
    {
        $filters['modelTypes'] = 'organizations';
        $results = self::_doSearch($keyword, $filters);
        return new Trello_Collection($results->organizations);
    }

    public static function deleteOrganization($organization_id = null)
    {
        if ($organization_id) {
            return self::_delete(static::getBasePath($organization_id));
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to delete organization without id; it\'s gotta have an id'
        );
    }

    /**
     * Delete organization
     *
     * @return boolean
     */
    public function delete()
    {
        return self::deleteOrganization($this->id);
    }
}
