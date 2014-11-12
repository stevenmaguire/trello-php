<?php
/**
 * Trello PHP Library
 *
 * Trello base class and initialization
 * Provides methods to child classes. This class cannot be instantiated.
 *
 *  PHP version 5
 *
 * @copyright  2014 Steven Maguire
 */


set_include_path(
    get_include_path() .
    PATH_SEPARATOR .
    realpath(
        dirname(__FILE__)
    )
);

abstract class Trello
{
    /**
     * @codeCoverageIgnore
     * don't permit an explicit call of the constructor!
     */
    protected function __construct()
    {
    }
    /**
     * @codeCoverageIgnore
     *  don't permit cloning the instances (like $x = clone $v)
     */
    protected function __clone()
    {
    }

    /**
     * returns private/nonexistent instance properties
     * @codeCoverageIgnore
     * @access public
     * @param string $name property name
     * @return mixed contents of instance properties
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->_attributes)) {
            return $this->_attributes[$name];
        }
        else {
            trigger_error('Undefined property on ' . get_class($this) . ': ' . $name, E_USER_NOTICE);
            return null;
        }
    }

    /**
     * @codeCoverageIgnore
     * used by isset() and empty()
     * @access public
     * @param string $name property name
     * @return boolean
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->_attributes);
    }

    /**
     * @codeCoverageIgnore
     *
     * @param [type] $key   [description]
     * @param [type] $value [description]
     */
    public function _set($key, $value)
    {
        $this->_attributes[$key] = $value;
    }

    /**
     * @codeCoverageIgnore
     * @param string $className
     * @param object $resultObj
     * @return object returns the passed object if successful
     * @throws Trello_Exception_ValidationsFailed
     */
    public static function returnObjectOrThrowException($className, $resultObj)
    {
        $resultObjName = Trello_Util::cleanClassName($className);
        if ($resultObj->success) {
            return $resultObj->$resultObjName;
        } else {
            throw new Trello_Exception_ValidationsFailed();
        }
    }
}

require_once('Trello/Action.php');
require_once('Trello/Authorization.php');
require_once('Trello/Board.php');
require_once('Trello/Collection.php');
require_once('Trello/Configuration.php');
require_once('Trello/Exception.php');
require_once('Trello/Http.php');
require_once('Trello/Instance.php');
require_once('Trello/Json.php');
require_once('Trello/Model.php');
require_once('Trello/Util.php');
require_once('Trello/Version.php');
require_once('Trello/Xml.php');

require_once('Trello/Error/Codes.php');
require_once('Trello/Error/ErrorCollection.php');
require_once('Trello/Error/Validation.php');
require_once('Trello/Error/ValidationErrorCollection.php');
require_once('Trello/Exception/Authentication.php');
require_once('Trello/Exception/Authorization.php');
require_once('Trello/Exception/Configuration.php');
require_once('Trello/Exception/DownForMaintenance.php');
require_once('Trello/Exception/ForgedQueryString.php');
require_once('Trello/Exception/InvalidSignature.php');
require_once('Trello/Exception/NotFound.php');
require_once('Trello/Exception/ServerError.php');
require_once('Trello/Exception/SSLCertificate.php');
require_once('Trello/Exception/SSLCaFileNotFound.php');
require_once('Trello/Exception/Unexpected.php');
require_once('Trello/Exception/UpgradeRequired.php');
require_once('Trello/Exception/ValidationsFailed.php');
require_once('Trello/Result/Error.php');
require_once('Trello/Result/Successful.php');
require_once('Trello/Xml/Generator.php');
require_once('Trello/Xml/Parser.php');

if (version_compare(PHP_VERSION, '5.4.1', '<')) {
    throw new Trello_Exception('PHP version >= 5.4.1 required'); // @codeCoverageIgnore
}


function requireDependencies() {
    $requiredExtensions = array('xmlwriter', 'SimpleXML', 'openssl', 'dom', 'hash', 'curl');
    foreach ($requiredExtensions AS $ext) {
        if (!extension_loaded($ext)) {
            throw new Trello_Exception('The Trello library requires the ' . $ext . ' extension.'); // @codeCoverageIgnore
        }
    }
}

requireDependencies();
