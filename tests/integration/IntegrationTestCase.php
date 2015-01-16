<?php namespace Trello\Tests\Integration;

use Trello\Tests\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected function createTestOrganization()
    {
        return IntegrationTestHelper::getInstance()->getOrganization();
    }

    protected function createTestBoard()
    {
        return IntegrationTestHelper::getInstance()->getBoard();
    }

    protected function createTestList()
    {
        return IntegrationTestHelper::getInstance()->getList();
    }

    protected function createTestCard()
    {
        return IntegrationTestHelper::getInstance()->getCard();
    }

    protected function createTestChecklist()
    {
        return IntegrationTestHelper::getInstance()->getChecklist();
    }
}
