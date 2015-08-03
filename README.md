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

### Create client

```php
$client = new Stevenmaguire\Services\Trello\Client(array(
    'domain' => 'https://trello.com', // optional, default 'https://trello.com'
    'key' => 'YOUR_APP_ACCESS_KEY',
    'token'  => 'YOUR_USER_ACCESS_TOKEN',
    'version'      => '1', // optional, default '1'
));
```
*Make sure you have secured your Trello API keys before going further. There is [a handy guide](https://trello.com/docs/gettingstarted/index.html) for that.*

### Access the API

Full client documentation is available in the [API Guide](API-GUIDE.md).

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
