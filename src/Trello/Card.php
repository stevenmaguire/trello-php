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
     * Get model base url
     *
     * @return string Base url
     */
    protected static function baseUrl($card_id = null)
    {
        return '/cards'.($card_id ? '/'.$card_id : '');
    }

    /**
     * fetch a card
     *
     * @param  string|array $card_id Card id to fetch
     *
     * @return Trello_List|Trello_Collection  Trello card matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($card_id = null)
    {
        if ($card_id) {
            if (is_array($card_id)) {
                $urls = [];
                foreach ($card_id as $id) {
                    $urls[] = self::baseUrl($id);
                }
                return self::_doBatch($urls);
            }
            return self::_doFetch(self::baseUrl($card_id));
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to fetch list without id; it\'s gotta have an id'
        );
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

        return self::_doCreate(self::baseUrl(), $attributes);
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
        return self::_doStore(self::baseUrl($this->id).'/idList', ['value' => $list->id]);
    }

    /**
     * Get parent board
     *
     * @return Trello_Board Located board
     * @throws Trello_Exception
     */
    public function getBoard()
    {
        return Trello_Board::fetch($this->idBoard);
    }
}

