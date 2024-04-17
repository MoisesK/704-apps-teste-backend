<?php

namespace App\Address\Domain\Entity;

class Address
{
    public int $id = 0;
    public string $state = '';
    public string $city = '';
    public string $street = '';
    public string $neighborhood = '';
    public string $number = '';
    public string $zipCode = '';

    public function __construct(array $params)
    {
        $objectParams = get_object_vars($this);

        foreach ($params as $param => $value) {
            if (in_array($param, array_keys($objectParams))) {
                $this->{$param} = $value;
            }
        }
    }

    public function __toString(): string
    {
        return "{$this->state}, {$this->city}, {$this->street}, {$this->neighborhood}, {$this->number}";
    }
}