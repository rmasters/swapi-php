<?php

namespace SWAPI\Endpoints;

use GuzzleHttp;

class Endpoint
{
    /** @var \GuzzleHttp\Client */
    protected $http;

    public function __construct(GuzzleHttp\Client $http)
    {
        $this->http = $http;
    }
}
