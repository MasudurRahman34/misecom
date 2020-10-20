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

 //allcategoryProduct
Route::get('/shop/category/{id}/product','Frontend\testfrontendController@allcategoryProduct')->name('allcategoryProduct');
Route::get('/shop/all-product','Frontend\testfrontendController@allProduct')->name('allProduct');

//cart-controller
Route::get('/shop/carts','Frontend\CartController@index')->name('cart.index'); 

//checkout-controller
Route::get('/checkout','Frontend\OrderController@index')->name('checkout'); 
Route::post('/checkout/store','Frontend\OrderController@store')->name('checkout.store'); 

Route::get('/shop/invoice','Frontend\OrderController@invoice')->name('invoice'); 

//user-order-list
Route::group([ 'prefix'=>'user/order', 'namespace'=>'Frontend'], function () {
    Route::get('/list','OrderController@orderindex')->name('orderindex.user');
    Route::get('/orderDetails/{id}','OrderController@orderDetails')->name('orderDetail');
    Route::get('/synctable','OrderController@syncTable')->name('order.synctable');
    Route::get('/edit/{id}','OrderController@edit')->name('order.edt');
    Route::post('/update/{id}','OrderController@update')->name('order.update');
    Route::get('/destroy/{id}','OrderController@destroy')->name('order.delete');
});



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

Route::group([ 'prefix'=>'admin/product', 'namespace'=>'Backend\Product'], function () {
    Route::get('/list','ProductController@index')->name('products.index');
});

Route::group([ 'prefix'=>'admin/product/quantity', 'namespace'=>'Backend\Product'], function () {
    Route::get('/list','ProductController@quantity_index')->name('product.quantity.index');
});

Route::group([ 'prefix'=>'admin/order', 'namespace'=>'Backend\Order'], function () {
    Route::get('/list','OrderController@index')->name('order.index');
    Route::get('/orderDetails/{id}','OrderController@orderDetails')->name('orderDetail');
});



