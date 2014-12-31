<?php
/**
 * Trello Xml parser and generator
 * PHP version 5
 * superclass for Trello XML parsing and generation
 *
 * @copyright  2014 Steven Maguire
 */
final class Trello_Xml
{
    /**
     * @codeCoverageIgnore
     */
    protected function  __construct()
    {

    }

    /**
     * Build array from XML document
     *
     * @access public
     * @param string $xml
     *
     * @return array
     */
    public static function buildArrayFromXml($xml)
    {
        if (self::isXml($xml)) {
            return Trello_Xml_Parser::arrayFromXml($xml);
        }
        return [];
    }

    /**
     * Build XML document from array
     *
     * @access public
     * @param array $array
     *
     * @return string
     */
    public static function buildXmlFromArray($array)
    {
        return Trello_Xml_Generator::arrayToXml($array);
    }

    /**
     * Check if string is Xml
     *
     * @param  string $string Xml string candidate
     *
     * @return boolean It is Xml!
     */
    public static function isXml($string)
    {
        libxml_use_internal_errors(true);

        $doc = simplexml_load_string($string);

        if (!$doc) {
            $errors = libxml_get_errors();
            if (!empty($errors)) {
                return false;
            }
        }

        libxml_clear_errors();
        return true;
    }
}
