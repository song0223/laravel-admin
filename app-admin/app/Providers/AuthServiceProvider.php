<?php

namespace App\Admin\Providers;

use App\Admin\User;
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
        'App\Admin\Model' => 'App\Admin\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $config_permissions = config('permissions', []);
        $data = [];
        foreach($config_permissions as $permissions){
            foreach($permissions as $permission){
                $data[] = $permission;
            }
        }
        $data = collect(array_values($data));
        $data->each(function ($item) {
            Gate::define($item, function ($user) use ($item) {
                /** @var User $user */
                return $user->hasPermission($item);
            });
        });
    }
}
