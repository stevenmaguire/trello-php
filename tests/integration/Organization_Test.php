<?php

class Organization_Test extends IntegrationTestCase
{
    private $name = 'Test';

    public function test_It_Can_Create_A_New_Organization_When_Display_Name_Provided()
    {
        $attr = ['displayName' => $this->name];
        $organization = Trello_Organization::create($attr);

        $this->assertInstanceOf('Trello_Organization', $organization);

        return $organization;
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_New_Organization_When_Display_Name_Not_Provided()
    {
        $attr = [];
        $organization = Trello_Organization::create($attr);
    }

    public function test_It_Can_Search_Form_Organizations_When_Query_Provided()
    {
        $keyword = $this->name;
        $results = Trello_Organization::search($keyword);

        $this->assertInstanceOf('Trello_Collection', $results);
    }

    public function test_It_Can_Delete_Current_Organization()
    {
        $organization = $this->createTestOrganization();
        $result = $organization->remove();
    }

    /**
     * @depends test_It_Can_Create_A_New_Organization_When_Display_Name_Provided
     */
    public function test_It_Can_Delete_Specific_Organization_When_Id_Provided($organization)
    {
        $result = Trello_Organization::deleteOrganization($organization->id);

        $this->assertTrue($result);
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     **/
    public function test_It_Can_Not_Delete_Specific_Organization_When_Id_Not_Provided()
    {
        $result = Trello_Organization::deleteOrganization();
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Exist()
    {
        $organization = $this->createTestOrganization();
        $ref_organization = new ReflectionClass($organization);
        $fields = $ref_organization->getProperties();

        foreach ($fields as $field) {
            if (!$field->isStatic()) {
                $response = $organization->getField($field->name, true);
            }
        }
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Not_Exist()
    {
        $organization = $this->createTestOrganization();
        $response = $organization->getField('foo', true);
    }
}
