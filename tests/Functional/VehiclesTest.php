<?php

namespace SWAPI\Tests\Functional;

class VehiclesTest extends FunctionalBase
{
    public function testList()
    {
        $this->swapi->vehicles()->index();
    }

    public function testGet()
    {
        $res = $this->swapi->vehicles()->get(4);
    }
}
