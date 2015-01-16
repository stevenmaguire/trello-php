<?php namespace Trello\Tests\Unit;

use \DateTime;
use \DateTimeZone;
use Trello\Util;

class Util_Test extends UnitTestCase
{
    public function test_It_Can_Clean_Class_Name()
    {
        $class_name = 'Action';
        $expected_clean_class = 'action';

        $result = Util::cleanClassName($class_name);

        $this->assertEquals($expected_clean_class, $result);
    }

    public function test_It_Can_Build_Class_Name()
    {
        $class = 'action';
        $expected_class_name = 'Action';

        $result = Util::buildClassName($class);

        $this->assertEquals($expected_class_name, $result);
    }

    public function test_It_Can_Convert_Delimiter_To_Camel_Case()
    {
        $camel_case1 = 'camel-humps';
        $expected_string1 = 'camelHumps';
        $camel_case2 = 'camel_humps';
        $expected_string2 = 'camelHumps';
        $camel_case3 = 'camel||humps';
        $delimiter3 = '||';
        $expected_string3 = 'camelHumps';

        $result1 = Util::delimiterToCamelCase($camel_case1);
        $result2 = Util::delimiterToCamelCase($camel_case2);
        $result3 = Util::delimiterToCamelCase($camel_case3, $delimiter3);

        $this->assertEquals($expected_string1, $result1);
        $this->assertEquals($expected_string2, $result2);
        $this->assertEquals($expected_string3, $result3);
    }

    public function test_It_Can_Convert_Delimiter_To_Underscore()
    {
        $string1 = 'custom-attribute';
        $expected_string1 = 'custom_attribute';
        $string2 = 'custom||attribute';
        $delimiter2 = '||';
        $expected_string2 = 'custom_attribute';

        $result1 = Util::delimiterToUnderscore($string1);
        $result2 = Util::delimiterToUnderscore($string2, $delimiter2);

        $this->assertEquals($expected_string1, $result1);
        $this->assertEquals($expected_string2, $result2);
    }

    public function test_It_Can_Convert_Camel_Case_To_Delimiter()
    {
        $camel_case1 = 'camelHumps';
        $expected_string1 = 'camel-humps';
        $camel_case2 = 'camelHumps';
        $delimiter2 = '||';
        $expected_string2 = 'camel||humps';
        $camel_case3 = 'CamelHumps';
        $expected_string3 = '-camel-humps';


        $result1 = Util::camelCaseToDelimiter($camel_case1);
        $result2 = Util::camelCaseToDelimiter($camel_case2, $delimiter2);
        $result3 = Util::camelCaseToDelimiter($camel_case3);

        $this->assertEquals($expected_string1, $result1);
        $this->assertEquals($expected_string2, $result2);
        $this->assertEquals($expected_string3, $result3);
    }

    public function test_It_Can_Convert_Array_of_Attributes_To_String()
    {
        $now = new DateTime();
        $now->setTimestamp(0);
        $now->setTimezone(new DateTimeZone('UTC'));
        $now_string = $now->format(DateTime::RFC850);
        $array = ['key1' => 'value1', 'key2' => ['value1','value2','value3'], 'key3' => $now];
        $expected_string = 'key1=value1, key2=0=value1, 1=value2, 2=value3, '.
            'key3='.$now_string;

        $attribute_string = Util::attributesToString($array);

        $this->assertEquals($expected_string, $attribute_string);
    }

    public function test_It_Can_Build_Query_String_From_Array()
    {
        $array = ['key1' => 'value1', 'key2' => ['value1','value2','value3']];
        $expected_string = 'key1=value1&key2%5B0%5D=value1&key2%5B1%5D=value2&key2%5B2%5D=value3';

        $query_string = Util::buildQueryStringFromArray($array);

        $this->assertEquals($expected_string, $query_string);
    }

    /**
     * @expectedException Trello\Exception\Authentication
     */
    public function test_It_Can_Throw_Authentication_Exception()
    {
        Util::throwStatusCodeException(401);
    }

    /**
     * @expectedException Trello\Exception\Authorization
     */
    public function test_It_Can_Throw_Authorization_Exception()
    {
        Util::throwStatusCodeException(403);
    }

    /**
     * @expectedException Trello\Exception\NotFound
     */
    public function test_It_Can_Throw_NotFound_Exception()
    {
        Util::throwStatusCodeException(404);
    }

    /**
     * @expectedException Trello\Exception\UpgradeRequired
     */
    public function test_It_Can_Throw_UpgradeRequired_Exception()
    {
        Util::throwStatusCodeException(426);
    }

    /**
     * @expectedException Trello\Exception\ServerError
     */
    public function test_It_Can_Throw_ServerError_Exception()
    {
        Util::throwStatusCodeException(500);
    }

    /**
     * @expectedException Trello\Exception\DownForMaintenance
     */
    public function test_It_Can_Throw_DownForMaintenance_Exception()
    {
        Util::throwStatusCodeException(503);
    }

    /**
     * @expectedException Trello\Exception\Unexpected
     */
    public function test_It_Can_Throw_Unexpected_Exception()
    {
        Util::throwStatusCodeException(rand(100,399));
    }
}
