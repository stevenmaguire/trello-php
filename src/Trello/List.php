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
     * Get model base url
     *
     * @return string Base url
     */
    protected static function getBaseUrl($list_id = null)
    {
        return '/lists'.($list_id ? '/'.$list_id : '');
    }

    /**
     * fetch a list
     *
     * @param  string|array $list_id List id to fetch
     *
     * @return Trello_List|Trello_Collection  Trello list matching id
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
     * create a new list
     *
     * @param  array $attributes Board attributes to set
     *
     * @return Trello_Board  Newly minted trello board
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function create($attributes = [])
    {
        $defaults = ['name' => null, 'idBoard' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['name'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create list without name; it\'s gotta have a name'
            );
        }
        if (empty($attributes['idBoard'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create list without board; it\'s gotta have a board'
            );
        }
        return self::_doCreate(self::getBaseUrl(), $attributes);
    }

    /**
     * Get card models for list
     *
     * @return Trello_Collection Collection of card models
     */
    public function getCards()
    {
        $ids = [];
        $cards = self::_get('/list/'.$this->id.'/cards');
        if (is_array($cards)) {
            foreach ($cards as $card) {
                $ids[] = $card->id;
            }
        }
        return Trello_Card::fetch($ids);
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
        return $card->updateList($this);
    }
}
