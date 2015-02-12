<?php namespace Trello\Tests\Unit;

use Trello\Board;
use Trello\Checklist;
use Trello\Tests\Helpers\Response;

class Board_Test extends UnitTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->board = new Board;
    }

    public function test_It_Can_Create_A_New_Board_With_Only_A_Name_Provided()
    {
        $attributes = ['name' => $this->board_name];
        $response = '{"name":"'.$attributes['name'].'"}';
        $client = $this->successClientWith($response);
        $this->useClient($client);

        $result = Board::create($attributes);

        $this->assertInstanceOf('Trello\Board', $result);
        $this->assertEquals($attributes['name'], $result->name);
        $this->assertNull($result->cash_money);
        $this->assertNull($result->cash_money());
    }

    public function test_It_Can_Update_Board_Name_When_Name_Provided()
    {
        $attributes = ['name' => $this->board_name];
        $response = '{"name":"'.$attributes['name'].'"}';
        $client = $this->successClientWith($response);
        $this->useClient($client);

        $board = $this->board;

        $result = $board->updateName($attributes['name']);

        $this->assertInstanceOf('Trello\Board', $result);
        $this->assertEquals($attributes['name'], $result->name);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Create_A_New_Board_When_Name_Not_Provided()
    {
        $result = Board::create();
    }

    /**
     * @expectedException Exception
     */
    public function test_It_Can_Not_Add_Checklist_To_Board_When_Name_Not_Provided()
    {
        $this->board->addChecklist();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Add_Powerup_To_Board_When_Powerup_Not_Provided()
    {
        $this->board->addPowerUp();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Close_Board_When_No_Board_Id_Provided()
    {
        Board::closeWithId();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Fetch_Board_When_No_Board_Id_Provided()
    {
        Board::fetch();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     */
    public function test_It_Can_Not_Remove_Powerup_To_Board_When_Powerup_Not_Provided()
    {
        $this->board->removePowerUp();
    }
}
