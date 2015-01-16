<?php namespace Trello\Authorization;

use Trello\Authorization;

/**
 * Handles write authorization tasks for trello
 *
 * @package    Trello
 * @subpackage Authorization
 * @copyright  2014 Steven Maguire
 */
class Write extends Authorization
{
    /**
     * Permission scope for authorization
     *
     * @var string
     */
    protected static $scope = 'read,write';
}
