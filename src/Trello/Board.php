<?php namespace Trello;

use Trello\Exception\ValidationsFailed;

/**
 * Trello board
 * Reads and manages boards
 *
 * @package    Trello
 * @subpackage Models
 * @copyright  2014 Steven Maguire
 *
 * @property-read string $id
 * @property-read string $name
 * @property-read string $desc
 * @property-read string $descData
 * @property-read bool $closed
 * @property-read string $idOrganization
 * @property-read bool $pinned
 * @property-read string $url
 * @property-read string $shortUrl
 * @property-read stdClass $prefs
 * @property-read stdClass $labelNames
 */
class Board extends Model
{
    use Traits\ActionTrait;

    /**
     * Board id
     * @property string $id
     */
    protected $id;

    /**
     * Board name
     * @property string $name
     */
    protected $name;

    /**
     * Board description
     * @property string $desc
     */
    protected $desc;

    /**
     * Board description data
     * @property string $descData
     */
    protected $descData;

    /**
     * Board closed
     * @property bool $closed
     */
    protected $closed;

    /**
     * Board organization id
     * @property string $idOrganization
     */
    protected $idOrganization;

    /**
     * Board is pinned
     * @property bool $pinned
     */
    protected $pinned;

    /**
     * Board url
     * @property string $url
     */
    protected $url;

    /**
     * Board short url
     * @property string $shortUrl
     */
    protected $shortUrl;

    /**
     * Board preferences
     * @property stdClass $prefs
     */
    protected $prefs;

    /**
     * Board label names
     * @property stdClass $labelNames
     */
    protected $labelNames;

    /**
     * Boards base path
     *
     * @var string
     */
    protected static $base_path = 'boards';

    /**
     * Search model
     *
     * @var string
     */
    protected static $search_model = 'boards';

    /**
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['name' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['name'];

    /**
     * add checklist to current board
     *
     * @param  array $attributes
     *
     * @return Checklist  Newly minted trello checklist
     * @throws Exception\ValidationsFailed
     */
    public function addChecklist($attributes = [])
    {
        $attributes['idBoard'] = $this->id;

        return Checklist::create($attributes);
    }

    /**
     * add list to current board
     *
     * @param  array $attributes List attributes
     *
     * @return CardList  Newly minted trello list
     * @throws Exception\ValidationsFailed
     */
    public function addList($attributes = [])
    {
        $attributes['idBoard'] = $this->id;

        return CardList::create($attributes);
    }

    /**
     * add specific powerup to current board
     *
     * @param string $powerup Powerup name
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUp($powerup = null)
    {
        if (preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return static::post(static::getBasePath($this->id).'/powerUps', ['value' => $powerup]);
        }
        throw new ValidationsFailed(
            'attempted to add invalid powerup to board; it\'s gotta be a valid powerup'
        );
    }

    /**
     * add card aging powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpCardAging()
    {
        return $this->addPowerUp('cardAging');
    }

    /**
     * add calendar powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpCalendar()
    {
        return $this->addPowerUp('calendar');
    }

    /**
     * add recap powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpRecap()
    {
        return $this->addPowerUp('recap');
    }

    /**
     * add voting powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpVoting()
    {
        return $this->addPowerUp('voting');
    }

    /**
     * close current board
     *
     * @return bool  Did the board close?
     * @throws Exception\ValidationsFailed
     */
    public function close()
    {
        return self::closeBoard($this->id);
    }

    /**
     * close a board by board id
     *
     * @param  string $board_id Board id to close
     *
     * @return bool  Did the board close?
     * @throws Exception\ValidationsFailed
     */
    public static function closeBoard($board_id = null)
    {
        if ($board_id) {
            $result = static::put(static::getBasePath($board_id).'/closed', ['value' => true]);
            return $result->closed;
        }
        throw new ValidationsFailed(
            'attempted to close board without id; it\'s gotta have an id'
        );
    }

    /**
     * generate calendar key for current board
     *
     * @return stdClass|null Calendar key object
     */
    public function generateCalendarKey()
    {
        return static::post(static::getBasePath($this->id).'/calendarKey/generate');
    }

    /**
     * generate email key for current board
     *
     * @return stdClass|null Email key object
     */
    public function generateEmailKey()
    {
        return static::post(static::getBasePath($this->id).'/emailKey/generate');
    }

    /**
     * Get cards on board
     *
     * @return Collection Card(s)
     */
    public function getCards()
    {
        $cards = static::get(static::getBasePath($this->id).'/cards');
        $ids = Card::getIds($cards);

        return Card::fetchMany($ids);
    }

    /**
     * Get lists attached to board
     *
     * @return Collection Collection of list(s)
     */
    public function getLists()
    {
        $lists = static::get(static::getBasePath($this->id).'/lists');
        $ids = CardList::getIds($lists);

        return CardList::fetchMany($ids);
    }

    /**
     * Get stars on board
     *
     * @return mixed
     */
    public function getStars()
    {
        return static::get(static::getBasePath($this->id).'/boardStars');
    }

    /**
     * Checks if value is valid powerup
     *
     * @param  string $powerup
     *
     * @return boolean
     */
    public static function isValidPowerUp($powerup = null)
    {
        $powerups = ['voting','cardAging','calendar','recap'];

        return in_array($powerup, $powerups);
    }

    /**
     * generate email key for current board
     *
     * @return stdClass|null Marked as viewed
     */
    public function markAsViewed()
    {
        return static::post(static::getBasePath($this->id).'/markAsViewed');
    }

    /**
     * remove specific powerup from current board
     *
     * @param string $powerup Powerup name
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUp($powerup = null)
    {
        if (self::isValidPowerUp($powerup)) {
            return static::delete(static::getBasePath($this->id).'/powerUps/'.$powerup);
        }
        throw new ValidationsFailed(
            'attempted to remove invalid powerup from board; it\'s gotta be a valid powerup'
        );
    }

    /**
     * remove card aging powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpCardAging()
    {
        return $this->removePowerUp('cardAging');
    }

    /**
     * remove calendar powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpCalendar()
    {
        return $this->removePowerUp('calendar');
    }

    /**
     * remove recap powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpRecap()
    {
        return $this->removePowerUp('recap');
    }

    /**
     * remove voting powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpVoting()
    {
        return $this->removePowerUp('voting');
    }
}
