<?php

require_once realpath(dirname(__FILE__)) . "/../vendor/autoload.php";

abstract class IntegrationTestCase extends TestCase
{
    private $test_org = null;
    private $test_board = null;
    private $test_list = null;
    private $test_card = null;

    protected function createTestOrganization()
    {
        if (is_null($this->test_org)) {
            $this->test_org = Trello_Organization::create(['displayName' => 'test']);
        }
        return $this->test_org;
    }

    protected function createTestBoard()
    {
        $org = $this->createTestOrganization();
        if (is_null($this->test_board)) {
            $this->test_board = Trello_Board::create(['name' => 'test', 'idOrganization' => $org->id]);
        }
        return $this->test_board;
    }

    protected function createTestList()
    {
        $board = $this->createTestBoard();
        if (is_null($this->test_list)) {
            $this->test_list = Trello_List::create(['name' => 'test', 'idBoard' => $board->id]);
        }
        return $this->test_list;
    }

    protected function createTestCard()
    {
        $list = $this->createTestList();
        if (is_null($this->test_card)) {
            $this->test_card = Trello_Card::create(['name' => 'test', 'idList' => $list->id]);
        }
        return $this->test_card;
    }

    private static function emptyAccount()
    {
        $organizations = Trello_Organization::search('test', ['organizations_limit' => 1000]);
        foreach ($organizations as $org) {
            $result = Trello_Organization::deleteOrganization($org->id);
        }
        $boards = Trello_Board::search('test', ['boards_limit' => 1000]);
        foreach ($boards as $board) {
            $result = Trello_Board::closeBoard($board->id);
        }
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        //self::emptyAccount();
    }
}
