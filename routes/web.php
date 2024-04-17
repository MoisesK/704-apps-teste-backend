<?php

use App\Address\Infra\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AddressController::class, 'index'])->name('home');
Route::post('/', [AddressController::class, 'store']);
Route::delete('/{id}', [AddressController::class, 'destroy']);
