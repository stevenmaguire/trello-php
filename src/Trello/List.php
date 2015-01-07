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

    /**
     * create a new card
     *
     * @param  array $attributes Card attributes to set
     *
     * @return Trello_Card  Newly minted trello card
     */
    public function createCard($attributes = [])
    {
        $attributes['idList'] = $this->id;
        return Trello_Card::create($attributes);
    }

    /**
     * add a card to the list
     *
     * @param  Trello_Card $card Card to add
     *
     * @return Trello_Card Updated card
     */
    public function addCard(Trello_Card $card)
    {
        return Trello_Card::updateList($this);
    }
}
