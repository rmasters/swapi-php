<?php

namespace SWAPI\Tests\Endpoints;

use SWAPI\Endpoints\VehiclesEndpoint;

use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use Psr\Log\NullLogger;
use JsonMapper;

class VehiclesTest extends EndpointBase
{
    /**
     * @var \SWAPI\Endpoints\VehiclesEndpoint
     */
    protected $vehicles;

    public function setUp()
    {
        parent::setUp();
        $this->vehicles = new VehiclesEndpoint($this->client, new NullLogger, $this->mapper);
    }

    public function testFindById()
    {
        $mock = new Mock([
            $this->getMockResponse('GET', '/vehicles/4'),
            $this->getMockResponse('GET', '/vehicles/1'),
        ]);

        $this->client->getEmitter()->attach($mock);

        $vehicle = $this->vehicles->get(4);
        $this->assertInstanceOf('SWAPI\Models\Vehicle', $vehicle);
        $this->assertEquals('Sand Crawler', $vehicle->name);
        $this->assertEquals('Digger Crawler', $vehicle->model);
        $this->assertEquals('Corellia Mining Corporation', $vehicle->manufacturer);
        $this->assertEquals(150000, $vehicle->cost_in_credits);
        $this->assertEquals(36.8, $vehicle->length);
        $this->assertEquals(30, $vehicle->max_atmosphering_speed);
        $this->assertEquals(46, $vehicle->crew);
        $this->assertEquals(30, $vehicle->passengers);
        $this->assertEquals(50000, $vehicle->cargo_capacity);
        $this->assertEquals("2 months", $vehicle->consumables);
        $this->assertEquals("wheeled", $vehicle->vehicle_class);
        $this->assertInternalType("array", $vehicle->pilots);
        $this->assertCount(0, $vehicle->pilots);
        $this->assertInternalType("array", $vehicle->films);
        $this->assertCount(2, $vehicle->films);
        $this->assertInstanceOf('SWAPI\Models\Film', $vehicle->films[0]);
        $this->assertEquals('http://swapi.co/api/films/1/', $vehicle->films[0]->url);
        $this->assertInstanceOf('DateTime', $vehicle->created);
        $this->assertEquals('2014-12-10T15:36:25+00:00', $vehicle->created->format('c'));
        $this->assertInstanceOf('DateTime', $vehicle->edited);
        $this->assertEquals('2014-12-20T21:30:21+00:00', $vehicle->edited->format('c'));
        $this->assertEquals('http://swapi.co/api/vehicles/4/', $vehicle->url);

        $this->assertNull($this->vehicles->get(1));
    }
}
