<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

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
            'categories' => 'required'
        ]);

        try {

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->active = (boolean) $request->active;
            $product->stock = 0;
            $categories = $request->categories;

            DB::beginTransaction();
            $product->save();
            $product->categories()->sync($categories);                                
            DB::commit();

            return response()->json('sucess', 200);
            
        } catch (\Throwable $th) {
            
            DB::rollBack();
            return response()->json('error', 500);
            
        }

        /*if($product->save())
            return response()->json('sucess', 200);
        else
            return response()->json('error', 500);*/

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
        $product = Product::find($request->id);

        if( !empty($product) )
        {
            $product->name = $request->name;
            $product->price = $request->price;           
            $product->active = $request->active;
            $categories = $request->categories;
            
            if($product->save() && $product->categories()->sync($categories))            
                return response()->json('success', 200);
            else
                return response()->json('success', 400);
        }

        return response()->json('error', 500);
    }
}
