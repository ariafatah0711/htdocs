<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::before(function (User $user, string $ability) {
            return $user->is_admin() ? true: null;
        });
    }
}
