<?php namespace Trello\Tests\Unit;

use \Mockery;
use Trello\Board;
use Trello\Instance;
use Trello\Tests\Helpers\Response;

class Board_Test extends UnitTestCase
{
    public function test_It_Can_Create_A_New_Board_With_Only_A_Name_Provided()
    {
        $board = Response::make(Board::class)
            ->set('name', $this->board_name)
            ->get();

        $client = Mockery::mock('Trello\Contracts\HttpClient');
        $client->shouldReceive('sendRequest')->once();
        $client->shouldReceive('setHeaders')->once()->andReturn($client);
        $client->shouldReceive('getResponseBody')->once()->andReturn($board);
        $client->shouldReceive('getResponseStatus')->once()->andReturn(200);

        Instance::getInstance()->setHttpClient($client);
        $attributes = ['name' => $this->board_name];

        $result = Board::create($attributes);

        $this->assertInstanceOf('Trello\Board', $result);
        $this->assertEquals($this->board_name, $result->name);
        $this->assertNull($result->cash_money);
    }
}
