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

Route::get('/', function () { return view('welcome'); });

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

//category


    Route::get('admin/brands','backend\BrandController@index')->name('brands.index');
    Route::post('admin/brands/store','backend\BrandController@store')->name('brands.store');
    Route::get('admin/brands/show','backend\BrandController@show')->name('brands.show');
    Route::get('admin/brands/edit/{id}','backend\BrandController@edit')->name('brands.edt');
    Route::post('admin/brands/update/{id}','backend\BrandController@update')->name('brands.update');
    Route::get('admin/brands/delete/{id}','backend\BrandController@destroy')->name('brands.delete');


//category


    Route::get('admin/categories','backend\CategoryController@index')->name('categories.index');
    Route::post('admin/categories/store','backend\CategoryController@store')->name('categories.store');
    Route::get('admin/categories/show','backend\CategoryController@show')->name('categories.show');
    Route::get('admin/categories/edit/{id}','backend\CategoryController@edit')->name('categories.edt');
    Route::post('admin/categories/update/{id}','backend\CategoryController@update')->name('categories.update');
    Route::get('admin/categories/delete/{id}','backend\CategoryController@destroy')->name('categories.delete');

//user list
Route::get('admin/users', ['uses'=>'backend\UserController@index', 'as'=>'users.index']);
