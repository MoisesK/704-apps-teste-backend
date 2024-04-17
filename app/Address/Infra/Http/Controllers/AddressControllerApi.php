<?php

namespace App\Address\Infra\Http\Controllers;

use App\Address\Domain\Entity\Address;
use App\Address\Domain\Repository\AddressRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressControllerApi
{
    public function __construct(
        private readonly AddressRepository $addressRepo
    )
    {
    }

    public function read(Request $request)
    {
        $addresses = $this->addressRepo->getAllAddresses();
        return response($addresses, 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'zipCode' => 'string',
            'number' => 'integer',
            'state' => 'string',
            'city' => 'string',
            'neighborhood' => 'string',
            'street' => 'string'
        ]);

        $data = $request->only(['zipCode', 'number', 'state', 'city', 'neighborhood', 'street']);
        $this->addressRepo->create(new Address($data));

        return response(['status' => 'Success'], 201);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'zipCode' => 'string',
            'number' => 'integer',
            'state' => 'string',
            'city' => 'string',
            'neighborhood' => 'string',
            'street' => 'string'
        ]);

        $data = $request->only(['zipCode', 'number', 'state', 'city', 'neighborhood', 'street']);

        $address = $this->addressRepo->getByField('id', $id);
        $address->neighborhood = $data['neighborhood'];
        $address->street = $data['street'];
        $address->number = $data['number'];
        $address->state = $data['state'];
        $address->city = $data['city'];
        $address->zipCode = $data['zipCode'];

        $this->addressRepo->update($address);

        return response('Success', 201);
    }

    public function destroy(string $id)
    {
        $address = $this->addressRepo->getByField('id', $id);
        $this->addressRepo->delete($address);

        return response('Success', 200);
    }
}
