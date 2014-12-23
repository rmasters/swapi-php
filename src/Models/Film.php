<?php

namespace SWAPI\Models;

class Film
{
    /** @var string */
    public $title;
    /** @var int */
    public $episode_id;
    /** @var string */
    public $opening_crawl;
    /** @var string */
    public $director;
    /** @var string */
    public $producer;
    /** @var \SWAPI\Models\Character[] */
    public $characters;
    /** @var \SWAPI\Models\Planet[] */
    public $planets;
    /** @var \SWAPI\Models\Species[] */
    public $species;
    /** @var \SWAPI\Models\Starship[] */
    public $starships;
    /** @var \SWAPI\Models\Vehicle[] */
    public $vehicles;
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
