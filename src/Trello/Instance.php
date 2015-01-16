<?php namespace Trello;

use Trello\Clients\HttpClient;

class Instance
{
    /**
     * [$client description]
     *
     * @var [type]
     */
    private $client;

    /**
     * Errors
     *
     * @var Collection
     */
    private $errors;

    /**
     * Requests
     *
     * @var Collection
     */
    private $requests;

    /**
     * Returns the Instance instance of this class.
     *
     * @staticvar Instance $instance The Instance instances of this class.
     *
     * @return Instance|null The Instance instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * Instance via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
        $this->errors = new Collection;
        $this->requests = new Collection;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Instance instance.
     *
     * @codeCoverageIgnore
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the Instance
     * instance.
     *
     * @codeCoverageIgnore
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * [getHttpClient description]
     *
     * @return [type] [description]
     */
    public function getHttpClient()
    {
        if (empty($this->client)) {
            $this->client = new HttpClient;
        }
        return $this->client;
    }

    /**
     * [setHttpClient description]
     *
     * @return [type] [description]
     */
    public function setHttpClient(Contracts_HttpClient $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Log request
     *
     * @param  string $verb
     * @param  string $path
     * @param  string $body
     *
     * @return Instance
     */
    public function logRequest($verb, $path, $body = null)
    {
        $request = [$verb, $path, $body];
        $this->requests->add($request);
        $this->writeLogLine(implode(',', $request));
        return $this;
    }

    /**
     * Get requests collection
     *
     * @return Collection
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Write line to log file
     *
     * @param  string $string
     */
    private function writeLogLine($string)
    {
        $log_file = realpath(
            dirname(
                dirname(
                    dirname(__FILE__)
                )
            )
        )."/build/".date('Y-m-d').".log"."\n";
        $handle = fopen($log_file, "a");
        fwrite($handle, $string."\n");
        fclose($handle);
    }
}
