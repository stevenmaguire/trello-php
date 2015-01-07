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
     * fetch a list
     *
     * @param  string $list_id List id to fetch
     *
     * @return Trello_List  Trello list matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($list_id = null)
    {
        if ($list_id) {
            if (is_array($list_id)) {
                $urls = [];
                foreach ($list_id as $id) {
                    $urls[] = '/list/'.$id;
                }
                return self::_doBatch($urls);
            }
            return self::_doFetch('/list/'.$list_id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to fetch list without id; it\'s gotta have an id'
        );
    }

    /**
     * Get card models for list
     *
     * @return Trello_Collection Collection of card models
     */
    public function getCards()
    {
        $ids = [];
        if (is_array($this->cards)) {
            foreach ($this->cards as $card_id) {
                $ids[] = $card_id;
            }
        } else {
            $cards = Trello_Http::get('/list/'.$this->id.'/cards');
            $ids = [];
            foreach ($cards as $card) {
                $ids[] = $card->id;
            }
        }
        //return Trello_Card::fetch($ids);
    }

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
