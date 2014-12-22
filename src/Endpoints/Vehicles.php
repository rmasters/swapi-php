<?php

namespace SWAPI\Endpoints;

use ArrayObject;
use SWAPI\Models\Vehicle;

class Vehicles extends Endpoint
{
    public function index($page = null)
    {
        $request = $this->http->createRequest("GET", "vehicles/");
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->mapper->mapArray($response->json()['results'], new ArrayObject, 'SWAPI\Models\Vehicle');
        }

        return $this->handleResponse($response, $request);
    }

    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("vehicles/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->mapper->map($response->json(), new Vehicle);
        }

        return $this->handleResponse($response, $request);
    }
}
