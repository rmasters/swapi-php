<?php

namespace SWAPI\Endpoints;

use SWAPI\Mappers\VehicleMapper;

class Vehicles extends Endpoint
{
    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("/vehicles/%d", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return (new VehicleMapper)->item($response->json());
        }

        return $this->handleResponse($response, $request);
    }
}
