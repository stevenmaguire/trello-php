<?php namespace Trello\Tests\Integration;

use \ReflectionClass;
use Trello\CardList;

class CardList_Test extends IntegrationTestCase
{
    public function test_It_Can_Fetch_A_List_When_Id_Provided()
    {
        $list = $this->createTestList();

        $result = CardList::fetch($list->id);

        $this->assertInstanceOf('Trello\CardList', $result);
        $this->assertEquals($list->id, $result->id);
    }

    public function test_It_Can_Fetch_A_Collection_Of_Lists_When_Ids_Provided()
    {
        $list1 = $this->createTestList();
        $list2 = $this->createTestList(true);

        $result = CardList::fetchMany([$list1->id, $list2->id]);

        $this->assertInstanceOf('Trello\Collection', $result);
        $this->assertEquals($list1->id, $result[0]->id);
        $this->assertEquals($list2->id, $result[1]->id);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Fetch_A_List_When_Id_Not_Provided()
    {
        $list = CardList::fetch();
    }

    public function test_It_Can_Create_A_List_When_Name_And_Board_Id_Provided()
    {
        $board = $this->createTestBoard();
        $attributes = ['name' => 'test', 'idBoard' => $board->id];

        $list = CardList::create($attributes);

        $this->assertInstanceOf('Trello\CardList', $list);
        $this->assertEquals($board->id, $list->idBoard);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Create_A_List_When_Name_Not_Provided()
    {
        $list = CardList::create();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Create_A_List_When_Board_Id_Not_Provided()
    {
        $attributes = ['name' => 'test'];

        $list = CardList::create($attributes);
    }

    public function test_It_Can_Fetch_Collection_Of_Child_Cards()
    {
        $attributes = ['name' => 'test card'];
        $list = $this->createTestList();
        $card = $list->createCard($attributes);

        $result = $list->getCards();

        $this->assertInstanceOf('Trello\Collection', $result);
    }

    public function test_It_Can_Add_A_Card_When_Card_Model_Provided()
    {
        $list = $this->createTestList();
        $card = $this->createTestCard();

        $result = $list->addCard($card);

        $this->assertInstanceOf('Trello\Card', $result);
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Exist()
    {
        $list = $this->createTestList();
        $ref_list = new ReflectionClass($list);
        $fields = $ref_list->getProperties();

        foreach ($fields as $field) {
            if (!$field->isStatic()) {
                $response = $list->getField($field->name, true);
            }
        }
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Not_Exist()
    {
        $list = $this->createTestList();
        $response = $list->getField('foo', true);
    }
}
