<?php

namespace App\Address\Infra\Repository;

use App\Address\Domain\Entity\Address;
use App\Address\Domain\Repository\AddressRepository;
use App\Address\Infra\Models\Address as AddressModel;

class AddressRepositoryEloquent implements AddressRepository
{
    public function create(Address $address): void
    {
        $addressModel = new AddressModel();
        $addressModel->neighborhood = $address->neighborhood;
        $addressModel->street = $address->street;
        $addressModel->number = $address->number;
        $addressModel->state = $address->state;
        $addressModel->city = $address->city;
        $addressModel->zip_code = $address->zipCode;

        $addressModel->save();

        $address->id = $addressModel->id;
    }

    public function delete(Address $address): void
    {
        // TODO: Implement delete() method.
    }

    public function getByField(string $field, mixed $value): ?Address
    {
        $record = AddressModel::where($field, $value)->first();

        if (!$record) {
            return null;
        }

        return new Address($record->toArray());
    }

    public function update(Address $address): void
    {
        $record = AddressModel::where('id', $address->id)->first();
        $record->neighborhood = $address->neighborhood;
        $record->street = $address->street;
        $record->number = $address->number;
        $record->state = $address->state;
        $record->city = $address->city;
        $record->zip_code = $address->zipCode;

        $record->save();
    }
}