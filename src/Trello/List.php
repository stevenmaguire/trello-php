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
     * Lists base path
     *
     * @var string
     */
    protected static $base_path = 'lists';

    /**
     * fetch a list
     *
     * @param  string|array $list_id List id to fetch
     *
     * @return List|Collection  List model(s)
     * @throws Exception_ValidationsFailed
     */
    public static function fetch($list_id = null)
    {
        if (empty($list_id)) {
            throw new Exception_ValidationsFailed(
                'attempted to fetch list without id; it\'s gotta have an id'
            );
        }

        return static::doFetch($list_id);
    }

    /**
     * create a new list
     *
     * @param  array $attributes Board attributes to set
     *
     * @return Board  Newly minted trello board
     * @throws Exception_ValidationsFailed
     */
    public static function create($attributes = [])
    {
        self::parseAttributes($attributes);
        return static::doCreate(static::getBasePath(), $attributes);
    }

    /**
     * Parse attributes
     *
     * @param  array $attributes
     */
    public static function parseAttributes(&$attributes)
    {
        $defaults = ['name' => null, 'idBoard' => null];
        $attributes = array_merge($defaults, $attributes);

        self::parseName($attributes);
        self::parseBoardId($attributes);
        self::parsePosition($attributes);
    }

    /**
     * Parse attributes for name
     *
     * @param  array $attributes
     */
    private static function parseName(&$attributes)
    {
        if (empty($attributes['name'])) {
            throw new Exception_ValidationsFailed(
                'attempted to add list to board without list name; it\'s gotta have a name'
            );
        }
    }

    /**
     * Parse attributes for board id
     *
     * @param  array $attributes
     */
    private static function parseBoardId(&$attributes)
    {
        if (empty($attributes['idBoard'])) {
            throw new Exception_ValidationsFailed(
                'attempted to create list without board; it\'s gotta have a board'
            );
        }
    }

    /**
     * Parse attributes for position
     *
     * @param  array $attributes
     */
    private static function parsePosition(&$attributes)
    {
        if (isset($attributes['position'])) {
            $positions = ['top','bottom','\d{'.strlen($attributes['position']).'}'];

            $is_match = Util::matches(
                $positions,
                strtolower($attributes['position'])
            );
            if (!$is_match) {
                unset($attributes['position']);
            }
        }
    }

    /**
     * Get list ids from list of lists
     *
     * @param  stdClass|null $lists List of lists
     *
     * @return array List of list ids
     */
    public static function getListIds($lists = [])
    {
        return Util::getItemProperties($lists, 'id');
    }

    /**
     * Get card models for list
     *
     * @return Collection|Card Card model(s)
     */
    public function getCards()
    {
        $ids = [];
        $cards = static::get('/list/'.$this->id.'/cards');
        if (is_array($cards)) {
            foreach ($cards as $card) {
                $ids[] = $card->id;
            }
        }
        return Card::fetch($ids);
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
