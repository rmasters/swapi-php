<?php

namespace SWAPI\Models;

class Film
{
    /** @var string */
    public $url;

    public function __construct($url = null)
    {
        $this->url = $url;
    }
}
