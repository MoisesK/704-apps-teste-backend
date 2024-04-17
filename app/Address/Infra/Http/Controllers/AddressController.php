<?php

namespace App\Address\Infra\Http\Controllers;

use App\Address\Domain\Entity\Address;
use App\Address\Domain\Repository\AddressRepository;
use Illuminate\Http\Request;

class AddressController
{
    public function __construct(
        private readonly AddressRepository $addressRepo
    )
    {
    }

    public function index()
    {
        return view('home', [
            'addresses' => $this->addressRepo->getAllAddresses()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
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

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = $this->addressRepo->getByField('id', $id);
        $this->addressRepo->delete($address);

        return redirect()->route('home');
    }
}
