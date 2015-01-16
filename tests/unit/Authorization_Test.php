<?php namespace Trello\Tests\Unit;

use \Mockery;
use League\OAuth1\Client\Credentials\TemporaryCredentials;
use League\OAuth1\Client\Credentials\TokenCredentials;
use Trello\Configuration;
use Trello\Authorization\Read;
use Trello\Authorization\Write;

class Authorization_Test extends UnitTestCase
{
    protected $oauth_server_class = 'League\OAuth1\Client\Server\Trello';

    protected function mockOAuthServer()
    {
        return Mockery::mock($this->oauth_server_class);
    }

    public function test_It_Can_Create_Url_To_Authortize_For_Read_Only_For_1_Day()
    {
        $expected_url = 'https://trello.com/1/authorize?'.
            'key='.Configuration::key().'&'.
            'name='.urlencode(Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=1day';

        $url = Read::getAuthorizationUrl(1);

        $this->assertEquals($expected_url ,$url);
    }

    public function test_It_Can_Create_Url_To_Authortize_For_Read_Only_For_30_Days()
    {
        $expected_url = 'https://trello.com/1/authorize?'.
            'key='.Configuration::key().'&'.
            'name='.urlencode(Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=30days';

        $url = Read::getAuthorizationUrl(30);

        $this->assertEquals($expected_url ,$url);

    }

    public function test_It_Can_Create_Url_To_Authortize_For_Read_Only_For_Eternity()
    {
        $expected_url = 'https://trello.com/1/authorize?'.
            'key='.Configuration::key().'&'.
            'name='.urlencode(Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=never';

        $url = Read::getAuthorizationUrl('never');

        $this->assertEquals($expected_url ,$url);
    }

    public function test_It_Can_Create_Url_To_Authortize_For_Read_And_Write_For_Eternity()
    {
        $expected_url = 'https://trello.com/1/authorize?'.
            'key='.Configuration::key().'&'.
            'name='.urlencode(Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=never&'.
            'scope=read%2Cwrite';

        $url = Write::getAuthorizationUrl('never');

        $this->assertEquals($expected_url ,$url);
    }

    public function test_It_Can_Create_Url_To_Authortize_For_Read_And_Write_For_No_Duration()
    {
        $expected_url = 'https://trello.com/1/authorize?'.
            'key='.Configuration::key().'&'.
            'name='.urlencode(Configuration::applicationName()).'&'.
            'response_type=token&'.
            'scope=read%2Cwrite';

        $url = Write::getAuthorizationUrl();

        $this->assertEquals($expected_url ,$url);
    }

    public function test_It_Can_Create_An_OAuth_Server_When_Expiration_Provided()
    {
        $expiration = '1day';

        $server = Write::getOAuthServer($expiration);

        $this->assertInstanceOf($this->oauth_server_class, $server);
    }

    public function test_It_Can_Authorize_Application_With_OAuth_Server()
    {
        $expiration = '1day';
        $session_key = Write::getCredentialSessionKey();

        $temporary_credentials = new TemporaryCredentials();
        $server = $this->mockOAuthServer();
        $server->shouldReceive('getTemporaryCredentials')->once()->andReturn($temporary_credentials);
        $server->shouldReceive('authorize')->with($temporary_credentials)->once();

        $authorize = Write::authorize($server);

        $this->assertEquals(serialize($temporary_credentials), $_SESSION[$session_key]);
    }

    public function test_It_Can_Get_Token_From_OAuth_Server_When_Token_And_Verifier_Provided()
    {
        $expiration = '1day';
        $oauth_token = 'foo';
        $oauth_verifier = 'bar';
        $token_credentials = new TokenCredentials();
        $temporary_credentials = new TemporaryCredentials();
        $session_key = Write::getCredentialSessionKey();
        $_SESSION[$session_key] = serialize($temporary_credentials);

        $server = $this->mockOAuthServer();
        $server->shouldReceive('getTokenCredentials')
            ->once()
            ->andReturn($token_credentials);

        $credentials = Write::getToken($server, $oauth_token, $oauth_verifier);

        //print_r($credentials);
        $this->assertFalse(isset($_SESSION[$session_key]));
    }
}
