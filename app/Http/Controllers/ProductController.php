<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();        
        return response()->json( $products, 200);
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'active' => 'required',            
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->active = (boolean) $request->active;
        $product->stock = 0;

        if($product->save())
            return response()->json('sucess', 200);
        else
            return response()->json('error', 500);

    }
    
    public function teste(Request $request)
    {
        var_dump($request->get('file'));
        var_dump($request->file);
        var_dump($request->file('file'));
        var_dump($request->allFiles('file'));
    }

    public function edit(Int $id)
    {
        //$product = Product::where('id', $id)->with('images:id,path')->get();
        $product = Product::where('id', '=', $id)->with('images')->first(); 

        return response()->json( $product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find( $request->id);
        
        if( !empty($product) )
        {
            $product->name = $request->name;
            $product->price = $request->price;           
            $product->active = $request->active;
            
            if($product->save())
                return response()->json('success', 200);
            else
                return response()->json('success', 400);
        }

        return response()->json('error', 500);
    }
}
