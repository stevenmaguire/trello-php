<?php

require_once realpath(dirname(__FILE__)) . "/../vendor/autoload.php";

abstract class IntegrationTestCase extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Trello_Configuration::environment($GLOBALS['trello_test_config']['environment']);
        Trello_Configuration::key($GLOBALS['trello_test_config']['key']);
        Trello_Configuration::secret($GLOBALS['trello_test_config']['secret']);
        Trello_Configuration::token($GLOBALS['trello_test_config']['token']);
        Trello_Configuration::applicationName($GLOBALS['trello_test_config']['app_name']);
    }
}
