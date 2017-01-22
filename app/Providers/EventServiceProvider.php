<?php

namespace GymForGym\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as Provider;

class EventServiceProvider extends Provider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'GymForGym\Events\SomeEvent' => [
            'GymForGym\Listeners\EventListener',
        ],
    ];
}
