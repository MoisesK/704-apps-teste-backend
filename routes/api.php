<?php

use App\Address\Infra\Http\Controllers\AddressController;
use App\Address\Infra\Http\Controllers\AddressControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/', [AddressControllerApi::class, 'read']);
Route::post('/', [AddressControllerApi::class, 'create']);
Route::put('/{id}', [AddressControllerApi::class, 'update']);
Route::delete('/{id}', [AddressControllerApi::class, 'destroy']);
