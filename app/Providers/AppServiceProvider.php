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
        view()->composer(['partials.site.header'], 'App\Http\ViewComposers\CategoryComposer');
        view()->composer(['partials.site.section-detail'], 'App\Http\ViewComposers\SizeComposer');
    }
}
