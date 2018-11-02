<?php

namespace Stevenmaguire\Services\Trello\Tests;

use League\OAuth1\Client\Credentials\TemporaryCredentials;
use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Trello as OAuth;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Stevenmaguire\Services\Trello\Authorization;
use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Configuration;

class AuthorizationTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        session_unset();

        $settings = [
            'key' => uniqid(),
            'secret' => uniqid(),
        ];

        Configuration::setMany($settings);

        $this->client = m::mock(Client::class)->makePartial();
    }

    protected function getClientMock($options = [])
    {
        return m::mock(OAuth::class);
    }

    public function testGetAuthorizationUrlWithNoCredentials()
    {
        $authorizationUrl = uniqid();
        $tempCredentials = new TemporaryCredentials;
        $oAuthMock = $this->getClientMock();
        $oAuthMock->shouldReceive('getTemporaryCredentials')->andReturn($tempCredentials);
        $oAuthMock->shouldReceive('getAuthorizationUrl')->with($tempCredentials)->andReturn($authorizationUrl);
        $auth = new Authorization;
        $auth->setClient($oAuthMock);

        $url = $this->client->setAuthorization($auth)->getAuthorizationUrl();

        $this->assertEquals($authorizationUrl, $url);
    }

    public function testGetAuthorizationUrlWithCredentials()
    {
        $authorizationUrl = uniqid();
        $tempCredentials = new TemporaryCredentials;
        $oAuthMock = $this->getClientMock();
        $oAuthMock->shouldReceive('getAuthorizationUrl')->with($tempCredentials)->andReturn($authorizationUrl);
        $auth = new Authorization;
        $auth->setClient($oAuthMock);

        $url = $this->client->setAuthorization($auth)->getAuthorizationUrl($tempCredentials);

        $this->assertEquals($authorizationUrl, $url);
    }

    public function testGetTokenWithNoCredentials()
    {
        $sessionKey = Authorization::class.':temporary_credentials';
        $tempCredentials = new TemporaryCredentials;
        $_SESSION[$sessionKey] = serialize($tempCredentials);
        session_write_close();
        $oauthToken = uniqid();
        $oauthVerifier = uniqid();
        $tokenCredentials = new TokenCredentials;
        $oAuthMock = $this->getClientMock();
        $oAuthMock->shouldReceive('getTokenCredentials')->with(m::on(function ($creds) {
            return is_a($creds, TemporaryCredentials::class);
        }), $oauthToken, $oauthVerifier)->andReturn($tokenCredentials);
        $auth = new Authorization;
        $auth->setClient($oAuthMock);

        $token = $this->client->setAuthorization($auth)->getAccessToken($oauthToken, $oauthVerifier);

        $this->assertInstanceOf(TokenCredentials::class, $token);
    }

    public function testGetTokenWithCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $oauthToken = uniqid();
        $oauthVerifier = uniqid();
        $tokenCredentials = new TokenCredentials;
        $oAuthMock = $this->getClientMock();
        $oAuthMock->shouldReceive('getTokenCredentials')->with(m::on(function ($creds) use ($tempCredentials) {
            return $tempCredentials === $creds;
        }), $oauthToken, $oauthVerifier)->andReturn($tokenCredentials);
        $auth = new Authorization;
        $auth->setClient($oAuthMock);

        $token = $this->client->setAuthorization($auth)->getAccessToken($oauthToken, $oauthVerifier, $tempCredentials);

        $this->assertInstanceOf(TokenCredentials::class, $token);
    }

    public function testGetTemporaryCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $oAuthMock = $this->getClientMock();
        $oAuthMock->shouldReceive('getTemporaryCredentials')->andReturn($tempCredentials);
        $auth = new Authorization;
        $auth->setClient($oAuthMock);

        $credentials = $this->client->setAuthorization($auth)->getTemporaryCredentials();
        $this->assertEquals($tempCredentials, $credentials);
    }
}
