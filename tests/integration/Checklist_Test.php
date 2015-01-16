<?php namespace Trello\Tests\Integration;

class Checklist_Test extends IntegrationTestCase
{
    public function test_It_Can_Create_A_Checklist_When_Board_Id_Not_Provided()
    {
        $board = $this->createTestBoard();
        $attributes = ['idBoard' => $board->id];

        $checklist = Checklist::create($attributes);

        $this->assertInstanceOf('Checklist', $checklist);
    }

    /**
     * @expectedException Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_Checklist_When_Board_Id_Not_Provided()
    {
        $checklist = Checklist::create();
    }

    /**
     * @expectedException Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Fetch_A_Checklist_When_Id_Not_Provided()
    {
        $checklist = Checklist::fetch();
    }

    public function test_It_Can_Fetch_A_Checklist_When_Id_Provided()
    {
        $checklist = $this->createTestChecklist();

        $result = Checklist::fetch($checklist->id);

        $this->assertInstanceOf('Checklist', $result);
        $this->assertEquals($checklist->id, $result->id);
    }

    public function test_It_Can_Fetch_Multiple_Checklist_When_Ids_Provided()
    {
        $checklist1 = $this->createTestChecklist();
        $checklist2 = $this->createTestChecklist(true);
        $checklist_ids = [$checklist1->id, $checklist2->id];

        $result = Checklist::fetch($checklist_ids);

        $this->assertInstanceOf('Collection', $result);
        $this->assertEquals($checklist1->id, $result[0]->id);
        $this->assertEquals($checklist2->id, $result[1]->id);
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Exist()
    {
        $checklist = $this->createTestChecklist();
        $ref_checklist = new ReflectionClass($checklist);
        $fields = $ref_checklist->getProperties();

        foreach ($fields as $field) {
            if (!$field->isStatic()) {
                $response = $checklist->getField($field->name, true);
            }
        }
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Not_Exist()
    {
        $checklist = $this->createTestChecklist();
        $response = $checklist->getField('foo', true);
    }
}
