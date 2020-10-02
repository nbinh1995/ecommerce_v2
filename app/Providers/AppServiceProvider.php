<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['sites.home', 'sites.cart', 'sites.checkout', 'sites.shopdetail', 'sites.shop'], 'App\Http\ViewComposers\CategoryComposer');
    }
}
