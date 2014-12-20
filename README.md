# PHP library for [SWAPI](http://swapi.co/)

## Usage

Install with Composer: `composer require "rmasters/swapi:~1.0"`.

```php
$swapi = new SWAPI;

$swapi->vehicles()->get(1); // => Vehicle <X-wing>
$swapi->planets()->get(7);  // => Planet <Mustafar>
```

## Conventions

1.  When a resource is not found, `null` will be returned.

## License

[MIT Licensed](LICENSE)
