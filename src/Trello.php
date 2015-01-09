<?php
/**
 * Trello PHP Library
 *
 * Trello base class and initialization
 * Provides methods to child classes. This class cannot be instantiated.
 *
 * @package    Trello
 * @copyright  Steven Maguire
 */

$original_include_path = get_include_path();

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
     * Get attribute
     *
     * @param  string  Attribute name
     *
     * @return mixed  Attribute value
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
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
    public static function logRequest($verb, $path, $body = null)
    {
        return Trello_Instance::getInstance()->logRequest($verb, $path, $body);
    }

    /**
     * [getRequests description]
     *
     * @return [type] [description]
     */
    public static function getRequests()
    {
        return Trello_Instance::getInstance()->getRequests();
    }
}

require_once('Trello/Collection.php');
require_once('Trello/Configuration.php');
require_once('Trello/Exception.php');
require_once('Trello/Http.php');
require_once('Trello/Json.php');
require_once('Trello/Model.php');
require_once('Trello/Util.php');
require_once('Trello/Version.php');

require_once('Trello/Action.php');
require_once('Trello/Authorization.php');
require_once('Trello/Board.php');
require_once('Trello/Card.php');
require_once('Trello/Checklist.php');
require_once('Trello/List.php');
require_once('Trello/Organization.php');

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

if (version_compare(PHP_VERSION, '5.4.1', '<')) {
    throw new Trello_Exception('PHP version >= 5.4.1 required'); // @codeCoverageIgnore
}

// @codeCoverageIgnoreStart
function requireDependencies() {
    $required_extensions = array('xmlwriter', 'SimpleXML', 'openssl', 'dom', 'hash', 'curl');
    foreach ($required_extensions AS $ext) {
        if (!extension_loaded($ext)) {
            throw new Trello_Exception('The Trello library requires the ' . $ext . ' extension.');
        }
    }
}
// @codeCoverageIgnoreEnd

requireDependencies();

set_include_path($original_include_path);
