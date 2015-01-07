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
     * create a new card
     *
     * @param  array $attributes Card attributes to set
     *
     * @return Trello_Card  Newly minted trello card?
     */
    public static function create($attributes = [])
    {
        if (!isset($attributes['due'])) {
            $attributes['due'] = null;
        }

        if (!isset($attributes['urlSource'])) {
            $attributes['urlSource'] = null;
        }

        return self::_doCreate('/cards', $attributes);
    }

    /**
     * Update parent list
     *
     * @param  Trello_List $list Parent list
     *
     * @return Trello_Card  Newly minted trello card?
     */
    public static function updateList(Trello_List $list)
    {
        return Trello_Http::put('/cards/'.$this->id.'/idList', ['value' => $list->id]);
    }
}

