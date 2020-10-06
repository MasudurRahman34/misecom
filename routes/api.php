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
Route::group([ 'prefix'=>'admin/section', 'namespace'=>'Backend\Section'], function () {
    Route::post('/store', 'SectionsController@store')->name('section.store');
    Route::post('/update/{section}', 'SectionsController@update')->name('section.update');
    Route::get('/synctable', 'SectionsController@syncTable')->name('section.synctable');
    Route::get('/edit/{section}', 'SectionsController@edit')->name('section.edit');
    Route::get('/destroy/{section}', 'SectionsController@destroy')->name('section.destroy');
});

Route::group([ 'prefix'=>'admin/supplier', 'namespace'=>'Backend\Supplier'], function () {
    Route::post('/store', 'SupplierController@store')->name('supplier.store');
    Route::post('/update/{supplier}', 'SupplierController@update')->name('supplier.update');
    Route::get('/synctable', 'SupplierController@syncTable')->name('supplier.synctable');
    Route::get('/edit/{supplier}', 'SupplierController@edit')->name('supplier.edit');
    Route::get('/destroy/{supplier}', 'SupplierController@destroy')->name('supplier.destroy');
});