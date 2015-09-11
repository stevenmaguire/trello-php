<?php namespace Stevenmaguire\Services\Trello;

use League\OAuth1\Client\Credentials\CredentialsInterface;
use League\OAuth1\Client\Credentials\TemporaryCredentials;
use League\OAuth1\Client\Server\Trello as OAuthServer;

class Authorization
{
    /**
     * OAuth client
     *
     * @var \League\OAuth1\Client\Server\Trello
     */
    protected $client;

    /**
     * Creates new authorization broker.
     */
    public function __construct()
    {
        $this->createClient();
    }

    /**
     * Creates a new OAuth server client and attaches to authorization broker.
     *
     * @return Authorization
     */
    protected function createClient()
    {
        $this->client = new OAuthServer([
            'identifier' => Configuration::get('key'),
            'secret' => Configuration::get('secret'),
            'callback_uri' => Configuration::get('callbackUrl'),
            'name' => Configuration::get('name'),
            'expiration' => Configuration::get('expiration'),
            'scope' => Configuration::get('scope'),
        ]);

        return $this;
    }

    /**
     * Authorize application
     *
     * First part of OAuth 1.0 authentication is retrieving temporary
     * credentials. These identify you as a client to the server. Store the
     * credentials in the session. Return authorization url.
     *
     * @param  TemporaryCredentials $temporaryCredentials
     *
     * @return string Authorization url
     */
    public function getAuthorizationUrl(TemporaryCredentials $temporaryCredentials = null)
    {
        if (is_null($temporaryCredentials)) {
            $sessionKey = self::getCredentialSessionKey();
            $temporaryCredentials = $this->getTemporaryCredentials();
            $_SESSION[$sessionKey] = serialize($temporaryCredentials);
            session_write_close();
        }

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
     * Creates and returns new temporary credentials instance.
     *
     * @return TemporaryCredentials
     */
    public function getTemporaryCredentials()
    {
        return $this->client->getTemporaryCredentials();
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
     * @param  string               $oauthToken
     * @param  string               $oauthVerifier
     * @param  TemporaryCredentials $temporaryCredentials
     *
     * @return \League\OAuth1\Client\Credentials\CredentialsInterface
     */
    public function getToken($oauthToken, $oauthVerifier, TemporaryCredentials $temporaryCredentials = null)
    {
        if (is_null($temporaryCredentials)) {
            $sessionKey = self::getCredentialSessionKey();
            $temporaryCredentials = unserialize($_SESSION[$sessionKey]);
            unset($_SESSION[$sessionKey]);
            session_write_close();
        }

        return $this->client->getTokenCredentials(
            $temporaryCredentials,
            $oauthToken,
            $oauthVerifier
        );
    }

    /**
     * Updates the OAuth client.
     *
     * @param \League\OAuth1\Client\Server\Trello  $client
     *
     * @return Authorization
     */
    public function setClient(OAuthServer $client)
    {
        $this->client = $client;

        return $this;
    }
}
