<?php

namespace SWAPI;

use GuzzleHttp\Client;
use Psr\Log\NullLogger;
use JsonMapper;

class SWAPI
{
    protected $vehicles;
    protected $planets;

    private $http;
    private $logger;
    private $mapper;

    public function __construct()
    {
        $http = $this->createHttpClient();
        $logger = $this->createLogger();
        $mapper = $this->createMapper();
    }

    protected function createHttpClient()
    {
        return new Client([
            'base_url' => 'https://swapi.co/api',
            'exceptions' => false,
        ]);
    }

    protected function createLogger()
    {
        return new NullLogger;
    }

    protected function createMapper()
    {
        return new JsonMapper;
    }

    public function vehicles($fresh = false)
    {
        if (!isset($this->vehicles) || $fresh) {
            $this->vehicles = new Endpoints\Vehicles($this->http, $this->logger, $this->mapper);
        }
        return $this->vehicles;
    }

    public function planets($fresh = false)
    {
        if (!isset($this->planets) || $fresh) {
            $this->planets = new Endpoints\Planets($this->http, $this->logger, $this->mapper);
        }
        return $this->planets;
    }
}
