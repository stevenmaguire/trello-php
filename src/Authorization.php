<?php namespace Stevenmaguire\Services\Trello;

use League\OAuth1\Client\Credentials\CredentialsInterface;
use League\OAuth1\Client\Server\Trello as OAuthServer;

class Authorization
{
    /**
     * OAuth client
     *
     * @var League\OAuth1\Client\Server\Trello
     */
    protected $client;

    /**
     * Creates new authorization broker.
     */
    public function __construct()
    {
        $options = [
            'identifier' => Configuration::get('key'),
            'secret' => Configuration::get('token'),
            'callback_uri' => Configuration::get('callbackUrl'),
            'name' => Configuration::get('name'),
            'expiration' => Configuration::get('expiration'),
            'scope' => Configuration::get('scope'),
        ];

        $this->client = new OAuthServer($options);
    }

    /**
     * Authorize application
     *
     * First part of OAuth 1.0 authentication is retrieving temporary
     * credentials. These identify you as a client to the server. Store the
     * credentials in the session. Return authorization url.
     *
     * @return string Authorization url
     */
    public function getAuthorizationUrl()
    {
        $sessionKey = self::getCredentialSessionKey();
        $temporaryCredentials = $this->client->getTemporaryCredentials();
        $_SESSION[$sessionKey] = serialize($temporaryCredentials);
        session_write_close();

        return $this->client->getAuthorizationUrl($temporaryCredentials);
    }

    /**
     * Get the key for temporary credentials stored in session
     *
     * @return string
     */
    private static function getCredentialSessionKey()
    {
        return get_class().':temporary_credentials';
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
     * @param  string $oauthToken
     * @param  string $oauthVerifier
     *
     * @return CredentialsInterface
     */
    public function getToken($oauthToken, $oauthVerifier)
    {
        $sessionKey = self::getCredentialSessionKey();
        $temporaryCredentials = unserialize($_SESSION[$sessionKey]);
        $tokenCredentials = $this->client->getTokenCredentials(
            $temporaryCredentials,
            $oauthToken,
            $oauthVerifier
        );
        unset($_SESSION[$sessionKey]);
        session_write_close();

        return $tokenCredentials;
    }

    /**
     * Updates the OAuth client.
     *
     * @param League\OAuth1\Client\Server\Trello  $client
     *
     * @return Authorization
     */
    public function setClient(OAuthServer $client)
    {
        $this->client = $client;

        return $this;
    }
}
