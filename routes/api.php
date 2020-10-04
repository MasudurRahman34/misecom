<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('shop/latest','Frontend\testfrontendController@index')->name('latest.product');

// Cart Routes
Route::group(['prefix' => 'carts'], function(){
    Route::get('/', 'Frontend\CartController@index')->name('carts');
    Route::post('/store', 'Frontend\CartController@store')->name('carts.store');
    Route::post('/update/{id}', 'Frontend\CartController@update')->name('carts.update');
    Route::post('/delete/{id}', 'Frontend\CartController@destroy')->name('carts.delete');
  });
