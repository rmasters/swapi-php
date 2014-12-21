<?php

namespace SWAPI\Endpoints;

use SWAPI\Models\Vehicle;

class Vehicles extends Endpoint
{
    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("/vehicles/%d", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->mapper->map($response->json(), new Vehicle);
        }

        return $this->handleResponse($response, $request);
    }
}
