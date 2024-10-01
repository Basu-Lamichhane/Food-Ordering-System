<?php

namespace App\Providers;
use Illuminate\Support\Facades\Hash;
use App\Hashing\CustomCBCHasher;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         Hash::extend('cbc', function () {
            return new CustomCBCHasher;
        });
    }
}
