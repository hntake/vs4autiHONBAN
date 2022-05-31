<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\Cashier\User;



class AppServiceProvider extends ServiceProvider
{
   /*  /**
     * Register any application services.
     *
     * @return void
     */
    /* public function register()
    {
        Cashier::ignoreMigrations();
    }
 */
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

        Cashier::useCustomerModel(User::class);


    }
}


