<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Userlist;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
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
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Gate::define('isAdmin', function () {
        $user = Auth::guard('userlist')->user();

        return $user && $user->role_id == 1;
    });
}
}
