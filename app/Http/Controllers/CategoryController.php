<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        
        if($category->save())
            return response()->json('success', 200);
        else
            return response()->json('error', 500);
    }

    public function show(Category $category)
    {
        //
    }

    public function update(Request $request)
    {
        if( !empty($request->id))
        {
            $category = Category::find($request->id);

            $rules = [
                'name' => 'required'
            ];
    
            $request->validate($rules);
    
            $category->name = $request->name;
            
            if($category->save())
                return response()->json('success', 200);
            else
                return response()->json('error', 500);
        }
        else
            return response()->json('id required', 400);
    }

    public function destroy(Category $category)
    {
        //
    }
}
