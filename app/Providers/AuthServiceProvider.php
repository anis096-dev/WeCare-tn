<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use App\Models\Permission;
use App\Policies\CityPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CountryPolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class   => PermissionPolicy::class,
        Role::class         => RolePolicy::class,
        Country::class      => CountryPolicy::class,
        City::class         => CityPolicy::class,
        User::class         => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
        Gate::define('browse_admin', fn(User $user) => $user->hasPermission('browse_admin'));
        Gate::define('administrator', fn(User $user) => $user->hasPermission('administrator'));
        Gate::define('banned', fn(User $user) => $user->hasPermission('banned'));
    }
}
