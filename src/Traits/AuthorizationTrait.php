<?php namespace Stevenmaguire\Services\Trello\Traits;

use League\OAuth1\Client\Credentials\CredentialsInterface;

trait AuthorizationTrait
{
    /**
     * Retrieves currently configured authorization broker.
     *
     * @return Stevenmaguire\Services\Trello\Authorization
     */
    abstract public function getAuthorization();

    /**
     * Retrieves currently configured http broker.
     *
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * Creates a properly formatted query string from given parameters.
     *
     * @param  array  $parameters
     *
     * @return string
     */
    abstract protected function makeQuery($parameters = []);

    /**
     * Retrieves http response from Trello api for authorization.
     *
     * @param  array $attributes
     *
     * @return object
     */
    public function getAuthorize($attributes = [])
    {
        return $this->getHttp()->get('authorize' . $this->makeQuery($attributes));
    }

    /**
     * Retrieves complete authorization url.
     *
     * @param  League\OAuth1\Client\Credentials\CredentialsInterface   $temporaryCredentials
     *
     * @return string
     */
    public function getAuthorizationUrl(CredentialsInterface $temporaryCredentials = null)
    {
        return $this->getAuthorization()->getAuthorizationUrl($temporaryCredentials);
    }

    /**
     * Retrives access token credentials with token and verifier.
     *
     * @param  string                                                  $token
     * @param  string                                                  $verifier
     * @param  League\OAuth1\Client\Credentials\CredentialsInterface   $temporaryCredentials
     *
     * @return League\OAuth1\Client\Credentials\CredentialsInterface
     */
    public function getAccessToken($token, $verifier, CredentialsInterface $temporaryCredentials = null)
    {
        return $this->getAuthorization()->getToken($token, $verifier, $temporaryCredentials);
    }

    /**
     * Creates and returns new temporary credentials instance.
     *
     * @return League\OAuth1\Client\Credentials\CredentialsInterface
     */
    public function getTemporaryCredentials()
    {
        return $this->getAuthorization()->getTemporaryCredentials();
    }
}
