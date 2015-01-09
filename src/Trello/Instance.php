<?php

class Trello_Instance
{
    /**
     * Errors
     *
     * @var Trello_Collection
     */
    private $errors;

    /**
     * Requests
     *
     * @var Trello_Collection
     */
    private $requests;

    /**
     * Returns the Trello_Instance instance of this class.
     *
     * @staticvar Trello_Instance $instance The Trello_Instance instances of this class.
     *
     * @return Trello_Instance|null The Trello_Instance instance.
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
     * Trello_Instance via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
        $this->errors = new Trello_Collection;
        $this->requests = new Trello_Collection;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Trello_Instance instance.
     *
     * @codeCoverageIgnore
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the Trello_Instance
     * instance.
     *
     * @codeCoverageIgnore
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * Log request
     *
     * @param  string $verb
     * @param  string $path
     * @param  string $body
     *
     * @return Trello_Instance
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
     * @return Trello_Collection
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
