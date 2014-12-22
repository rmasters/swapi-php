# PHP library for [SWAPI](http://swapi.co/)

[![Build status](https://img.shields.io/travis/rmasters/swapi-php.svg?style=flat-square)](https://travis-ci.org/rmasters/swapi-php/)
[![Stable release](https://img.shields.io/packagist/v/rmasters/swapi.svg?style=flat-square)](http://packagist.org/packages/rmasters/swapi)
[![License](https://img.shields.io/packagist/l/rmasters/swapi.svg?style=flat-square)](LICENSE)

## Usage

Install with Composer: `composer require "rmasters/swapi:~1.0"`.

```php
$swapi = new SWAPI;

$swapi->vehicles()->get(1); // => Vehicle <X-wing>
$swapi->planets()->get(7);  // => Planet <Mustafar>

$swapi->people()->get(9999); // => null (not-found)
```

## Work in progress

-   [ ] Films
-   [ ] People
-   [ ] Planets
-   [ ] Species
-   [ ] Starships
-   [ ] Vehicles

## Running tests and contributing

Install dependencies with `composer install --dev` and run `vendor/bin/phpunit`
to run the testsuite. The test suite comprises of:

-   [tests/Endpoints](tests/Endpoints) - tests that use mocked sample responses,
-   [tests/Functional](tests/Functional) - tests that use the live API, to spot changes.

## License

[MIT Licensed](LICENSE)
