<?php
/**
 * Handles authorization tasks for trello
 *
 * @package    Trello
 * @subpackage Authorization
 * @copyright  2014 Steven Maguire
 */
class Trello_Authorization extends Trello
{
    /*
    public static function readOnly($forever = false)
    {
        $signature = Trello_Util::makeQueryStringFromArray([
            'name' => 'Trello Library',
            'expiration' => ($forever ? 'never' : '30days'),
            'response_type' => 'token'
        ]);
        return Trello_Http::get('/authorize?'.$signature);
    }

    public static function readWrite()
    {
        $signature = Trello_Util::makeQueryStringFromArray([
            'name' => 'Trello Library',
            'expiration' => ($forever ? 'never' : '1day'),
            'response_type' => 'token',
            'scope' => 'read.write'
        ]);
        return Trello_Http::get('/authorize?'.$signature);
    }
    */
}
