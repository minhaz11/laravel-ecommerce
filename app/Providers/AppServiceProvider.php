<?php

namespace App\Providers;

use view;
use Cart;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            $view->with('getCartContents', Cart::getContent());
            $view->with('getTotalQuantity', Cart::getTotalQuantity());
            $view->with('getSubTotal', Cart::getSubTotal());
            $view->with('isEmpty', Cart::isEmpty());
        });
    }
}
