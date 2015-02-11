<?php namespace Trello\Tests\Unit;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use Trello\Instance;

class Instance_Test extends UnitTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->directory = dirname(dirname(__DIR__));
    }

    public function test_It_Will_Create_Log_Directory_If_Not_Exists()
    {
        $logs = $this->directory.'/build';
        \system('/bin/rm -rf ' . escapeshellarg($logs));

        Instance::getInstance()->getLogDirectory();
    }
}
