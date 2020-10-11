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



// Route::get('/shop', function () {
//     return view('frontend.pages.myapp.index');
// });

 Route::get('/','Frontend\testfrontendController@index')->name('shop');
 Route::get('Product/{slug}', 'Frontend\testfrontendController@productshow')->name('product.show');

 //allCategoryProduct
 //Route::get('/shop/all-product', function () {  return view('frontend.pages.product.all-category-product'); })->name('allcategoryproduct');

Route::get('/shop/all-product','Frontend\testfrontendController@allCategoryProduct')->name('allProduct');
Route::get('/shop/carts','Frontend\CartController@index')->name('cart.index'); 

Route::get('/shop/checkout','Frontend\CheckoutController@index')->name('checkout'); 
Route::post('/checkout/store','Frontend\CheckoutController@store')->name('checkout.store'); 


Route::get('/shop/contact', function () {
    return view('frontend.pages.contact.index');
});
Route::get('/shop/about-us', function () {
    return view('frontend.pages.about-us.about-us');
});


// Route::get('/shop/single-product', function () {
//     return view('frontend.pages.product.show');
// })->name('single.product.show');

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
   
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Route::group([ 'prefix'=>'admin/supplier', 'namespace'=>'Backend\Supplier'], function () {
    Route::get('/list', 'SupplierController@index')->name('supplier.list');
   
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});



//brand

Route::group([ 'prefix'=>'admin/brand', 'namespace'=>'Backend\Brand'], function () {
    Route::get('/list','BrandController@index')->name('brands.index');
    Route::post('/store','BrandController@store')->name('brands.store');
    Route::get('/synctable','BrandController@syncTable')->name('brands.synctable');
    Route::get('/edit/{id}','BrandController@edit')->name('brands.edt');
    Route::post('/update/{id}','BrandController@update')->name('brands.update');
    Route::get('/delete/{id}','BrandController@destroy')->name('brands.delete');

});
//category

Route::group([ 'prefix'=>'admin/categories', 'namespace'=>'Backend\Catagory'], function () {
    Route::get('/','CategoryController@index')->name('categories.index');
});

//product


Route::get('admin/products','backend\ProductController@index')->name('products.index');
Route::post('admin/products/store','backend\ProductController@store')->name('products.store');
Route::get('admin/products/show','backend\ProductController@show')->name('products.show');
Route::get('admin/products/edit/{id}','backend\ProductController@edit')->name('products.edt');
Route::post('admin/products/update/{id}','backend\ProductController@update')->name('products.update');
Route::get('admin/products/delete/{id}','backend\ProductController@destroy')->name('products.delete');




