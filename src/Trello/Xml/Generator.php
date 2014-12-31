<?php
/**
 * Generates XML output from arrays using PHP's
 * built-in XMLWriter
 *
 * @copyright  2014 Steven Maguire
 */
class Trello_Xml_Generator
{
    /**
     * arrays passed to this method should have a single root element
     * with an array as its value
     *
     * @param array $aData the array of data
     *
     * @return var XML string
     */
    public static function arrayToXml($array = [])
    {
        $writer = new XMLWriter();
        $writer->openMemory();

        if (!empty($array)) {
            $writer->setIndent(true);
            $writer->setIndentString(' ');
            $writer->startDocument('1.0', 'UTF-8');

            $array_keys = array_keys($array);
            $rootElementName = $array_keys[0];
            $writer->startElement(Trello_Util::camelCaseToDelimiter($rootElementName));
            self::_createElementsFromArray($writer, $array[$rootElementName]);
        }

        $writer->endElement();
        $writer->endDocument();

        return $writer->outputMemory();
    }

    /**
     * Construct XML elements with attributes from an associative array.
     *
     * @access protected
     * @static
     * @param object $writer XMLWriter object
     * @param array $aData contains attributes and values
     * @return none
     */
    private static function _createElementsFromArray(&$writer, $aData)
    {
        if (!is_array($aData)) {
            if (is_bool($aData)) {
                $writer->text($aData ? 'true' : 'false');
            } else {
                $writer->text($aData);
            }
          return;
        }
        foreach ($aData AS $index => $element) {
            // convert the style back to gateway format
            $elementName = Trello_Util::camelCaseToDelimiter($index, '-');
            // handle child elements
            $writer->startElement($elementName);
            if (is_array($element)) {
                if (array_key_exists(0, $element) || empty($element)) {
                    $writer->writeAttribute('type', 'array');
                    foreach ($element AS $ignored => $itemInArray) {
                        $writer->startElement('item');
                        self::_createElementsFromArray($writer, $itemInArray);
                        $writer->endElement();
                    }
                }
                else {
                    self::_createElementsFromArray($writer, $element);
                }
            } else {
                // generate attributes as needed
                $attribute = self::_generateXmlAttribute($element);
                if (is_array($attribute)) {
                    $writer->writeAttribute($attribute[0], $attribute[1]);
                    $element = $attribute[2];
                }
                $writer->text($element);
            }
            $writer->endElement();
        }
    }

    /**
     * convert passed data into an array of attributeType, attributeName, and value
     * dates sent as DateTime objects will be converted to strings
     * @access protected
     * @param mixed $value
     * @return array attributes and element value
     */
    private static function _generateXmlAttribute($value)
    {
        if ($value instanceof DateTime) {
            return ['type', 'datetime', self::_dateTimeToXmlTimestamp($value)];
        }
        if (is_int($value)) {
            return ['type', 'integer', $value];
        }
        if (is_bool($value)) {
            return ['type', 'boolean', ($value ? 'true' : 'false')];
        }
        if ($value === NULL) {
            return ['nil', 'true', $value];
        }
    }
    /**
     * converts datetime back to xml schema format
     * @access protected
     * @param object $dateTime
     * @return var XML schema formatted timestamp
     */
    private static function _dateTimeToXmlTimestamp($dateTime)
    {
        $dateTime->setTimeZone(new DateTimeZone('UTC'));
        return ($dateTime->format('Y-m-d\TH:i:s') . 'Z');
    }
}
