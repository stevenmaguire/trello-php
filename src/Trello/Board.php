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
        return self::_doCreate(static::getBasePath(), $attributes);
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
        $results = self::_doSearch($keyword, $filters);
        return new Trello_Collection($results->boards);
    }

    /**
     * fetch a board
     *
     * @param  string|array $board_id Board id to fetch
     *
     * @return Trello_Board  Trello board matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($board_id = null)
    {
        if (empty($board_id)) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to fetch board without id; it\'s gotta have an id'
            );
        }

        return self::_doFetch($board_id);
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
            $result = self::_put(static::getBasePath($board_id).'/closed', ['value' => true]);
            return $result->closed;
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to close board without id; it\'s gotta have an id'
        );
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
     * add checklist to current board
     *
     * @param  string $name Name of checklist
     *
     * @return Trello_Checklist Newly minted checlist object
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addChecklist($name = null)
    {
        if ($name) {
            $result = self::_post(static::getBasePath($this->id).'/checklists', ['name' => $name]);
            return Trello_Checklist::fetch($result->id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to add checklist to board without checklist name; it\'s gotta have a name'
        );
    }

    /**
     * add list to current board
     *
     * @param  string $name Name of list
     * @param  mixed $position Optional position of list in board
     *
     * @return Trello_List Newly minted List object
     * @throws Trello_Exception_ValidationsFailed
     */
    public function addList($name = null, $position = null)
    {
        $config = [];
        if ($name) {
            $config['name'] = $name;
            if ($position && preg_match('/[0-9]+|top|bottom/', $position)) {
                $config['position'] = $position;
            }
            $result = self::_post(static::getBasePath($this->id).'/lists', ['name' => $name]);
            return Trello_List::fetch($result->id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to add list to board without list name; it\'s gotta have a name'
        );
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
            return self::_post(static::getBasePath($this->id).'/powerUps', ['value' => $powerup]);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to add invalid powerup to board; it\'s gotta be a valid powerup'
        );
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
        if ($powerup && preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return self::_delete(static::getBasePath($this->id).'/powerUps/'.$powerup);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to remove invalid powerup from board; it\'s gotta be a valid powerup'
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
     * generate calendar key for current board
     *
     * @return stdClass|null Calendar key object
     */
    public function generateCalendarKey()
    {
        return self::_post(static::getBasePath($this->id).'/calendarKey/generate');
    }

    /**
     * generate email key for current board
     *
     * @return stdClass|null Email key object
     */
    public function generateEmailKey()
    {
        return self::_post(static::getBasePath($this->id).'/emailKey/generate');
    }

    /**
     * Get lists attached to board
     *
     * @return Trello_Collection Collection of Trello_List
     */
    public function getLists()
    {
        $lists = self::_get(static::getBasePath($this->id).'/lists');
        $ids = [];
        if (is_array($lists)) {
            foreach ($lists as $list) {
                $ids[] = $list->id;
            }
        }
        return Trello_List::fetch($ids);
    }

    /**
     * generate email key for current board
     *
     * @return stdClass|null Marked as viewed
     */
    public function markAsViewed()
    {
        return self::_post(static::getBasePath($this->id).'/markAsViewed');
    }

    /**
     * Get cards on board
     *
     * @return Trello_Collection Cards
     */
    public function getCards()
    {
        $ids = [];
        $result = self::_get(static::getBasePath($this->id).'/cards');
        if (is_array($result)) {
            foreach ($result as $card) {
                $ids[] = $card->id;
            }
        }
        return Trello_Card::fetch($ids);
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
        return self::_doStore(static::getBasePath($this->id).'/desc', ['value' => $description]);
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
        return self::_doStore(static::getBasePath($this->id).'/name', ['value' => $name]);
    }
}
