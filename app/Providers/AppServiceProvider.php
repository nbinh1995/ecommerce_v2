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
        view()->composer(['partials.common.header', 'partials.form.form-product'], 'App\Http\ViewComposers\CategoryComposer');
        view()->composer(['partials.common.section-detail', 'partials.common.section-cart'], 'App\Http\ViewComposers\SizeComposer');
    }
}
