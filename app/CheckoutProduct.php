<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    public function handleRequestCheckout( $productsRequest )
    {
        $CheckoutProducts = [];

        foreach ($productsRequest as $key => $product) 
        {
            $prod = Product::find($product->id);
            $CheckoutProducts [] = new CheckoutProduct([
                'quantity' => $product->quantity,
                'price' => $product->price,
                'product_id'=> $product->id,
            ]);
        }

        return $CheckoutProducts;
    }
}
