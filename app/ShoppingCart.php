<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function dd;
use function var_dump;

class ShoppingCart extends Model
{
    public static function findOrCreatedById($shopping_cart_id)
    {
        if ($shopping_cart_id){
            return static::find($shopping_cart_id);
        }

        return static::create();

    }
}
