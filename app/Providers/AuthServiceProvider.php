<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport; // add this
use Laravel\Passport\Http\Middleware\CreateFreshApiToken; // 追加
use Illuminate\Support\Facades\Route; // 追加



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',// uncomment this line
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Route::group(['middleware' => [CreateFreshApiToken::class]], function () {
            Passport::routes();
        });
    }
}
