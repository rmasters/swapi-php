<?php

namespace SWAPI\Tests\Functional;

use SWAPI\SWAPI;
use JsonMapper;

class FunctionalBase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \SWAPI\SWAPI
     */
    protected $swapi;

    public function setUp()
    {
        // Configure a JsonMapper to throw exceptions on missing fields
        $mapper = new JsonMapper;
        $mapper->bExceptionOnMissingData = true;
        $mapper->bExceptionOnUndefinedProperty = true;

        $this->swapi = new SWAPI;
        $this->swapi->setMapper($mapper);
    }
}
