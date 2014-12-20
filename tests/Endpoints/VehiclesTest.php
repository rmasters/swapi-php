<?php

namespace SWAPI\Tests\Endpoints;

use SWAPI\Endpoints\Vehicles;

use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use Psr\Log\NullLogger;

class VehiclesTest extends EndpointBase
{
    protected $vehicles;

    public function setUp()
    {
        $this->vehicles = new Vehicles($this->getClient(), new NullLogger);
    }

    public function testFindById()
    {
        $mock = new Mock([
            new Response(200, ["Content-Type" => "application/json"], Stream::factory('{"vehicle": {"id": 123}}')),
            new Response(404, ["Content-Type" => "application/json"], Stream::factory('{"error": "Not found"}')),
        ]);

        $this->getClient()->getEmitter()->attach($mock);

        $vehicle = $this->vehicles->get(123);

        $this->assertNull($this->vehicles->get(-1));
    }
}
