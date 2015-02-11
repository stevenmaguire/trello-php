<?php namespace Trello;

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
class Checklist extends Model
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
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['name' => null, 'idBoard' => null, 'idCard' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['name'];
}
