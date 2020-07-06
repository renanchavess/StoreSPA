<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('images')
                            ->has('images')
                            ->where('active', true)->get();

        
        //dd($products[0]);
        return response()->json( $products->toArray(), 200);
    }

    public function getProductAllInfo($productId)
    {
        $product = Product::find($productId);

        return response()->Json($product->toArray(), 200);
    }
}
