<?php

namespace App\Providers;

use App\ShoppingCart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use function session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){
            $sessionName = 'shopping_cart_id';
            $shopping_cart_id = session($sessionName);
            $shopping_cart = ShoppingCart::findOrCreatedById($shopping_cart_id);
            session([$sessionName => $shopping_cart->id]);

            $view->with('productsCount', $shopping_cart->id);
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
