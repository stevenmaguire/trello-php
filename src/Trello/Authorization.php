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
     * Authorize application
     *
     * First part of OAuth 1.0 authentication is retrieving temporary
     * credentials. These identify you as a client to the server. Store the
     * credentials in the session. Second part of OAuth 1.0 authentication is
     * to redirect the resource owner to the login screen on the server.
     *
     * Redirects to authorization url to fetch authorization
     */
    public static function authorize($expiration = null)
    {
        $server = self::getOAuthServer($expiration);
        $temporaryCredentials = $server->getTemporaryCredentials();
        $_SESSION['temporary_credentials'] = serialize($temporaryCredentials);
        session_write_close();
        $server->authorize($temporaryCredentials);
    }

    /**
     * Verify and fetch token
     *
     * Retrieve the temporary credentials from step 2. Third and final part to
     * OAuth 1.0 authentication is to retrieve token credentials (formally
     * known as access tokens in earlier OAuth 1.0 specs). Now, we'll store
     * the token credentials and discard the temporary ones - they're
     * irrelevant at this stage.
     *
     * @return string
     */
    public static function getToken($oauth_token, $oauth_verifier)
    {
        $server = self::getOAuthServer($expiration);
        $temporaryCredentials = unserialize($_SESSION['temporary_credentials']);
        $tokenCredentials = $server->getTokenCredentials(
            $temporaryCredentials,
            $oauth_token, $oauth_verifier
        );
        unset($_SESSION['temporary_credentials']);
        session_write_close();
        return serialize($tokenCredentials);
    }

    /**
     * Parse expiration value for fixed Trello values
     *
     * @param  string $expiration
     *
     * @return string|null
     */
    protected static function parseExpiration($expiration)
    {
        if (is_numeric($expiration)) {
            $expiration = round(abs($expiration), 0, PHP_ROUND_HALF_UP);
            return $expiration.'day'.($expiration == 1 ? '' : 's');
        }

        return $expiration;
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

    /**
     * Get OAuth server implementation
     *
     * @param  string $expiration
     *
     * @return Stevenmaguire\OAuth2\Client\Server\Trello
     */
    protected static function getOAuthServer($expiration = null)
    {
        session_start();
        return new \Stevenmaguire\OAuth2\Client\Server\Trello(array(
            'identifier' => Trello_Configuration::key(),
            'secret' => Trello_Configuration::secret(),
            'callback_uri' => 'http://your-callback-uri/',
            'name' => Trello_Configuration::applicationName(),
            'expiration' => self::parseExpiration($expiration),
            'scope' => static::$scope
        ));
    }
}
