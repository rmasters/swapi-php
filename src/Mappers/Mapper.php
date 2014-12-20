<?php

namespace SWAPI\Mappers;

abstract class Mapper
{
    abstract public function item(array $data);

    public function collection(array $data)
    {
        return array_map(function(array $data) {
            return $this->item($data);
        }, $data);
    }
}
