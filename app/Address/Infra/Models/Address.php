<?php

namespace App\Address\Infra\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $neighborhood
 * @property string $number
 * @property string $zip_code
 */
class Address extends Model
{
    protected $fillable = [
        'id',
        'state',
        'city',
        'street',
        'neighborhood',
        'number',
        'zip_code',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'state' => 'string',
            'city' => 'string',
            'street' => 'string',
            'neighborhood' => 'string',
            'number' => 'integer',
            'zip_code' => 'string'
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'state' => $this->state,
            'city' => $this->city,
            'street' => $this->street,
            'neighborhood' => $this->neighborhood,
            'number' => $this->number,
            'zipCode' => $this->zip_code,
        ];
    }
}
