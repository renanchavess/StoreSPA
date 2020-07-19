<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::prefix('checkout')->group(function(){
    Route::get('paymentPlans', 'CheckoutController@getPaymentPlans');
});

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::post('/product/teste', 'ProductController@teste');
Route::put('/product', 'ProductController@update');
Route::get('/product/{id}', 'ProductController@edit');
Route::get('/productImage/{id}', 'ProductImageController@getByProductId');
Route::post('/productImage', 'ProductImageController@store');
Route::delete('/productImage/{id}', 'ProductImageController@destroy');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('paymentPlan', 'PaymentPlanController');


Route::get('/home/getProducts', 'HomeController@getProducts');
Route::get('home/product/{Id}/getAllInfo', 'HomeController@getProductAllInfo');

Route::get('artisan/execute', function () {
    echo Artisan::call('passport',['--personal', '-n', '--name[auth]']);

});


