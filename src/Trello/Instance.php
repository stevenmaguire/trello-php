<?php

class Trello_Instance
{
    /**
     * [$errors description]
     *
     * @var [type]
     */
    private $errors;

    /**
     * [$requests description]
     *
     * @var [type]
     */
    private $requests;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
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
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
        $this->errors = new Trello_Collection;
        $this->requests = new Trello_Collection;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * [logRequest description]
     *
     * @param  [type]  [description]
     * @param  [type]  [description]
     * @param  [type]  [description]
     *
     * @return [type]  [description]
     */
    public function logRequest($verb, $path, $body = null)
    {
        $this->requests->add(func_get_args());
        $this->writeLogLine(implode(',', func_get_args()));
        return $this;
    }

    /**
     * [getRequests description]
     *
     * @return [type] [description]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * [writeLogLine description]
     *
     * @param  [type]  [description]
     *
     * @return [type]  [description]
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
