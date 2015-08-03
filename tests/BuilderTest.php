<?php namespace Stevenmaguire\Services\Trello\Tests;

use Stevenmaguire\Services\Trello\Client;

class BuilderTest extends \PHPUnit_Framework_TestCase
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
            $ref = new \ReflectionClass(Client::class);

            $testCase = '';

            $dontWrite = ['__construct','setHttpClient','getHttp','parseDefaultOptions'];

            foreach ($ref->getMethods() as $method) {
                if (!in_array($method->getName(), $dontWrite)) {
                    $methodSignature = $method->getName().'(';
                    $args = [];
                    foreach ($method->getParameters() as $parameter) {
                        $args[] = '$'.$parameter->getName();
                    }
                    $methodSignature .= implode(', ', $args).');';

                    $testCase .= '##### '.$this->getTitleFrom($method->getName())."\n\n";
                    $testCase .= '```php'."\n";
                    $testCase .= '$result = $client->'.$method->getName().'(';
                    $testCase .= implode(', ', $args);
                    $testCase .= ');'."\n";

                    $testCase .= '```'."\n";
                }
            }

            $testCase .= "\n";

            file_put_contents(__DIR__."/useage.md", $testCase);
        }
    }
}
