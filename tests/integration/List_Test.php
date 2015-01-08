<?php

class List_Test extends IntegrationTestCase
{
    public function test_It_Can_Fetch_A_List_When_Id_Provided()
    {
        $list_id = '54a72706bac33a0cecf01579';
        $list = Trello_List::fetch($list_id);

        $this->assertInstanceOf('Trello_List', $list);
    }

    /**
     * @expectedException Trello_Exception_ValidationsFailed
     */
    public function test_It_Can_Not_Fetch_A_List_When_Id_Not_Provided()
    {
        $list = Trello_List::fetch();
    }
}
