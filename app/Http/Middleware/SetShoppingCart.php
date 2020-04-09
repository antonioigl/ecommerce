<?php

namespace App\Http\Middleware;

use App\ShoppingCart;
use Closure;
use function session;

class SetShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionName = 'shopping_cart_id';
        $shopping_cart_id = session($sessionName);
        $shopping_cart = ShoppingCart::findOrCreatedById($shopping_cart_id);
        session([$sessionName => $shopping_cart->id]);

        $request->shopping_cart = $shopping_cart;

        return $next($request);
    }
}
