<?php

namespace SWAPI\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\Request;
use Psr\Log\LoggerInterface;

class Endpoint
{
    /** @var \GuzzleHttp\Client */
    protected $http;

    /** @var \Psr\Log\LoggerInterface */
    protected $logger;

    protected $mappers;

    public function __construct(Client $http, LoggerInterface $logger)
    {
        $this->http = $http;
        $this->logger = $logger;
    }

    public function setClient(Client $http)
    {
        $this->http = $http;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    protected function handleResponse(Response $response, Request $request)
    {
        switch ($response->getStatusCode()) {
            case 404:
                return null;
        }
    }
}
