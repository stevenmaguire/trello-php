<?php namespace Trello\Tests\Unit;

use \Mockery;
use Trello\Board;

class Board_Test extends UnitTestCase
{
    public function test_It_Can_Create_A_New_Board_With_Only_A_Name_Provided()
    {
        $client = Mockery::mock('Trello\Clients\HttpClient');
        $client->shouldRecieve('sendRequest')->times(3);

        Instance::getInstance()->setHttpClient($client);

        $attributes = ['name' => $this->board_name];

        $result = Board::create($attributes);
    }
}
