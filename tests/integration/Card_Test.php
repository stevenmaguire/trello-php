<?php

class Card_Test extends IntegrationTestCase
{

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_New_Card_When_No_Attributes_Provided()
    {
        $card = Trello_Card::create();
    }

    public function test_It_Can_Create_A_New_Card_When_Name_List_Id_Provided()
    {
        /*
        $list = $this->createTestList();
        $card = Trello_Card::create(['name' => 'test card', 'idList' => $list->id]);

        $this->assertInstanceOf('Trello_Card', $card);
        $this->assertEquals($list->id, $card->idList);

        return $card;
        */
    }

    /**
     * @depends test_It_Can_Create_A_New_Card_When_Name_List_Id_Provided
     **/
    public function test_It_Can_Update_Parent_List_When_List_Model_Provided($card)
    {
        /*
        $list = $this->createTestList();

        $this->assertNotEquals($list->id, $card->idList);

        $result = $card->updateList($list);

        print_r($result);
        */
    }
}
