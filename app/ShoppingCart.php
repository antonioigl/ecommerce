<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public static function findOrCreatedById($shopping_cart_id)
    {
        if ($shopping_cart_id){
            return static::find($shopping_cart_id);
        }

        return static::create();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_in_shopping_carts');
    }

    public function productsCount()
    {
        return $this->products()->count();
    }
}
