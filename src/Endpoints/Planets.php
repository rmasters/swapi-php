<?php

namespace SWAPI\Endpoints;

class Planets extends Endpoint
{
    public function get($id)
    {
        $r = $this->http->get(sprintf("/planets/%d", $id));
    }
}
