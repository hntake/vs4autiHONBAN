<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\Cashier\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;




class AppServiceProvider extends ServiceProvider
{
     /**
     * Register any application services.
     *
     * @return void
     */
    /* public function register()
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        if(\App::environment(['production'])){
            \URL::forceScheme('https');
        }
        Paginator::useBootstrap();

        Validator::extend('not_between_custom', function ($attribute, $value, $parameters, $validator) {
            return $value <= 0 || $value >= 50;
        });



    }
}


