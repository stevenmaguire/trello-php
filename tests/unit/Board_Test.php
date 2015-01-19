<?php namespace Trello\Tests\Unit;

use Trello\Board;
use Trello\Tests\Helpers\Response;

class Board_Test extends UnitTestCase
{
    public function test_It_Can_Create_A_New_Board_With_Only_A_Name_Provided()
    {
        $board = Response::make(Board::class)
            ->set('name', $this->board_name)
            ->get();
        $this->successWith($board);
        $attributes = ['name' => $this->board_name];

        $result = Board::create($attributes);

        $this->assertInstanceOf('Trello\Board', $result);
        $this->assertEquals($this->board_name, $result->name);
        $this->assertNull($result->cash_money);
    }
}
