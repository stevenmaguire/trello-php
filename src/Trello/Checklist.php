<?php
/**
 * Trello action
 * Reads and manages actions
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
}
