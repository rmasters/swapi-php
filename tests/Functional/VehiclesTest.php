<?php

namespace SWAPI\Tests\Functional;

class VehiclesTest extends FunctionalBase
{
    public function testList()
    {
        $vehicles = $this->swapi->vehicles()->index();

        $this->assertInstanceOf('SWAPI\Models\Collection', $vehicles);
    }

    public function testGet()
    {
        $vehicle = $this->swapi->vehicles()->get(4);

        $this->assertInstanceOf('SWAPI\Models\Vehicle', $vehicle);
        $this->assertEquals('http://swapi.co/api/vehicles/4/', $vehicle->url);
    }
}
