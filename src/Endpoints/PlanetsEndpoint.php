<?php

namespace SWAPI\Endpoints;

use SWAPI\Models\Collection;
use SWAPI\Models\Planet;

class PlanetsEndpoint extends Endpoint
{
    public function index($page = 1)
    {
        $request = $this->http->createRequest("GET", sprintf("planets/?page=%d", $page));
        $response = $this->http->send($request);

        $collection = new Collection;

        if ($response->getStatusCode() == 200) {
            return $this->hydrateMany($response->json(), 'SWAPI\Models\Planet');
        }

        return $this->handleResponse($response, $request, $collection);
    }

    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("planets/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Planet);
        }

        return $this->handleResponse($response, $request);
    }
}
