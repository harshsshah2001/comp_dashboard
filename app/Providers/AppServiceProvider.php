<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Userlist;
use App\Models\Permission;
use App\Models\UserPermission;
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
    /**
     * ✅ GLOBAL ADMIN BYPASS
     * This runs BEFORE any gate or policy
     */
    Gate::before(function ($user, $ability) {

        // Use userlist guard explicitly
        $admin = Auth::guard('userlist')->user();

        if ($admin && $admin->role_id == 1) {
            return true; // 👑 FULL ACCESS
        }

        return null; // Continue normal checks
    });

    /**
     * Normal permission gate (for non-admins)
     */
    Gate::define('permission', function ($user, $permissionName) {

        $permissionId = Permission::where('permission_name', $permissionName)
            ->value('id');

        if (!$permissionId) {
            return false;
        }

        return UserPermission::where('user_id', $user->id)
            ->where('permission_id', $permissionId)
            ->exists();
    });
}
}
