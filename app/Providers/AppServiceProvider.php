<?php

namespace App\Providers;

use App\Address\Domain\Repository\AddressRepository;
use App\Address\Infra\Repository\AddressRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AddressRepository::class, AddressRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
