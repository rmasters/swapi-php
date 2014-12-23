<?php

namespace SWAPI\Endpoints;

use SWAPI\Models\Character;
use SWAPI\Models\Collection;

class CharactersEndpoint extends Endpoint
{
    public function index($page = 1)
    {
        $request = $this->http->createRequest("GET", sprintf("people/?page=%d", $page));
        $response = $this->http->send($request);

        $collection = new Collection;

        if ($response->getStatusCode() == 200) {
            return $this->hydrateMany($response->json(), 'SWAPI\Models\Character');
        }

        return $this->handleResponse($response, $request, $collection);
    }

    public function get($id)
    {
        $request = $this->http->createRequest("GET", sprintf("people/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Character);
        }

        return $this->handleResponse($response, $request);
    }
}
