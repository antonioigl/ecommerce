<?php

namespace App\Http\Controllers;

use App\ProductInShoppingCart;
use Illuminate\Http\Request;
use function __;
use function redirect;

class ProductInShoppingCartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopping_cart');
    }

    public function store(Request $request)
    {
        $in_shopping_cart = ProductInShoppingCart::create([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id,
        ]);

        if ($in_shopping_cart) {
            return redirect()->back();
        }

        return redirect()->withErrors(['product' => __('No se pudo agregar el producto')]);
    }

    public function delete(Request $request)
    {

    }
}
