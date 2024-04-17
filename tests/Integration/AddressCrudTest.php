<?php

namespace Tests\Integration;

use App\Address\Domain\Entity\Address;
use App\Address\Infra\Repository\AddressRepositoryEloquent;
use PHPUnit\Framework\TestCase;

class AddressCrudTest extends TestCase
{
    public function testItShouldRegisterAddressWhenValidAddressProvided(): void
    {
        /** @var AddressRepositoryEloquent $addressRepo */
        $addressRepo = app()->get(AddressRepositoryEloquent::class);

        $address = new Address([
            'street' => 'Street',
            'number' => '123',
            'city' => 'City',
            'state' => 'State',
            'zipCode' => '12345678',
            'neighborhood' => '12345678',
        ]);

        $addressRepo->create($address);
        $addressCreated = $addressRepo->getByField('zip_code', '12345678');

        $this->assertEquals($address->neighborhood, $addressCreated->neighborhood);
        $this->assertEquals($address->number, $addressCreated->number);
        $this->assertEquals($address->street, $addressCreated->street);
        $this->assertEquals($address->city, $addressCreated->city);
        $this->assertEquals($address->zipCode, $addressCreated->zipCode);
        $this->assertEquals($address->state, $addressCreated->state);
    }

    public function testItShouldUpdateAddressWhenValidAddressProvided(): void
    {
        /** @var AddressRepositoryEloquent $addressRepo */
        $addressRepo = app()->get(AddressRepositoryEloquent::class);
        $address = $addressRepo->getByField('zip_code', '12345678');

        $address->number = '321';
        $addressRepo->update($address);

        $addressUpdated = $addressRepo->getByField('zip_code', '12345678');

        $this->assertEquals($address->neighborhood, $addressUpdated->neighborhood);
        $this->assertEquals($address->number, $addressUpdated->number);
        $this->assertEquals($address->street, $addressUpdated->street);
        $this->assertEquals($address->city, $addressUpdated->city);
        $this->assertEquals($address->zipCode, $addressUpdated->zipCode);
        $this->assertEquals($address->state, $addressUpdated->state);
    }
}
