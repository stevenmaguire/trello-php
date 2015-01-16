<?php namespace Trello\Tests\Unit;

use Trello\Collection;

class Collection_Test extends UnitTestCase
{
    private function makeCollection($contents = [])
    {
        return new Collection($contents);
    }

    public function test_It_Can_Get_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['value1','value2'];
        $index = 1;
        $collection = $this->makeCollection($items);

        $value = $collection->get($index);

        $this->assertEquals($items[$index], $value);
        $this->assertTrue($collection->exists($index));
    }

    public function test_It_Can_Offset_Get_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['value1','value2'];
        $index = 1;
        $collection = $this->makeCollection($items);

        $value = $collection->offsetGet($index);

        $this->assertEquals($items[$index], $value);
        $this->assertTrue($collection->offsetExists($index));
    }

    public function test_It_Can_Set_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['key1' => 'value1', 'key2' => 'value2'];
        $new_value = 'value3';
        $index = 1;
        $collection = $this->makeCollection($items);

        $collection->set($index, $new_value);
        $updated_value = $collection->get($index);

        $this->assertEquals($updated_value, $new_value);
    }

    public function test_It_Can_Offset_Set_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['key1' => 'value1', 'key2' => 'value2'];
        $new_value = 'value3';
        $index = 1;
        $collection = $this->makeCollection($items);

        $collection->offsetSet($index, $new_value);
        $updated_value = $collection->get($index);

        $this->assertEquals($updated_value, $new_value);
    }

    public function test_It_Can_Remove_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['value1','value2'];
        $index = 1;
        $collection = $this->makeCollection($items);

        $value = $collection->remove($index);

        $this->assertCount(1, $collection);
        $this->assertFalse($collection->exists($index));
    }

    public function test_It_Can_Offset_Unset_A_Value_By_Index_When_Index_In_Range()
    {
        $items = ['value1','value2'];
        $index = 1;
        $collection = $this->makeCollection($items);

        $value = $collection->offsetUnset($index);

        $this->assertCount(1, $collection);
        $this->assertFalse($collection->offsetExists($index));
    }

    public function test_It_Can_Iterate_Over_Items()
    {
        $items = ['value1','value2'];
        $collection = $this->makeCollection($items);

        foreach ($collection as $item) {
            $this->assertTrue(in_array($item, $items));
        }
    }

    public function test_It_Can_Get_First_Value_When_Collection_Not_Empty()
    {
        $items = ['value1','value2'];
        $collection = $this->makeCollection($items);

        $value = $collection->first();

        $this->assertEquals($items[0], $value);
    }

    public function test_It_Can_Get_Last_Value_When_Collection_Not_Empty()
    {
        $items = ['value1','value2'];
        $collection = $this->makeCollection($items);

        $value = $collection->last();

        $this->assertEquals($items[1], $value);
    }

    public function test_It_Can_Get_Same_Value_For_First_And_Last_Value_When_Collection_Contains_One_Item()
    {
        $items = ['value1'];
        $collection = $this->makeCollection($items);

        $first = $collection->first();
        $last = $collection->last();

        $this->assertEquals($first, $last);
    }

    public function test_It_Can_Get_Null_First_Value_When_Collection_Empty()
    {
        $collection = $this->makeCollection();

        $value = $collection->first();

        $this->assertNull($value);
    }

    public function test_It_Can_Get_Null_Last_Value_When_Collection_Empty()
    {
        $collection = $this->makeCollection();

        $value = $collection->last();

        $this->assertNull($value);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Get_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $index = 2;
        $collection = $this->makeCollection();

        $collection->get($index);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Offset_Get_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $index = 2;
        $collection = $this->makeCollection();

        $collection->offsetGet($index);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Set_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $new_value = 'value3';
        $index = 2;
        $collection = $this->makeCollection();

        $collection->set($index, $new_value);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Offset_Set_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $new_value = 'value3';
        $index = 2;
        $collection = $this->makeCollection();

        $collection->offsetSet($index, $new_value);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Remove_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $index = 2;
        $collection = $this->makeCollection();

        $collection->remove($index);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function test_It_Can_Not_Offset_Unset_A_Value_By_Index_When_Index_Out_Of_Range()
    {
        $index = 2;
        $collection = $this->makeCollection();

        $collection->offsetUnset($index);
    }
}
