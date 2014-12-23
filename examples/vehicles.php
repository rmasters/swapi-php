<?php

require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;

// Get one vehicle
echo $swapi->vehicles()->get(4)->name;

// Iterate through all pages of vehicles
do {
    if (!isset($vehicles)) {
        $vehicles = $swapi->vehicles()->index();
    } else {
        // The getNext, getPrevious of Collection indicate whether more pages follow
        $vehicles = $vehicles->getNext();
    }

    foreach ($vehicles as $v) {
        echo sprintf("%s - %s\n", $v->name, $v->url);
    }
} while ($vehicles->hasNext());
