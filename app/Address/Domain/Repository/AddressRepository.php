<?php

namespace App\Address\Domain\Repository;

use App\Address\Domain\Entity\Address;

interface AddressRepository
{
    public function create(Address $address): void;

    public function delete(Address $address): void;
    public function getByField(string $field, mixed $value): ?Address;
    public function getAllAddresses(): array;

    public function update(Address $address): void;
}