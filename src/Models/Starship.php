<?php

namespace SWAPI\Models;

class Starship
{
    /** @var string */
    public $name;
    /** @var string */
    public $model;
    /** @var string */
    public $starship_class;
    /** @var string */
    public $manufacturer;
    /** @var string */
    public $cost_in_credits;
    /** @var int m */
    public $length;
    /** @var int */
    public $crew;
    /** @var string */
    public $passengers;
    /** @var string */
    public $max_atmosphering_speed;
    /** @var float */
    public $hyperdrive_rating;
    /** @var string */
    public $MGLT;
    /** @var string */
    public $cargo_capacity;
    /** @var string */
    public $consumables;
    /** @var \SWAPI\Models\Film[] */
    public $films;
    /** @var \SWAPI\Models\Character[] */
    public $pilots;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $edited;
    /** @var string */
    public $url;

    public function __construct($url = null)
    {
        $this->url = $url;
    }
}
