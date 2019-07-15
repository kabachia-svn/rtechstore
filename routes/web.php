<?php

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

Route::resource('branches','BranchController');
Route::resource('headquarters','HeadquartersController');
Route::resource('orders','OrderController');
Route::resource('suppliers','SupplierController');
Route::resource('products','ProductController');
