<?php
/**
 * Handles authorization tasks for trello
 *
 * @package    Trello
 * @subpackage Authorization
 * @copyright  2014 Steven Maguire
 */
abstract class Trello_Authorization extends Trello
{
    /**
     * Permission scope for authorization
     *
     * @var string
     */
    protected static $scope = null;

    /**
     * [$base_path description]
     *
     * @var string
     */
    protected static $base_path = '/authorize';

    /**
     * Get authorization link
     *
     * @return string
     */
    public static function getLink($expiration = null)
    {
        $config = [
            'key' => Trello_Configuration::key(),
            'name' => Trello_Configuration::applicationName(),
            'response_type' => 'token',
            'expiration' => self::parseExpiration($expiration),
            'scope' => static::$scope
        ];
        return self::getBasePath().'?'.Trello_Util::buildQueryStringFromArray($config);
    }

    /**
     * Parse expiration value for fixed Trello values
     *
     * @param  string $expiration
     *
     * @return string|null
     */
    protected static function parseExpiration($expiration = null)
    {
        if (is_numeric($expiration) && $expiration > 0) {
            $expiration = round($expiration, 0, PHP_ROUND_HALF_UP);
            if ($expiration == 1) {
                return $expiration.'day';
            } else {
                return $expiration.'days';
            }
        }

        if ($expiration == 'never') {
            return $expiration;
        }

        return null;
    }

    /**
     * Get authorization base url
     *
     * @return string Base url
     */
    protected static function getBasePath()
    {
        return 'https://trello.com'.Trello_Configuration::versionPath().self::$base_path;
    }
}
