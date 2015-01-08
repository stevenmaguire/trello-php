<?php

class List_Test extends IntegrationTestCase
{
    public function test_It_Can_Fetch_A_List_When_Id_Provided()
    {
        $list = $this->createTestList();

        $result = Trello_List::fetch($list->id);

        $this->assertInstanceOf('Trello_List', $result);
        $this->assertEquals($list->id, $result->id);
    }

    public function test_It_Can_Fetch_A_Collection_Of_Lists_When_Ids_Provided()
    {
        $list1 = $this->createTestList();
        $list2 = $this->createTestList(true);

        $result = Trello_List::fetch([$list1->id, $list2->id]);

        $this->assertInstanceOf('Trello_Collection', $result);
        $this->assertEquals($list1->id, $result[0]->id);
        $this->assertEquals($list2->id, $result[1]->id);
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     */
    public function test_It_Can_Not_Fetch_A_List_When_Id_Not_Provided()
    {
        $list = Trello_List::fetch();
    }

    public function test_It_Can_Create_A_List_When_Name_And_Board_Id_Provided()
    {
        $board = $this->createTestBoard();
        $attributes = ['name' => 'test', 'idBoard' => $board->id];

        $list = Trello_List::create($attributes);

        $this->assertInstanceOf('Trello_List', $list);
        $this->assertEquals($board->id, $list->idBoard);
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     */
    public function test_It_Can_Not_Create_A_List_When_Name_Not_Provided()
    {
        $list = Trello_List::create();
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     */
    public function test_It_Can_Not_Create_A_List_When_Board_Id_Not_Provided()
    {
        $attributes = ['name' => 'test'];

        $list = Trello_List::create($attributes);
    }

    public function test_It_Can_Fetch_Collection_Of_Child_Cards()
    {
        $attributes = ['name' => 'test card'];
        $list = $this->createTestList();
        $card = $list->createCard($attributes);

        $result = $list->getCards();

        $this->assertInstanceOf('Trello_Collection', $result);
    }

    public function test_It_Can_Add_A_Card_When_Card_Model_Provided()
    {
        $list = $this->createTestList();
        $card = $this->createTestCard();

        $result = $list->addCard($card);

        $this->assertInstanceOf('Trello_Card', $result);
    }
}
