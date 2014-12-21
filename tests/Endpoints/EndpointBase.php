<?php

namespace SWAPI\Tests\Endpoints;

use GuzzleHttp\Client;
use JsonMapper;

class EndpointBase extends \PHPUnit_Framework_TestCase
{
    protected $client;

    protected $mapper;

    public function setUp()
    {
        $this->client = $this->getClient();
        $this->mapper = $this->getMapper();
    }

    protected function getClient()
    {
        return new Client([
            'base_url' => 'https://swapi.co/api',
            'defaults' => [
                'exceptions' => false,
            ],
        ]);
    }

    protected function getMapper()
    {
        $mapper = new JsonMapper;
        $mapper->bExceptionOnUndefinedProperty = true;
        $mapper->bExceptionOnMissingData = true;

        return $mapper;
    }

    protected function getMockResponse($method, $path)
    {
        // "get", "/vehicles/1/" becomes "GET_vehicles_1"

        return file_get_contents(sprintf(
            "%s/%s_%s",
            $this->getMockResponsesPath(),
            strtoupper($method),
            trim(preg_replace("/[^A-Za-z0-9]+/", "_", $path), "_")
        ), "r");
    }

    protected function getMockResponsesPath()
    {
        return __DIR__ . '/responses/';
    }
}
