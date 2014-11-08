<?php
/**
 * Trello Json parser and generator
 * PHP version 5
 * superclass for Trello Json parsing and generation
 *
 * @copyright  2014 Steven Maguire
 */
final class Trello_Json
{
    /**
     * @ignore
     */
    protected function  __construct()
    {

    }

    /**
     *
     * @param string $json
     * @return stdClass
     */
    public static function buildObjectFromJson($json)
    {
        return json_decode($json);
        //return Trello_Xml_Parser::arrayFromXml($xml);
    }

    /**
     *
     * @param array $array
     * @return string
     */
    public static function buildJsonFromArray($array)
    {
        return json_encode($array);
        //return Trello_Xml_Generator::arrayToXml($array);
    }
}
