<?php namespace Trello;

use Trello\Clients\HttpClient;
use Trello\Contracts\HttpClient as HttpClientContract;

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
     * Get http client
     *
     * @return HttpClient
     *
     * @codeCoverageIgnore
     */
    public function getHttpClient()
    {
        if (empty($this->client)) {
            $this->client = new HttpClient;
        }

        return $this->client;
    }

    /**
     * Set http client
     *
     * @param HttpClientContract
     *
     * @return Instance
     */
    public function setHttpClient(HttpClientContract $client)
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
        self::writeLogLine(implode(',', $request));

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
    public function writeLogLine($string)
    {
        if ($this->canLog()) {
            $log_file = $this->getLogDirectory().date('Y-m-d').".log"."\n";
            $handle = fopen($log_file, "a");
            fwrite($handle, $string."\n");
            fclose($handle);
        }
    }

    /**
     * Create and return log directory path
     *
     * @return string
     */
    public function getLogDirectory()
    {
        $directory = realpath(
            dirname(
                dirname(
                    dirname(__FILE__)
                )
            )
        )."/build/";

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        return $directory;
    }

    /**
     * Application can log
     *
     * @return boolean
     */
    protected function canLog()
    {
        return function_exists('fopen') && function_exists('fwrite') && function_exists('fclose');
    }
}
