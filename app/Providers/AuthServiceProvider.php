<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('user', function (User $user) {
                return $user->role == "0";
        });
        Gate::define('admin', function (User $user) {
                return $user->role == "1";
        });
        Gate::define('kitchen', function (User $user) {
            return $user->role == "2";
        });
        Gate::define('delivery', function (User $user) {
            return $user->role == "3";
        });

        //
    }
}
