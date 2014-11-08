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
 * @property-read string $closed
 * @property-read string $idOrganization
 * @property-read string $pinned
 * @property-read string $url
 * @property-read string $shortUrl
 * @property-read stdClass $prefs
 * @property-read stdClass $labelNames
 */
class Trello_Board extends Trello_Model
{
    /**
     * create a new board
     *
     * @param  array $attribs Board attributes to set
     * @return Trello_Board  Newly minted trello board
     * @throws Braintree_Exception_ValidationError
     */
    public static function create($name = null, $attribs = [])
    {
        if (empty($name) && !isset($attribs['name'])) {
            throw new Trello_Exception_ValidationError(
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
        if (array_key_exists('boards', $results)) {
            return new Trello_Collection($results->boards);
        } else {
            throw new Trello_Exception_DownForMaintenance();
        }
    }

    public static function close($board_id = null)
    {
        $result = Trello_Http::put('/boards/'.$board_id.'/closed', ['value' => true]);
        return $result->closed;
    }
}
