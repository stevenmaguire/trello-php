<?php

class Board_Test extends TestCase
{
    protected $board_name = 'Hank Hill';

    public function test_It_Can_Create_A_New_Board_With_Only_A_Name_Provided()
    {
        $result = Trello_Board::create($this->board_name);

        $this->assertEquals('Trello_Board', get_class($result));
    }

    public function test_It_Can_Search_Boards()
    {
        $results = Trello_Board::search($this->board_name);

        $this->assertEquals('Trello_Collection', get_class($results));
        return $results;
    }

    /**
     * @depends test_It_Can_Search_Boards
     */
    public function test_It_Can_Close_A_Board($boards)
    {
        foreach ($boards as $board) {
            $result = Trello_Board::close($board->id);
            $this->assertTrue($result);
        }
    }
}
