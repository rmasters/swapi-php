<?php

namespace SWAPI\Tests\Functional;

class CharactersTest extends FunctionalBase
{
    public function testList()
    {
        $characters = $this->swapi->characters()->index();

        $this->assertInstanceOf('SWAPI\Models\Collection', $characters);
    }

    public function testGet()
    {
        $character = $this->swapi->characters()->get(4);

        $this->assertInstanceOf('SWAPI\Models\Character', $character);
        $this->assertEquals('http://swapi.co/api/people/4/', $character->url);
    }
}
