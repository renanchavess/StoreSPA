<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'active' => 'required',            
        ]);

        $new = new Product();
        $new->name = $request->name;
        $new->price = $request->price;
        $new->active = (boolean) $request->active;
        $new->stock = 0;

        if($new->save())
            return response()->json('sucess', 200);
        else
            return response()->json('error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
