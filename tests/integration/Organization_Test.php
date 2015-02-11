<?php namespace Trello\Tests\Integration;

use \ReflectionClass;
use Trello\Organization;

class Organization_Test extends IntegrationTestCase
{
    private $name = 'Test';

    public function test_It_Can_Create_A_New_Organization_When_Display_Name_Provided()
    {
        $attr = ['displayName' => $this->name];
        $organization = Organization::create($attr);

        $this->assertInstanceOf('Trello\Organization', $organization);

        return $organization;
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_New_Organization_When_Display_Name_Not_Provided()
    {
        $attr = [];
        $organization = Organization::create($attr);
    }

    public function test_It_Can_Search_Form_Organizations_When_Query_Provided()
    {
        $keyword = $this->name;
        $results = Organization::search($keyword);

        $this->assertInstanceOf('Trello\Collection', $results);
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Not_Exist()
    {
        $organization = $this->createTestOrganization();
        $response = $organization->getField('foo', true);
    }

    public function test_It_Can_Get_Members_For_Given_Organization_When_Organization_Id_Provided()
    {
        $organization = $this->createTestOrganization();

        $response = Organization::members($organization->id, ['filter' => 'admins', 'fields' => 'fullName,username,memberType,idPremOrgsAdmin']);

        $this->assertInstanceOf('Trello\Collection', $response);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Get_Members_For_Given_Organization_When_Organization_Id_Not_Provided()
    {
        $response = Organization::members();
    }

    public function test_It_Can_Get_Boards_For_Given_Organization_When_Organization_Id_Provided()
    {
        $board = $this->createTestBoard();

        $response = Organization::boards($board->idOrganization, ['filter' => 'open']);

        $this->assertInstanceOf('Trello\Collection', $response);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Get_Boards_For_Given_Organization_When_Organization_Id_Not_Provided()
    {
        $response = Organization::boards();
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
        $result = Organization::deleteOrganization($organization->id);

        $this->assertTrue($result);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Delete_Specific_Organization_When_Id_Not_Provided()
    {
        $result = Organization::deleteOrganization();
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
}
