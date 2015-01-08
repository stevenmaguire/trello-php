<?php
/**
 * Handles write authorization tasks for trello
 *
 * @package    Trello
 * @subpackage Authorization
 * @copyright  2014 Steven Maguire
 */
class Trello_Authorization_Write extends Trello_Authorization
{
    /**
     * Permission scope for authorization
     *
     * @var string
     */
    protected static $scope = 'read,write';
}
