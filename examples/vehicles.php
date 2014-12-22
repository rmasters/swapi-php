<?php

require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;
foreach ($swapi->vehicles()->index(0) as $v) {
    echo "{$v->name}\n";
}
