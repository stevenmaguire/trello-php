# Trello PHP

[![Latest Version](https://img.shields.io/github/release/stevenmaguire/trello-php.svg?style=flat-square)](https://github.com/stevenmaguire/trello-php/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/stevenmaguire/trello-php/master.svg?style=flat-square&1)](https://travis-ci.org/stevenmaguire/trello-php)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/stevenmaguire/trello-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevenmaguire/trello-php/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/stevenmaguire/trello-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevenmaguire/trello-php)
[![Total Downloads](https://img.shields.io/packagist/dt/stevenmaguire/trello-php.svg?style=flat-square)](https://packagist.org/packages/stevenmaguire/trello-php)

A PHP client for consuming the Trello API.

## Install

Via Composer

``` bash
$ composer require stevenmaguire/trello-php
```

## Usage

This guide will help you navigate [configuring the client](#configure-the-client), [authenticating your users and retrieving an access token](#authenticate-your-users-and-store-access-token), and [accessing the api on their behalf](#access-the-api-with-access-token).

Full client documentation is available in the [API Guide](API-GUIDE.md).

*Make sure you have secured your Trello API keys before going further. There is [a handy guide](https://trello.com/docs/gettingstarted/index.html) for that.*

This project includes a [basic example](https://github.com/stevenmaguire/trello-php/tree/master/example/index.php). You can run this example to test your application details. Open the example file and include your `key` and `secret`, run `php -S localhost:8000 -t example`, visit `http://localhost:8000` in your favorite browser.

### Configure the client

The Trello client needs a few configuration settings to operate successfully.

Setting | Description
--- | ---
`key` | Required, the application key associated with your application.
`token` | Required when using the package to make authenticated API requests on behalf of a user.
`domain` | Optional, default is `https://trello.com`.
`version` | Optional, default is `1`.
`secret` | Required when using package to help get access tokens, the application secret associated with your application.
`name` | Optional. This will appear on the user facing approval screen when using package to help get access tokens.
`callbackUrl` | Required when using package to help get access tokens.
`expiration` | Required when using package to help get access tokens.
`scope` | Required when using package to help get access tokens.
`proxy` | Optional setting to declare a host to use for proxy; [Read more on the Guzzle Docs](http://docs.guzzlephp.org/en/latest/request-options.html#proxy).

#### Set configuration when creating client

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'callbackUrl' => 'http://your.domain/oauth-callback-url',
    'domain' => 'https://trello.com',
    'expiration' => '3days',
    'key' => 'my-application-key',
    'name' => 'My sweet trello enabled app',
    'scope' => 'read,write',
    'secret' => 'my-application-secret',
    'token'  => 'abcdefghijklmnopqrstuvwxyz',
    'version' => '1',
    'proxy' => 'tcp://localhost:8125',
));
```

#### Set multiple configuration after creating client

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'key' => 'my-application-key',
    'name' => 'My sweet trello enabled app',
));

$config = array(
    'callbackUrl' => 'http://your.domain/oauth-callback-url',
    'expiration' => '3days',
    'scope' => 'read,write',
);

$client->addConfig($config);
```

#### Set single configuration after creating client

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'key' => 'my-application-key',
    'name' => 'My sweet trello enabled app',
));

$client->addConfig('token', 'abcdefghijklmnopqrstuvwxyz');
```

### Authenticate your users and store access token

The Trello client is capable of assisting you in walking your users through the OAuth authorization process and providing your application with access token credentials.

This package utilizes [The League's OAuth1 Trello Client](https://github.com/thephpleague/oauth1-client) to provide this assistance.

#### Create a basic client

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'key' => 'my-application-key',
    'secret' => 'my-application-secret',
));
```

#### Add your application's required OAuth settings

```php
$config = array(
    'name' => 'My sweet trello enabled app',
    'callbackUrl' => 'http://your.domain/oauth-callback-url',
    'expiration' => '3days',
    'scope' => 'read,write',
);

$client->addConfig($config);
```

#### Get authorization url, then redirect your user

```php
$authorizationUrl = $client->getAuthorizationUrl();

header('Location: ' . $authorizationUrl);
```

#### Exchange authorization token and verifier for access token

After the user approves or denies access to your application, they will be redirected to the callback url you provided. If the user approves access, the url will include `oauth_token` and `oauth_verifier` in query string parameters.

```php
$token = $_GET['oauth_token'];
$verifier = $_GET['oauth_verifier'];

$credentials = $client->getAccessToken($token, $verifier);
$accessToken = $credentials->getIdentifier();
```

If successful, `$credentials` with be an instance of [TokenCredentials](https://github.com/thephpleague/oauth1-client/blob/master/src/Client/Credentials/TokenCredentials.php). You can store the identifier within and use to authenticate requests on behalf of that user.

#### Use access token to make requests

```php
$client->addConfig('token', $accessToken);

$user = $client->getCurrentUser();
```

### Access the API with access token

Get inventory of all entities that belong to your user

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'key' => 'my-application-key',
    'token' => 'your-users-access-token',
));

$boards = $client->getCurrentUserBoards();
$cards = $client->getCurrentUserCards();
$organizations = $client->getCurrentUserOrganizations();
```

Most of the methods available in the [API Guide](API-GUIDE.md) require entity ids to conduct business.


### Handling exceptions

When handling exceptions that result during requests to Trello using the client, a `Stevenmaguire\Services\Trello\Exceptions\Exception` will be thrown. This exception will include information from the underlying Http request/response issues, including the response body from Trello.

```php
try {
    $board = $client->getBoard($boardId);
} catch (Stevenmaguire\Services\Trello\Exceptions\Exception $e) {
    $code = $e->getCode(); // Http status code from response
    $reason = $e->getMessage(); // Http status reason phrase
    $error = $e->getPrevious(); // GuzzleHttp\Exception\RequestException from http client
    $body = $e->getResponseBody(); // stdClass response body from http client
}

```

## Testing

``` bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details. You can see the current [PROGRESS](PROGRESS.md).

## Credits

- [Steven Maguire](https://github.com/stevenmaguire)
- [All Contributors](https://github.com/stevenmaguire/trello-php/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
