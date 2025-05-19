<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     *To define all gates in the application we use boot method.
     */
    public function boot(): void
    {
        /**
         *We define a gate with the "edit" ability to be checked
         *if the user has permition to an action
         */
        Gate::define('edit', function (User $user) {
            // Check if the user as role id of 1 true
            return $user->role_id === 1; // The user with role id 1 can edit.
        });
    }
}
