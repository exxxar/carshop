<?php

namespace AutoKit\Providers;

use AutoKit\Components\Cart\Cart;
use AutoKit\Components\Cart\CartItemCreator;
use AutoKit\Components\Rio\RioApi;
use AutoKit\Repositories\Cart\RepositoryContract;
use Illuminate\Support\ServiceProvider;



class RioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('RioApi', RioApi::class);
        $this->app->singleton(RioApi::class, RioApi::class);
    }
}
