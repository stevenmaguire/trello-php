<?php

require_once realpath(dirname(__FILE__)) . "/../vendor/autoload.php";

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
}
