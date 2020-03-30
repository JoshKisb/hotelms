<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model'         => 'App\Policies\ModelPolicy',
        'App\User'          => 'App\Policies\UserPolicy',
        'App\Role'          => 'App\Policies\RolePolicy',
        'App\RoomType'      => 'App\Policies\RoomTypePolicy',
        'App\Room'          => 'App\Policies\RoomPolicy',
        'App\Customer'      => 'App\Policies\CustomerPolicy',
        'App\Reservation'   => 'App\Policies\ReservationPolicy',
        'App\Occupant'      => 'App\Policies\OccupantPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-users', function ($user) {
            return $user->hasAccess(['view_users']);
        });

        Gate::define('view-roles', function ($user) {
            return $user->hasAccess(['view_roles']);
        });

        Gate::define('view-roomtypes', function ($user) {
            return $user->hasAccess(['view_roomtypes']);
        });

        Gate::define('view-rooms', function ($user) {
            return $user->hasAccess(['view_rooms']);
        });

        Gate::define('view-customers', function ($user) {
            return $user->hasAccess(['view_customers']);
        });

        Gate::define('view-reservations', function ($user) {
            return $user->hasAccess(['view_reservations']);
        });

        Gate::define('view-occupants', function ($user) {
            return $user->hasAccess(['view_occupants']);
        });

        Gate::define('view-invoices', function ($user) {
            return $user->hasAccess(['view_invoices']);
        });

        Gate::define('manage-settings', function ($user) {
            return $user->hasAccess(['manage_settings']);
        });

        //
    }
}
