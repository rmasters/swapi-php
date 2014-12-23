<?php

namespace SWAPI\Models;

class Character
{
    /** @var string */
    public $name;
    /** @var string */
    public $birth_year;
    /** @var string */
    public $eye_color;
    /** @var string */
    public $gender;
    /** @var string */
    public $hair_color;
    /** @var int cm */
    public $height;
    /** @var int kg */
    public $mass;
    /** @var string */
    public $skin_color;
    /** @var \SWAPI\Models\Planet */
    public $homeworld;
    /** @var \SWAPI\Models\Film[] */
    public $films = [];
    /** @var \SWAPI\Models\Species[] */
    public $species = [];
    /** @var \SWAPI\Models\Starship[] */
    public $starships = [];
    /** @var \SWAPI\Models\Vehicle[] */
    public $vehicles = [];
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
