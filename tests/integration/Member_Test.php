<?php namespace Trello\Tests\Integration;

use \ReflectionClass;
use Trello\Member;

class Member_Test extends IntegrationTestCase
{
    public function test_It_Can_Get_Current_Logged_In_User()
    {
        $result = Member::currentUser();
        //print_r($result);
    }

    public function test_It_Can_Get_Current_Logged_In_Users_Organizations()
    {
        $result = Member::currentUserOrganizations();
        //print_r($result);
    }
}
