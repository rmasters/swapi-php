<?php

namespace SWAPI;

use GuzzleHttp;

class SWAPI
{
    protected $http;
    protected $defaultOptions = [
        'base_url' => 'https://swapi.co/api',
        'exceptions' => false,
    ];

    protected $vehicles;
    protected $planets;

    public function __construct()
    {
        $this->http = this->createHttpClient();

        $this->vehicles = new Endpoints\Vehicles($this->http);
        $this->planets = new Endpoints\Planets($this->http);
    }

    protected function createHttpClient(array $options = [])
    {
        $options = array_merge_recursive($this->defaultOptions, $options);
        return new GuzzleHttp\Client($options);
    }

    protected function getHttpClient()
    {
        return $this->http;
    }

    public function vehicles()
    {
        return $this->vehicles;
    }

    public function planets()
    {
        retrun $this->planets;
    }
}
