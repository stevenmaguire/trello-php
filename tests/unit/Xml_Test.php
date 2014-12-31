<?php

class Xml_Test extends TestCase
{
    private $valid_xml = "<?xml version='1.0' encoding='UTF-8'?>\n\t<document>\n\t</document>";

    public function test_It_Can_Validate_Xml()
    {
        $string1 = 'Hey';
        $string2 = $this->valid_xml;

        $test1 = Trello_Xml::isXml($string1);
        $test2 = Trello_Xml::isXml($string2);

        $this->assertFalse($test1);
        $this->assertTrue($test2);
    }

    public function test_It_Can_Convert_Array_To_Xml_When_Array_Not_Empty()
    {
        $array = ['node' => 'value'];

        $xml = Trello_Xml::buildXmlFromArray($array);
        $test = Trello_Xml::isXml($xml);

        $this->assertTrue($test);
    }

    public function test_It_Can_Not_Convert_Array_To_Xml_When_Array_Empty()
    {
        $array = [];

        $xml = Trello_Xml::buildXmlFromArray($array);
        $test = Trello_Xml::isXml($xml);

        $this->assertFalse($test);
    }

    public function test_It_Can_Convert_Xml_To_Array_When_Xml_Valid()
    {
        $xml = $this->valid_xml;

        $array = Trello_Xml::buildArrayFromXml($xml);

        $this->assertNotEmpty($array);
    }

    public function test_It_Can_Convert_Xml_To_Array_When_Xml_Not_Valid()
    {
        $xml = 'not valid xml';

        $array = Trello_Xml::buildArrayFromXml($xml);

        $this->assertEmpty($array);
    }
}
