<?php

namespace SWAPI;

use GuzzleHttp\Client;
use Psr\Log\NullLogger;
use JsonMapper;

class SWAPI
{
    // I will forget to update this regularly
    const VERSION = '0.0.1';

    protected $vehicles;
    protected $planets;

    private $http;
    private $logger;
    private $mapper;

    public function __construct()
    {
        $this->http = $this->createHttpClient();
        $this->logger = $this->createLogger();
        $this->mapper = $this->createMapper();
    }

    protected function createHttpClient()
    {
        return new Client([
            'base_url' => 'http://swapi.co/api/',
            'default' => [
                'exceptions' => false,
                'headers' => [
                    'User-Agent' => sprintf('php-swapi/%s', static::VERSION),
                    'Accept' => 'application/json',
                ],
            ],
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

    public function setMapper(JsonMapper $mapper)
    {
        $this->mapper = $mapper;
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
