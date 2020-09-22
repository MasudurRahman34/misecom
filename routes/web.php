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

Route::get('/', function () {
    return view('welcome');
});

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
