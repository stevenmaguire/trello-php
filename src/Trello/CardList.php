<?php namespace Trello;

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
class CardList extends Model
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
     * List parent board
     *
     * @property string $idBoard
     */
    protected $idBoard;

    /**
     * List is closed
     *
     * @property string $closed
     */
    protected $closed;

    /**
     * List position
     *
     * @property integer $pos
     */
    protected $pos;

    /**
     * Lists base path
     *
     * @var string
     */
    protected static $base_path = 'list';

    /**
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['name' => null, 'idBoard' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['name', 'idBoard'];

    /**
     * Get card models for list
     *
     * @return Collection|Card Card model(s)
     */
    public function getCards()
    {
        $cards = static::get(static::getBasePath($this->id).'/cards');
        $ids = Card::getIds($cards);

        return Card::fetchMany($ids);
    }

    /**
     * create a new card
     *
     * @param  array $attributes Card attributes to set
     *
     * @return Card  Newly minted trello card
     */
    public function createCard($attributes = [])
    {
        $attributes['idList'] = $this->id;

        return Card::create($attributes);
    }

    /**
     * add a card to the list
     *
     * @param  Card $card Card to add
     *
     * @return Card Updated card
     */
    public function addCard(Card $card)
    {
        return $card->updateList($this);
    }
}
