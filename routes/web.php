<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', 'AuthController@index');
Route::get('/auth', 'AuthController@index');
Route::post('/auth/init', 'AuthController@init');
// Actions
Route::get('/logout', 'ActionController@logout');

// Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/search', 'AdminController@search');

Route::get('/admin/create', 'AdminController@create');
Route::post('/admin/store', 'AdminController@store');

Route::get('/admin/{id}', 'AdminController@admin');
Route::patch('/admin/update/{id}', 'AdminController@update');

Route::delete('/admin/destroy/{id}', 'AdminController@destroy');

// Client
Route::get('/client', 'ClientController@index');
Route::get('/client/search', 'ClientController@search');

Route::get('/client/create', 'ClientController@create');
Route::post('/client/store', 'ClientController@store');

Route::get('/client/{id}', 'ClientController@client');
Route::patch('/client/update/{id}', 'ClientController@update');

Route::delete('/client/destroy/{id}', 'ClientController@destroy');

// Product
Route::get('/product', 'ProductController@index');
Route::get('/product/search', 'ProductController@search');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');

Route::get('/product/{id}', 'ProductController@product');
Route::patch('/product/update/{id}', 'ProductController@update');

Route::delete('/product/destroy/{id}', 'ProductController@destroy');

// Sale
Route::get('/sale', 'SaleController@index');
Route::get('/sale/search', 'SaleController@search');

Route::get('/sale/create', 'SaleController@create');
Route::post('/sale/store', 'SaleController@store');

Route::get('/sale/{id}', 'SaleController@sale');
Route::patch('/sale/update/{id}', 'SaleController@update');

Route::delete('/sale/destroy/{id}', 'SaleController@destroy');

// Theme
Route::get('/theme', 'ThemeController@index');