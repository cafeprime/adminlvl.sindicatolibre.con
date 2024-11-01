<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrap();

        //Con esto creamos una directiva @role para usar en las plantillas y permitir el acceso a quien se lo demos
        Blade::if('role', function (...$roles) {
            return Auth::check() && in_array(Auth::user()->role_name, $roles);
        });
    }
}
