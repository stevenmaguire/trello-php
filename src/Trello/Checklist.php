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
     * Get model base url
     *
     * @return string Base url
     */
    protected static function baseUrl($checklist_id = null)
    {
        return '/checklists'.($checklist_id ? '/'.$checklist_id : '');
    }

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

        return self::_doCreate(self::baseUrl(), $attributes);
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
        if ($checklist_id) {
            if (is_array($checklist_id)) {
                $urls = [];
                foreach ($checklist_id as $id) {
                    $urls[] = '/checklists/'.$id;
                }
                return self::_doBatch($urls);
            }
            return self::_doFetch('/checklists/'.$checklist_id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to fetch checklist without id; it\'s gotta have an id'
        );
    }
}
