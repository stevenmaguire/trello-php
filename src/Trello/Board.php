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
    use Relationships\Actions,
        Relationships\Cards,
        Relationships\Checklists,
        Relationships\Lists,
        Relationships\Powerups;

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
     * Close board
     *
     * @return boolean
     * @throws Exception\ValidationsFailed
     */
    public function close()
    {
        $url = self::getBasePath($this->getId()).'/closed';
        $board = self::put($url, ['value' => true]);

        return true;
    }

    /**
     * Close board
     *
     * @param  string $board_id
     *
     * @return Board
     * @throws Exception\ValidationsFailed
     */
    public static function closeWithId($board_id = null)
    {
        if ($board_id) {
            $url = self::getBasePath($board_id).'/closed';
            $board = self::put($url, ['value' => true]);

            return true;
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
     * Get stars on board
     *
     * @return mixed
     */
    public function getStars()
    {
        return static::get(static::getBasePath($this->id).'/boardStars');
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
}
