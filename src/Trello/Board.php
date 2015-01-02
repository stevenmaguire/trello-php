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
     * create a new board
     *
     * @param  array $attribs Board attributes to set
     *
     * @return Trello_Board  Newly minted trello board
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function create($name = null, $attribs = [])
    {
        if (empty($name) && !isset($attribs['name'])) {
            throw new Trello_Exception_ValidationsFailed(
                'attempted to create board without name; it\'s gotta have a name'
            );
        }
        if (!empty($name)) {
            $attribs['name'] = $name;
        }
        return self::_doCreate('/boards', $attribs);
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
     * @param  string $board_id Board id to close
     *
     * @return Trello_Board  Trello board matching id
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function fetch($board_id = null)
    {
        if ($board_id) {
            return self::_doFetch('/boards/'.$board_id);
        }
        throw new Trello_Exception_ValidationsFailed(
            'attempted to fetch board without id; it\'s gotta have an id'
        );
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
        $result = Trello_Http::put('/boards/'.$board_id.'/closed', ['value' => true]);
        return $result->closed;
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
            $result = Trello_Http::post('/boards/'.$this->id.'/checklists', ['name' => $name]);
            return Trello_Checklist::factory($result);
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
            $result = Trello_Http::post('/boards/'.$this->id.'/lists', ['name' => $name]);
            return Trello_List::factory($result);
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
            return Trello_Http::post('/boards/'.$this->id.'/powerUps', ['value' => $powerup]);
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
     * @return stdClass|null List of existing powerups
     * @throws Trello_Exception_ValidationsFailed
     */
    public function removePowerUp($powerup = null)
    {
        if ($powerup && preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return Trello_Http::delete('/boards/'.$this->id.'/powerUps/'.$powerup);
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
     * @return stdClass|null List of existing powerups
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
     * @return stdClass|null List of existing powerups
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
     * @return stdClass|null List of existing powerups
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
     * @return stdClass|null List of existing powerups
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
        return Trello_Http::post('/boards/'.$this->id.'/calendarKey/generate');
    }

    /**
     * generate email key for current board
     *
     * @return stdClass|null Email key object
     */
    public function generateEmailKey()
    {
        return Trello_Http::post('/boards/'.$this->id.'/emailKey/generate');
    }

    /**
     * generate email key for current board
     *
     * @return mixed Email key object
     */
    public function markAsViewed()
    {
        return Trello_Http::post('/boards/'.$this->id.'/markAsViewed');
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
        return self::_doStore('/boards/'.$this->id.'/desc', ['value' => $description]);
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
        return self::_doStore('/boards/'.$this->id.'/name', ['value' => $name]);
    }
}
