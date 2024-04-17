<?php

namespace Tests\Unit;

use App\Address\Domain\Entity\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testItShouldMakeAddressWhenValidParamsProvided(): void
    {
        $params = [
            'street' => 'Street',
            'number' => '123',
            'city' => 'City',
            'state' => 'State',
            'zipCode' => '12345678',
            'neighborhood' => '12345678',
        ];

        $address = new Address($params);

        $this->assertEquals($params['street'], $address->street);
        $this->assertEquals($params['number'], $address->number);
        $this->assertEquals($params['city'], $address->city);
        $this->assertEquals($params['state'], $address->state);
        $this->assertEquals($params['zipCode'], $address->zipCode);
        $this->assertEquals($params['neighborhood'], $address->neighborhood);
    }

    public function testItShouldMakeCorrectAddressWhenInvalidParamsProvided(): void
    {
        $params = [
            'street' => 'Street',
            'number' => '123',
            'city' => 'City',
            'state' => 'State',
            'zipCode' => '12345678',
            'neighborhood' => '12345678',
            'junior' => 'aaaaa',
        ];

        $address = new Address($params);

        $this->assertEquals($params['street'], $address->street);
        $this->assertEquals($params['number'], $address->number);
        $this->assertEquals($params['city'], $address->city);
        $this->assertEquals($params['state'], $address->state);
        $this->assertEquals($params['zipCode'], $address->zipCode);
        $this->assertEquals($params['neighborhood'], $address->neighborhood);
        $this->assertObjectNotHasProperty('junior', $address);
    }
}
