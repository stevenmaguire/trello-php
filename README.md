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

### Configuration

``` php
Trello_Configuration::environment('sandbox');
Trello_Configuration::key('YOUR_ACCESS_KEY');
Trello_Configuration::secret('YOUR_ACCESS_SECRET');
Trello_Configuration::token('YOUR_ACCESS_TOKEN');
Trello_Configuration::applicationName('YOUR_APPLICATION_NAME'); // Optional
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details. You can see the current [PROGRESS](PROGRESS.md).

## Credits

- [Steven Maguire](https://github.com/stevenmaguire)
- [All Contributors](https://github.com/stevenmaguire/trello-php/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
