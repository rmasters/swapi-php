<?php

namespace SWAPI\Models;

class Vehicle
{
    /** @var int */
    public $id;
    /** @var string */
    public $name;
    /** @var string */
    public $model;
    /** @var string */
    public $manufacturer;
    /** @var int */
    public $cost_in_credits;
    /** @var float */
    public $length;
    /** @var float */
    public $max_atmosphering_speed;
    /** @var int */
    public $crew;
    /** @var int */
    public $passengers;
    /** @var int */
    public $cargo_capacity;
    /** @var string */
    public $consumables;
    /** @var string */
    public $vehicle_class;
    /** @var string[] */
    public $pilots;
    /** @var \SWAPI\Models\Film[] */
    public $films = [];
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $edited;
    /** @var string */
    public $url;
}
