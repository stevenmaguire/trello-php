<?php

class Http_Test extends TestCase
{
    protected $username = 'stevenmaguire';
    protected $board_name = 'icanhasdevelopmentenvironment';

    public function test_It_Can_Get()
    {
        $result = Trello_Http::get('/members/'.$this->username);

        $this->assertTrue(is_object($result));
        $this->assertEquals($this->username, $result->username);
        return $result->id;
    }

    public function test_It_Can_Post()
    {
        $board_data = ['name' => $this->board_name];

        $result = Trello_Http::post('/boards', $board_data);

        $this->assertTrue(is_object($result));
        return $result->id;
    }

    /**
     * @depends test_It_Can_Post
     */
    public function test_It_Can_Delete($board_id)
    {
        $powerup = 'voting';
        $setup = Trello_Http::post('/boards/'.$board_id.'/powerUps/', ['value' => $powerup]);

        $result = Trello_Http::delete('/boards/'.$board_id.'/powerUps/'.$powerup);
    }

    /**
     * @depends test_It_Can_Post
     */
    public function test_It_Can_Put($board_id)
    {
        $board_data = ['value' => true];

        $result = Trello_Http::put('/boards/'.$board_id.'/closed', $board_data);

        $this->assertTrue(is_object($result));
    }

}
