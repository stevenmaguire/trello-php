<?php
/**
 * Trello checklist
 * Reads and manages checklists
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 * @property-read string $id
 * @property-read string $idBoard
 * @property-read string $idCard
 * @property-read string $name
 * @property-read string $pos
 * @property-read array $checkItems
 */
class Trello_Checklist extends Trello_Model
{
    /**
     * Checklist id
     *
     * @property string $id
     */
    protected $id;

    /**
     * Checklist board id
     *
     * @property string $idBoard
     */
    protected $idBoard;

    /**
     * Checklist card id
     *
     * @property string $idCard
     */
    protected $idCard;

    /**
     * Checklist name
     *
     * @property string $name
     */
    protected $name;

    /**
     * Checklist position
     *
     * @property string $pos
     */
    protected $pos;

    /**
     * Checklist items
     *
     * @property array $checkItems
     */
    protected $checkItems;

    /**
     * Checklists base path
     *
     * @var string
     */
    protected static $base_path = 'checklists';

    /**
     * create a new checklist
     *
     * @param  array $attributes Checklist attributes to set
     *
     * @return Trello_Checklist  Newly minted trello checklist?
     */
    public static function create($attributes = [])
    {
        $defaults = ['idBoard' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['idBoard'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create checklist without board; it\'s gotta have a board'
            );
        }

        return self::_doCreate(static::getBasePath(), $attributes);
    }

    /**
     * fetch a checklist
     *
     * @param  string|array $checklist_id Checklist id to fetch
     *
     * @return Trello_Checklist|Trello_Collection  Trello checklist matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($checklist_id = null)
    {
        if (empty($checklist_id)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to fetch checklist without id; it\'s gotta have an id'
            );
        }

        return self::_doFetch($checklist_id);
    }
}
