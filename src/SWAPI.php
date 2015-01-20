<?php

namespace SWAPI;

use GuzzleHttp\Client;
use Psr\Log\NullLogger;
use JsonMapper;

class SWAPI
{
    // I will forget to update this regularly
    const VERSION = '0.0.1';

    protected $characters;
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

    /**
     * @param bool $fresh
     * @return Endpoints\CharactersEndpoint
     */
    public function characters($fresh = false)
    {
        if (!isset($this->characters) || $fresh) {
            $this->characters = new Endpoints\CharactersEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->characters;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\FilmsEndpoint
     */
    public function films($fresh = false)
    {
        if (!isset($this->films) || $fresh) {
            $this->films = new Endpoints\FilmsEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->films;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\PlanetsEndpoint
     */
    public function planets($fresh = false)
    {
        if (!isset($this->planets) || $fresh) {
            $this->planets = new Endpoints\PlanetsEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->planets;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\SpeciesEndpoint
     */
    public function species($fresh = false)
    {
        if (!isset($this->species) || $fresh) {
            $this->species = new Endpoints\SpeciesEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->species;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\StarshipsEndpoint
     */
    public function starships($fresh = false)
    {
        if (!isset($this->starships) || $fresh) {
            $this->starships = new Endpoints\StarshipsEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->starships;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\VehiclesEndpoint
     */
    public function vehicles($fresh = false)
    {
        if (!isset($this->vehicles) || $fresh) {
            $this->vehicles = new Endpoints\VehiclesEndpoint($this->http, $this->logger, $this->mapper);
        }
        return $this->vehicles;
    }

    /**
     * @param string $url
     * @return object SWAPI Model
     * @throws \UnexpectedValueException When given an unrecognised URI
     */
    public function getFromUri($uri)
    {
        if (preg_match("/\/api\/(\w+)\/(\d+)(\/|$)/", $uri, $matches) !== false) {
            switch (strtolower($matches[1])) {
                case "characters":
                    return $this->characters()->get($matches[2]);
                case "films":
                    return $this->films()->get($matches[2]);
                case "planets":
                    return $this->planets()->get($matches[2]);
                case "species":
                    return $this->species()->get($matches[2]);
                case "starships":
                    return $this->starships()->get($matches[2]);
                case "vehicles":
                    return $this->vehicles()->get($matches[2]);
            }
        }

        throw new \UnexpectedValueException(sprintf("Could not match a URI to an endpoint handler for %s", $uri));
    }
}
