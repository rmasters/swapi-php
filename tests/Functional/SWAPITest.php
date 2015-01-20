<?php

namespace SWAPI\Tests\Functional;

class SWAPITest extends FunctionalBase
{
    public function testGetByUri()
    {
        $vehicle = $this->swapi->getFromUri("http://swapi.co/api/vehicles/4");

        $this->assertInstanceOf('SWAPI\Models\Vehicle', $vehicle);
        $this->assertEquals("Sand Crawler", $vehicle->name);
    }
}
