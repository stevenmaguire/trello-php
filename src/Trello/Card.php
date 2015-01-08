<?php
/**
 * Trello card
 * Reads and manages cards
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 */
class Trello_Card extends Trello_Model
{
    /**
     * Card id
     *
     * @property string $id
     */
    protected $id;

    /**
     * Card badges
     *
     * @property stdClass $badges
     */
    protected $badges;

    /**
     * Card check item states
     *
     * @property array $checkItemStates
     */
    protected $checkItemStates;

    /**
     * Card is closed
     *
     * @property bool $closed
     */
    protected $closed;

    /**
     * Card last activity date
     *
     * @property DateTime $dateLastActivity
     */
    protected $dateLastActivity;

    /**
     * Card description
     * @property string $desc
     */
    protected $desc;

    /**
     * Card description data
     * @property string $descData
     */
    protected $descData;

    /**
     * Card due date
     * @property DateTime|null $due
     */
    protected $due;

    /**
     * Card email address
     * @property string $email
     */
    protected $email;

    /**
     * Card board id
     * @property string $idBoard
     */
    protected $idBoard;

    /**
     * Card checklist ids
     * @property array $idChecklists
     */
    protected $idChecklists;

    /**
     * Card label ids
     * @property array $idLabels
     */
    protected $idLabels;

    /**
     * Card list id
     * @property string $idList
     */
    protected $idList;

    /**
     * Card member ids
     * @property array $idMembers
     */
    protected $idMembers;

    /**
     * Card short id
     * @property string $idShort
     */
    protected $idShort;

    /**
     * Card cover art id
     * @property string $idAttachmentCover
     */
    protected $idAttachmentCover;

    /**
     * Card is manual cover attachment
     * @property bool $manualCoverAttachment
     */
    protected $manualCoverAttachment;

    /**
     * Card labels
     * @property array $labels
     */
    protected $labels;

    /**
     * Card name
     * @property string $name
     */
    protected $name;

    /**
     * Card position
     * @property integer $pos
     */
    protected $pos;

    /**
     * Card url
     * @property string $url
     */
    protected $url;

    /**
     * Card short url
     * @property string $shortUrl
     */
    protected $shortUrl;

    /**
     * Card stickers
     * @property array $stickers
     */
    protected $stickers;

    /**
     * Cards base path
     *
     * @var string
     */
    protected static $base_path = 'card';

    /**
     * fetch a card
     *
     * @param  string|array $card_id Card id to fetch
     *
     * @return Trello_Card|Trello_Collection  Card model(s)
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($card_id = null)
    {
        if (empty($card_id)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to fetch card without id; it\'s gotta have an id'
            );
        }

        return self::_doFetch($card_id);
    }

    /**
     * create a new card
     *
     * @param  array $attributes Card attributes to set
     *
     * @return Trello_Card  Newly minted trello card?
     */
    public static function create($attributes = [])
    {
        $defaults = ['name' => null, 'idList' => null, 'due' => null, 'urlSource' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['name'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create card without name; it\'s gotta have a name'
            );
        }

        if (empty($attributes['idList'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create card without list; it\'s gotta have a list'
            );
        }

        return self::_doCreate(static::getBasePath(), $attributes);
    }

    /**
     * Get card ids from list of cards
     *
     * @param  array $cards List of cards
     *
     * @return array List of card ids
     */
    public static function getCardIds($cards = [])
    {
        return Trello_Util::getItemProperties($cards, 'id');
    }

    /**
     * Update parent list
     *
     * @param  Trello_List $list Parent list
     *
     * @return Trello_Card  Newly minted trello card?
     */
    public function updateList(Trello_List $list)
    {
        return self::_doStore(static::getBasePath($this->id).'/idList', ['value' => $list->id]);
    }

    /**
     * Get parent board
     *
     * @return Trello_Board|Trello_Collection Located board(s)
     * @throws Trello_Exception
     */
    public function getBoard()
    {
        return Trello_Board::fetch($this->idBoard);
    }

    /**
     * Get parent list
     *
     * @return Trello_List|Trello_Collection Located list(s)
     * @throws Trello_Exception
     */
    public function getList()
    {
        return Trello_List::fetch($this->idList);
    }
}
