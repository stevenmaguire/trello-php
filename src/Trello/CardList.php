<?php namespace Trello;

use Trello\Exception\ValidationsFailed;

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
    use Relationships\Actions,
        Relationships\Cards;

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
     * List parent board
     *
     * @property string $idBoard
     */
    protected $idBoard;

    /**
     * List is closed
     *
     * @property string $closed
     */
    protected $closed;

    /**
     * List position
     *
     * @property integer $pos
     */
    protected $pos;

    /**
     * Lists base path
     *
     * @var string
     */
    protected static $base_path = 'lists';

    /**
     * Default attributes with values
     *
     * @var string[]
     */
    protected static $default_attributes = ['name' => null, 'idBoard' => null];

    /**
     * Required attribute keys
     *
     * @var string[]
     */
    protected static $required_attributes = ['name', 'idBoard'];

    /**
     * Foreign id for model
     *
     * @var string
     */
    protected static $foreign_key = 'idList';

    /**
     * Close list
     *
     * @return boolean
     * @throws Exception\ValidationsFailed
     */
    public function close()
    {
        $url = self::getBasePath($this->getId()).'/closed';
        Http::put($url, ['value' => true]);

        return true;
    }
}
