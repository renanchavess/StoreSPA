<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout')->middleware('auth:api');
});

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::post('/product/teste', 'ProductController@teste');
Route::put('/product', 'ProductController@update');
Route::get('/product/{id}', 'ProductController@edit');
Route::get('/productimage/{id}', 'ProductImageController@getByProductId');
Route::post('/productimage', 'ProductImageController@store');
Route::delete('/productimage/{id}', 'ProductImageController@destroy');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');


Route::get('/home/getProducts', 'HomeController@getProducts');
Route::get('home/product/{Id}/getAllInfo', 'HomeController@getProductAllInfo');


