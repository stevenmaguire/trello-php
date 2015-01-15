<?php
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
class Trello_Board extends Trello_Model
{
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
     * add checklist to current board
     *
     * @param  string $name Name of checklist
     *
     * @return Trello_Checklist|Trello_Collection Newly minted checklist
     * @throws Trello_Exception_ValidationsFailed
     * @throws Trello_Exception_NotFound
     */
    public function addChecklist($name = null)
    {
        if ($name) {
            $result = static::post(static::getBasePath($this->id).'/checklists', ['name' => $name]);
            return Trello_Checklist::fetch($result->id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to add checklist to board without checklist name; it\'s gotta have a name'
        );
    }

    /**
     * add list to current board
     *
     * @param  array $attributes List attributes
     *
     * @return Trello_List|Trello_Collection Newly minted List object
     * @throws Trello_Exception_ValidationsFailed
     * @throws Trello_Exception_NotFound
     */
    public function addList($attributes = [])
    {
        $attributes['idBoard'] = $this->id;
        Trello_List::parseAttributes($attributes);
        $result = static::post(static::getBasePath($this->id).'/lists', $attributes);
        return Trello_List::fetch($result->id);
    }

    /**
     * add specific powerup to current board
     *
     * @param string $powerup Powerup name
     *
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addPowerUp($powerup = null)
    {
        if (preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return static::post(static::getBasePath($this->id).'/powerUps', ['value' => $powerup]);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to add invalid powerup to board; it\'s gotta be a valid powerup'
        );
    }

    /**
     * add card aging powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addPowerUpCardAging()
    {
        return $this->addPowerUp('cardAging');
    }

    /**
     * add calendar powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addPowerUpCalendar()
    {
        return $this->addPowerUp('calendar');
    }

    /**
     * add recap powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addPowerUpRecap()
    {
        return $this->addPowerUp('recap');
    }

    /**
     * add voting powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addPowerUpVoting()
    {
        return $this->addPowerUp('voting');
    }

    /**
     * close current board
     *
     * @return bool  Did the board close?
     * @throws Trello_Exception_ValidationsFailed
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
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function closeBoard($board_id = null)
    {
        if ($board_id) {
            $result = static::put(static::getBasePath($board_id).'/closed', ['value' => true]);
            return $result->closed;
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to close board without id; it\'s gotta have an id'
        );
    }

    /**
     * create a new board
     *
     * @param  array $attributes Board attributes to set
     *
     * @return Trello_Board  Newly minted trello board
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function create($attributes = [])
    {
        $defaults = ['name' => null];
        $attributes = array_merge($defaults, $attributes);

        if (empty($attributes['name'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create board without name; it\'s gotta have a name'
            );
        }
        return static::doCreate(static::getBasePath(), $attributes);
    }

    /**
     * fetch a board
     *
     * @param  string|array $board_id Board id(s) to fetch
     *
     * @return Trello_Collection|Trello_Board  Trello board matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($board_id = null)
    {
        if (empty($board_id)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to fetch board without id; it\'s gotta have an id'
            );
        }

        return static::doFetch($board_id);
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
     * @return Trello_Card|Trello_Collection Card(s)
     */
    public function getCards()
    {
        $cards = static::get(static::getBasePath($this->id).'/cards');
        $ids = Trello_Card::getCardIds($cards);
        return Trello_Card::fetch($ids);
    }

    /**
     * Get lists attached to board
     *
     * @return Trello_List|Trello_Collection Collection of list(s)
     */
    public function getLists()
    {
        $lists = static::get(static::getBasePath($this->id).'/lists');
        $ids = Trello_List::getListIds($lists);
        return Trello_List::fetch($ids);
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
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUp($powerup = null)
    {
        if (!self::isValidPowerUp($powerup)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to remove invalid powerup from board; it\'s gotta be a valid powerup'
            );
        }
        return static::delete(static::getBasePath($this->id).'/powerUps/'.$powerup);
    }

    /**
     * remove card aging powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUpCardAging()
    {
        return $this->removePowerUp('cardAging');
    }

    /**
     * remove calendar powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUpCalendar()
    {
        return $this->removePowerUp('calendar');
    }

    /**
     * remove recap powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUpRecap()
    {
        return $this->removePowerUp('recap');
    }

    /**
     * remove voting powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUpVoting()
    {
        return $this->removePowerUp('voting');
    }

    /**
     * Search for boards by keyword and filters
     *
     * @param  string $keyword Keyword to search
     * @param  array  $filters Optional filters
     *
     * @return Trello_Collection          Collection of boards with name, id, organization
     * @throws Trello_Exception_DownForMaintenance If search request breaks!
     */
    public static function search($keyword = null, $filters = [])
    {
        $filters['modelTypes'] = 'boards';
        $results = static::doSearch($keyword, $filters);
        return new Trello_Collection($results->boards);
    }

    /**
     * Update board description
     *
     * @param  string  $description
     *
     * @return Trello_Board Updated board object
     */
    public function updateDescription($description = null)
    {
        return static::doStore(static::getBasePath($this->id).'/desc', ['value' => $description]);
    }

    /**
     * Update board name
     *
     * @param  string  $name
     *
     * @return Trello_Board Updated board object
     * @throws Trello_Exception_ValidationsFailed
     */
    public function updateName($name = null)
    {
        if (empty($name)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to update board name without new name; it\'s gotta have a name'
            );
        }
        return static::doStore(static::getBasePath($this->id).'/name', ['value' => $name]);
    }
}
