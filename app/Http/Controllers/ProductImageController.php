<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function getByProductId($id)
    {
        $images = ProductImage::where('product_id', '=', $id)->get();
        return response()->json($images, 200);
    }

    public function store(Request $request)
    {
        $files = $request->allFiles('files');
        $product = Product::find($request->productId);


        if( !empty($product) )
        {
            for ($i=0; $i < count($files['files']); $i++) 
            {             
                $file = $files['files'][$i];
                    
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->path = $file->store('products/'.$product->id.'');
                $productImage->save();
                
                unset($productImage);
            }
        }            
        return response()->json('sucess', 200);
    }

    public function destroy($id)
    {
        $productImage = ProductImage::find($id);
        
        if($productImage->destroy_full())
        {
            Storage::delete([$productImage->path]);
            return response()->json('sucess', 200);
        }
        else
            return response()->json('error', 500);
    }
}
