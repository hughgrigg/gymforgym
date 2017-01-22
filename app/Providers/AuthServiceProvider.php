<?php

namespace GymForGym\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as Provider;

class AuthServiceProvider extends Provider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'GymForGym\Model' => 'GymForGym\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
