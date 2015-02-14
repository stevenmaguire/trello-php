<?php namespace Trello\Tests\Integration;

use Trello\Tests\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected function createTestOrganization($force = false)
    {
        return IntegrationTestHelper::getInstance()->getOrganization($force);
    }

    protected function createTestBoard($force = false)
    {
        return IntegrationTestHelper::getInstance()->getBoard($force);
    }

    protected function createTestList($force = false)
    {
        return IntegrationTestHelper::getInstance()->getList($force);
    }

    protected function createTestCard($force = false)
    {
        return IntegrationTestHelper::getInstance()->getCard($force);
    }

    protected function createTestChecklist($force = false)
    {
        return IntegrationTestHelper::getInstance()->getChecklist($force);
    }
}
