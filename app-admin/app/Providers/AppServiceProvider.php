<?php

namespace App\Admin\Providers;

use App\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //验证码对比
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            if (Session::get('milkcaptcha') == $value) {
                return true;
            } else {
                return false;
            }
        });

        Blade::if ('permission', function ($expression) {
            $user = Auth::user();
            /** @var User $user */
            return $user->hasPermission($expression);
        });

        Blade::if ('menu', function ($expression) {
            $bool = false;
            if (!Auth::guest()){
                $user = Auth::user();
                if ($user->id == 1){
                    return true;
                }
                $permissions = collect();
                foreach ($user->roles as $role) {
                    foreach ($role->permissions as $permission) {
                        $permissions[] = $permission->toArray();
                    }
                }
                $bool = $permissions->contains(function ($value) use ($expression) {
                    $new_code = str_replace('/', '.', $value['code']);
                    return in_array($new_code, $expression);
                });
            }
            return $bool;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
