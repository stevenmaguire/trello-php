<?php namespace Trello;

/**
 * Trello card
 * Reads and manages cards
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 */
class Card extends Model
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
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['name' => null, 'idList' => null, 'due' => null, 'urlSource' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['name', 'idList'];

    /**
     * Get parent board
     *
     * @return Board|Collection Located board(s)
     * @throws Exception
     */
    public function getBoard()
    {
        return Board::fetch($this->idBoard);
    }

    /**
     * Get parent list
     *
     * @return List|Collection Located list(s)
     * @throws Exception
     */
    public function getList()
    {
        return CardList::fetch($this->idList);
    }

    /**
     * Update parent list
     *
     * @param  List $list Parent list
     *
     * @return Card  Newly minted trello card?
     */
    public function updateList(CardList $list)
    {
        return static::doStore(static::getBasePath($this->id).'/idList', ['value' => $list->id]);
    }
}
