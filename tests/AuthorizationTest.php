<?php namespace Stevenmaguire\Services\Trello\Tests;

use League\OAuth1\Client\Credentials\TemporaryCredentials;
use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Trello as OAuth;
use Mockery as m;
use Stevenmaguire\Services\Trello\Authorization;
use Stevenmaguire\Services\Trello\Client;
use Stevenmaguire\Services\Trello\Configuration;

class AuthorizationTest extends \PHPUnit_Framework_TestCase
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

        $this->auth = new Authorization;
        $this->client = m::mock(Client::class)->makePartial();
    }

    protected function getClientMock($options = [])
    {
        return m::mock(OAuth::class);
    }

    public function testGetAuthorizationUrlWithNoCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $mock = $this->getClientMock();
        $mock->shouldReceive('getTemporaryCredentials')->andReturn($tempCredentials);
        $mock->shouldReceive('getAuthorizationUrl')->with($tempCredentials);
        $this->auth->setClient($mock);
        $this->client->shouldReceive('getAuthorization')->andReturn($this->auth);

        $url = $this->client->getAuthorizationUrl();
    }

    public function testGetAuthorizationUrlWithCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $mock = $this->getClientMock();
        $mock->shouldReceive('getAuthorizationUrl')->with($tempCredentials);
        $this->auth->setClient($mock);
        $this->client->shouldReceive('getAuthorization')->andReturn($this->auth);

        $url = $this->client->getAuthorizationUrl($tempCredentials);
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
        $mock = $this->getClientMock();
        $mock->shouldReceive('getTokenCredentials')->with(m::on(function ($creds) {
            return is_a($creds, TemporaryCredentials::class);
        }), $oauthToken, $oauthVerifier)->andReturn($tokenCredentials);
        $this->auth->setClient($mock);
        $this->client->shouldReceive('getAuthorization')->andReturn($this->auth);

        $token = $this->client->getAccessToken($oauthToken, $oauthVerifier);

        $this->assertInstanceOf(TokenCredentials::class, $token);
    }

    public function testGetTokenWithCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $oauthToken = uniqid();
        $oauthVerifier = uniqid();
        $tokenCredentials = new TokenCredentials;
        $mock = $this->getClientMock();
        $mock->shouldReceive('getTokenCredentials')->with(m::on(function ($creds) use ($tempCredentials) {
            return $tempCredentials === $creds;
        }), $oauthToken, $oauthVerifier)->andReturn($tokenCredentials);
        $this->auth->setClient($mock);
        $this->client->shouldReceive('getAuthorization')->andReturn($this->auth);

        $token = $this->client->getAccessToken($oauthToken, $oauthVerifier, $tempCredentials);

        $this->assertInstanceOf(TokenCredentials::class, $token);
    }

    public function testGetTemporaryCredentials()
    {
        $tempCredentials = new TemporaryCredentials;
        $mock = $this->getClientMock();
        $mock->shouldReceive('getTemporaryCredentials')->andReturn($tempCredentials);
        $this->auth->setClient($mock);
        $this->client->shouldReceive('getAuthorization')->andReturn($this->auth);

        $credentials = $this->client->getTemporaryCredentials();
        $this->assertEquals($tempCredentials, $credentials);
    }
}
