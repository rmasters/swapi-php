# PHP library for [SWAPI](http://swapi.co/)

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
