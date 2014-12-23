<?php

namespace SWAPI\Endpoints;

use SWAPI\Models\Vehicle;
use SWAPI\Models\Collection;

class VehiclesEndpoint extends Endpoint
{
    public function index($page = 1)
    {
        $request = $this->http->createRequest("GET", sprintf("vehicles/?page=%d", $page));
        $response = $this->http->send($request);

        $collection = new Collection;

        if ($response->getStatusCode() == 200) {
            return $this->hydrateMany($response->json(), 'SWAPI\Models\Vehicle');
        }

        return $this->handleResponse($response, $request, $collection);
    }

    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("vehicles/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Vehicle);
        }

        return $this->handleResponse($response, $request);
    }
}
