<?php
/**
 * Trello Json parser and generator
 * superclass for Trello Json parsing and generation
 *
 * @package    Trello
 * @subpackage Utility
 * @copyright  Steven Maguire
 */
final class Trello_Json
{
    /**
     * @codeCoverageIgnore
     */
    protected function  __construct()
    {

    }

    /**
     * Build object from JSON string
     *
     * @param string $json
     *
     * @return stdClass
     */
    public static function buildObjectFromJson($json)
    {
        return json_decode($json);
    }

    /**
     * Build JSON string from object
     *
     * @param array $array
     *
     * @return string
     */
    public static function buildJsonFromArray($array)
    {
        return json_encode($array);
    }
}
