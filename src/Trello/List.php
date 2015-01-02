<?php
/**
 * Trello list
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 * @property-read string $id
 * @property-read string $name
 * @property-read array $cards
 * @property-read array $card_fields
 * @property-read array $fields
 */
class Trello_List extends Trello_Model
{
    /**
     * List id
     *
     * @property string $id
     */
    protected $id;

    /**
     * List name
     *
     * @property string $name
     */
    protected $name;

    /**
     * List cards
     *
     * @property array $cards
     */
    protected $cards;

    /**
     * List card fields
     *
     * @property array $card_fields
     */
    protected $card_fields;

    /**
     * List fields
     *
     * @property array $fields
     */
    protected $fields;
}
