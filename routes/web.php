<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('/', function () {
    return view('frontend.layouts.master');
});
Route::get('/shop', function () {
    return view('frontend.pages.myapp.index');
});
Route::get('/shop/cart', function () {
    return view('frontend.pages.cart.index');
});
Route::get('/shop/checkout', function () {
    return view('frontend.pages.checkout.index');
});
Route::get('/shop/contact', function () {
    return view('frontend.pages.contact.index');
});
Route::get('/shop/about-us', function () {
    return view('frontend.pages.about-us.about-us');
});
Route::get('/shop/all-product', function () {
    return view('frontend.pages.product.all-category-product');
});

//end-frontend
//Route::get('/', function () { return view('welcome'); });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view('backend.layouts.app');
});
Route::get('/admin/dashboard', function () {
    return view('backend.pages.dashboard.index');
});

Route::get('/admin/datatable', function () {
    return view('backend.pages.datatable');
});
//user list
    Route::get('admin/users', ['uses'=>'backend\UserController@index', 'as'=>'users.index']);

//section
    Route::group([ 'prefix'=>'admin/section', 'namespace'=>'Backend\Section'], function () {
    Route::get('/list', 'SectionsController@index')->name('section.list');
    Route::post('/store', 'SectionsController@store')->name('section.store');
    Route::post('/update/{section}', 'SectionsController@update')->name('section.update');
    Route::get('/synctable', 'SectionsController@syncTable')->name('section.synctable');
    Route::get('/edit/{section}', 'SectionsController@edit')->name('section.edit');
    Route::get('/destroy/{section}', 'SectionsController@destroy')->name('section.destroy');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});



//brand

    Route::group([ 'prefix'=>'admin/brand', 'namespace'=>'Backend\Brand'], function () {
    Route::get('/list','backend\BrandController@index')->name('brands.index');
    Route::post('/store','backend\BrandController@store')->name('brands.store');
    Route::get('/synctable','backend\BrandController@syncTable')->name('brands.synctable');
    Route::get('/edit/{id}','backend\BrandController@edit')->name('brands.edt');
    Route::post('/update/{id}','backend\BrandController@update')->name('brands.update');
    Route::get('/delete/{id}','backend\BrandController@destroy')->name('brands.delete');

});
//category


    Route::get('admin/categories','backend\CategoryController@index')->name('categories.index');
    Route::post('admin/categories/store','backend\CategoryController@store')->name('categories.store');
    Route::get('admin/categories/show','backend\CategoryController@show')->name('categories.show');
    Route::get('admin/categories/edit/{id}','backend\CategoryController@edit')->name('categories.edt');
    Route::post('admin/categories/update/{id}','backend\CategoryController@update')->name('categories.update');
    Route::get('admin/categories/delete/{id}','backend\CategoryController@destroy')->name('categories.delete');


//product


Route::get('admin/products','backend\ProductController@index')->name('products.index');
Route::post('admin/products/store','backend\ProductController@store')->name('products.store');
Route::get('admin/products/show','backend\ProductController@show')->name('products.show');
Route::get('admin/products/edit/{id}','backend\ProductController@edit')->name('products.edt');
Route::post('admin/products/update/{id}','backend\ProductController@update')->name('products.update');
Route::get('admin/products/delete/{id}','backend\ProductController@destroy')->name('products.delete');




