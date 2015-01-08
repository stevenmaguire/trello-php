<?php

class Checklist_Test extends IntegrationTestCase
{
    public function test_It_Can_Create_A_Checklist_When_Board_Id_Not_Provided()
    {
        $board = $this->createTestBoard();
        $attributes = ['idBoard' => $board->id];

        $checklist = Trello_Checklist::create($attributes);

        $this->assertInstanceOf('Trello_Checklist', $checklist);
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_Checklist_When_Board_Id_Not_Provided()
    {
        $checklist = Trello_Checklist::create();
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Fetch_A_Checklist_When_Id_Not_Provided()
    {
        $checklist = Trello_Checklist::fetch();
    }

    public function test_It_Can_Fetch_A_Checklist_When_Id_Provided()
    {
        $checklist = $this->createTestChecklist();

        $result = Trello_Checklist::fetch($checklist->id);

        $this->assertInstanceOf('Trello_Checklist', $result);
        $this->assertEquals($checklist->id, $result->id);
    }

    public function test_It_Can_Fetch_Multiple_Checklist_When_Ids_Provided()
    {
        $checklist1 = $this->createTestChecklist();
        $checklist2 = $this->createTestChecklist(true);
        $checklist_ids = [$checklist1->id, $checklist2->id];

        $result = Trello_Checklist::fetch($checklist_ids);

        $this->assertInstanceOf('Trello_Collection', $result);
        $this->assertEquals($checklist1->id, $result[0]->id);
        $this->assertEquals($checklist2->id, $result[1]->id);
    }
}
