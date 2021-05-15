<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\SubjectObserver;
use App\Observers\UserObserver;
use App\Observers\AttributeObserver;
use App\Models\Subject;
use App\Models\User;
use App\Models\Attribute;
use App\Observers\EntryPermissionObserver;
use App\Models\generated\EntryPermission;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Subject::observe(SubjectObserver::class);
        User::observe(UserObserver::class);
        Attribute::observe(AttributeObserver::class);
        EntryPermission::observe(EntryPermissionObserver::class);
    }
}
