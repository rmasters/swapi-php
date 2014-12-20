<?php

namespace SWAPI\Tests\Endpoints;

use GuzzleHttp\Client;

class EndpointBase extends \PHPUnit_Framework_TestCase
{
    private $client;

    protected function getClient()
    {
        if (!isset($this->client)) {
            $this->client = new Client([
                'base_url' => 'https://swapi.co/api',
                'defaults' => [
                    'exceptions' => false,
                ],
            ]);
        }
        return $this->client;
    }
}
