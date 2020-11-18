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
    Route::get('/ajax_header_cart', 'Frontend\CartController@ajax_header_cart')->name('ajax_header_cart');
    Route::get('/ajax_cart_table', 'Frontend\CartController@ajax_cart_table')->name('ajax_cart_table');
    Route::post('/store', 'Frontend\CartController@store')->name('carts.store');
    Route::post('/Pstore', 'Frontend\CartController@ProductStore')->name('carts.productstore');
    Route::post('/update/{id}', 'Frontend\CartController@update')->name('carts.update');
    Route::post('/delete/{id}', 'Frontend\CartController@destroy')->name('carts.delete');
  });

// Checkout Routes

  Route::group(['prefix' => 'region'], function(){

    Route::get('/list', 'Frontend\OrderController@region')->name('regionlist');

  });   


  
//WishlistController
  Route::group(['prefix' => 'wishlist'], function(){
    Route::get('/', 'Frontend\WishlistController@index')->name('wishlist');
    Route::post('/store', 'Frontend\WishlistController@store')->name('wishlist.store');
    Route::post('/delete/{id}', 'Frontend\WishlistController@destroy')->name('wishlist.delete');
  });

Route::group([ 'prefix'=>'admin/section', 'namespace'=>'Backend\Section'], function () {
    Route::post('/store', 'SectionsController@store')->name('section.store');
    Route::post('/update/{section}', 'SectionsController@update')->name('section.update');
    Route::get('/synctable', 'SectionsController@syncTable')->name('section.synctable');
    Route::get('/edit/{section}', 'SectionsController@edit')->name('section.edit');
    Route::get('/destroy/{section}', 'SectionsController@destroy')->name('section.destroy');

    Route::get('/getCatagoryBrand/{section}', 'SectionsController@getCatagoryBrand')->name('section.getCatagoryBrand');
});

Route::group([ 'prefix'=>'admin/supplier', 'namespace'=>'Backend\Supplier'], function () {
    Route::post('/store', 'SupplierController@store')->name('supplier.store');
    Route::post('/update/{supplier}', 'SupplierController@update')->name('supplier.update');
    Route::get('/synctable', 'SupplierController@syncTable')->name('supplier.synctable');
    Route::get('/edit/{supplier}', 'SupplierController@edit')->name('supplier.edit');
    Route::get('/destroy/{supplier}', 'SupplierController@destroy')->name('supplier.destroy');
});

Route::group([ 'prefix'=>'admin/brand', 'namespace'=>'Backend\Brand'], function () {
    Route::post('/store','BrandController@store')->name('brands.store');
    Route::get('/synctable','BrandController@syncTable')->name('brands.synctable');
    Route::get('/edit/{id}','BrandController@edit')->name('brands.edt');
    Route::post('/update/{id}','BrandController@update')->name('brands.update');
    Route::get('/destroy/{id}','BrandController@destroy')->name('brands.delete');

});



Route::group([ 'prefix'=>'admin/categories', 'namespace'=>'Backend\Catagory'], function () {
    Route::post('/store','CategoryController@store')->name('categories.store');
    Route::get('/show','CategoryController@syncTable')->name('categories.show');
    Route::get('/edit/{id}','CategoryController@edit')->name('categories.edt');
    Route::post('/update/{id}','CategoryController@update')->name('categories.update');
    Route::get('/delete/{id}','CategoryController@destroy')->name('categories.delete');
});

//product

Route::group([ 'prefix'=>'admin/product', 'namespace'=>'Backend\Product'], function () {
    Route::post('/store','ProductController@store')->name('products.store');
    Route::get('/synctable','ProductController@syncTable')->name('products.syncTable');
    Route::get('/edit/{id}','ProductController@edit')->name('products.edt');
    Route::post('/update/{id}','ProductController@update')->name('products.update');
    Route::get('/delete/{id}','ProductController@destroy')->name('products.delete');

    Route::get('/image/{id}','ProductController@productimage')->name('products.image');

    
});
Route::group([ 'prefix'=>'admin/product/quantity', 'namespace'=>'Backend\Product'], function () {
    Route::post('/store','ProductController@quantity_store')->name('product.quantity.store');
    Route::get('/synctable','ProductController@quantity_syncTable')->name('product.quantity.syncTable');
    Route::get('/edit/{id}','ProductController@quantity_edit')->name('product.quantity.edt');
    Route::post('/update/{id}','ProductController@quantity_update')->name('product.quantity.update');
    Route::get('/destroy/{id}','ProductController@quantity_destroy')->name('product.quantity.delete');
    
});
Route::group([ 'prefix'=>'admin/region', 'namespace'=>'Backend\Region'], function () {
  Route::post('/store','RegionCntroller@store')->name('region.store');
  Route::get('/synctable','RegionCntroller@syncTable')->name('region.synctable');
  Route::get('/edit/{id}','RegionCntroller@edit')->name('region.edt');
  Route::post('/update/{id}','RegionCntroller@update')->name('region.update');
  Route::get('/destroy/{id}','RegionCntroller@destroy')->name('region.delete');

});

Route::group([ 'prefix'=>'admin/order', 'namespace'=>'Backend\Order'], function () {
  Route::post('/store','OrderController@store')->name('order.store');
  Route::get('/synctable','OrderController@syncTable')->name('order.synctable');
  Route::get('/edit/{id}','OrderController@edit')->name('order.edt');
  Route::post('/update/{id}','OrderController@update')->name('order.update');
  Route::get('/destroy/{id}','OrderController@destroy')->name('order.delete');

});