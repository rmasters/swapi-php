<?php

namespace SWAPI\Mappers;

use SWAPI\Models\Vehicle;

class VehicleMapper extends Mapper
{
    public function item(array $data)
    {
        $vehicle = new Vehicle;

        $vehicle->id = (int) $data['vehicle']['id'];

        return $vehicle;
    }

}
