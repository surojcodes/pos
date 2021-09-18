<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('users','UserController');
Route::resource('productcategories','ProductcategoryController');
Route::resource('menucategories','MenucategoryController');
Route::resource('products','ProductController');
Route::resource('menus','MenuController');
Route::resource('purchases','PurchaseController');

Route::get('/get-products/{id}','ProductController@getProducts');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'DashboardController@quickSearch')->name('quick-search');


