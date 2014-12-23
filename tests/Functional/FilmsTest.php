<?php

namespace SWAPI\Tests\Functional;

class FilmsTest extends FunctionalBase
{
    public function testList()
    {
        $films = $this->swapi->films()->index();

        $this->assertInstanceOf('SWAPI\Models\Collection', $films);
    }

    public function testGet()
    {
        $film = $this->swapi->films()->get(1);

        $this->assertInstanceOf('SWAPI\Models\Film', $film);
        $this->assertEquals('http://swapi.co/api/films/1/', $film->url);
    }
}
