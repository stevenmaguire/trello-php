<?php

namespace Stevenmaguire\Services\Trello\Tests;

use PHPUnit\Framework\TestCase;
use Stevenmaguire\Services\Trello\Client;

class BuilderTest extends TestCase
{
    protected $build = false;

    public function setUp()
    {
        parent::setUp();
        $this->client = new Client();
    }

    protected function getVerbFromMethod($method)
    {
        if (strrpos($method, 'get') === 0) {
            return 'GET';
        }

        if (strrpos($method, 'add') === 0) {
            return 'POST';
        }

        if (strrpos($method, 'update') === 0) {
            return 'PUT';
        }

        if (strrpos($method, 'delete') === 0) {
            return 'POST';
        }

        return null;
    }

    protected function getPathFromMethod($method)
    {
        $path = '/';
        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $method, $matches);
        $parts = $matches[0];
        array_shift($parts);
        if (!empty($parts)) {
            $parts[0] = $parts[0].'s';

            $parts = array_map('strtolower', $parts);

            $path .= implode('/%s/', $parts);
        }

        return $path;
    }

    protected function getTitleFrom($method)
    {
        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $method, $matches);
        $parts = $matches[0];

        $parts = array_map('strtolower', $parts);

        if (isset($parts[0])) {
            $parts[0] = ucfirst($parts[0]);
        }

        return implode(' ', $parts);
    }

    public function testBuilder()
    {
        if ($this->build) {
            $this->assertTrue($this->build);
            $ref = new \ReflectionClass(Client::class);

            $dontWrite = ['__construct','setHttpClient','getHttp','parseDefaultOptions','makeQuery','addBatchUrl','getBatchUrls','parseBatchAttributes'];

            $details = '['."\n";

            foreach ($ref->getMethods() as $method) {
                if (!in_array($method->getName(), $dontWrite)) {
                    $contents = [];
                    $contents['name'] = $method->getName();
                    $filename = $method->getFileName();
                    $start_line = $method->getStartLine() - 1; // it's actually - 1, otherwise you wont get the function() block
                    $end_line = $method->getEndLine();
                    $length = $end_line - $start_line;

                    $source = file($filename);
                    $body = implode("", array_slice($source, $start_line, $length));

                    preg_match_all('/getHttp\(\)->([a-z]+)\(/', $body, $matches);
                    if (isset($matches[1][0])) {
                        $contents['method'] = $matches[1][0];
                    }

                    preg_match_all('/\([\'|"]([^\'|"]+)[\'|"]/', $body, $matches);
                    if (isset($matches[1][0])) {
                        $contents['pattern'] = $matches[1][0];
                    }

                    $details .= "\t"."'".$method->getName()."' => ["."\n";
                    if (isset($contents['method'])) {
                        //$details .= "\t\t"."'method' => '".$contents['method']."',"."\n";
                    } else {
                        print_r($details);
                        exit;
                    }
                    $details .= "\t\t"."'method' => '".$contents['method']."',"."\n";

                    if (isset($contents['pattern'])) {
                        //$details .= "\t\t"."'pattern' => '".$contents['pattern']."'"."\n";
                    } else {
                        print_r($details);
                        exit;
                    }
                    $details .= "\t\t"."'pattern' => '".$contents['pattern']."'"."\n";

                    $details .= "\t"."],"."\n";
                    //print_r($contents);
                }
            }

            $details .= '];';

            print_r($details);

            //file_put_contents(__DIR__."/useage.md", $testCase);
        } else {
            $this->assertFalse($this->build);
        }
    }
}
