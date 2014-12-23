<?php

namespace SWAPI\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\Request;
use Psr\Log\LoggerInterface;
use JsonMapper;
use SWAPI\Models\Collection;

class Endpoint
{
    /** @var \GuzzleHttp\Client */
    protected $http;

    /** @var \Psr\Log\LoggerInterface */
    protected $logger;

    /** @var \JsonMapper */
    protected $mapper;

    public function __construct(Client $http, LoggerInterface $logger, JsonMapper $mapper)
    {
        $this->http = $http;
        $this->logger = $logger;
        $this->mapper = $mapper;
    }

    public function setClient(Client $http)
    {
        $this->http = $http;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function setMapper(JsonMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    protected function handleResponse(Response $response, Request $request, $default = null)
    {
        switch ($response->getStatusCode()) {
            case 404:
                return $default;
        }
    }

    protected function hydrateOne(array $data, $modelInstance)
    {
        return $this->mapper->map($data, $modelInstance);
    }

    protected function hydrateMany(array $data, $modelName)
    {
        $collection = new Collection($this->mapper->mapArray($data['results'], [], $modelName));
        $collection->setEndpoint($this);
        $collection->setNext($data['next']);
        $collection->setPrevious($data['previous']);

        return $collection;
    }
}
