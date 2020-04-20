<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', 'AuthController@index');
Route::get('/auth', 'AuthController@index');
Route::post('/auth/init', 'AuthController@init');

// Actions
Route::get('/logout', 'ActionController@logout');

// User
Route::get('/user', 'UserController@index');
Route::get('/user/search', 'UserController@search');

Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');

Route::get('/user/{id}', 'UserController@details');
Route::patch('/user/update/{id}', 'UserController@update');

Route::delete('/user/destroy/{id}', 'UserController@destroy');

// Patient
Route::get('/patient', 'PatientController@index');
Route::get('/patient/search', 'PatientController@search');

Route::get('/patient/create', 'PatientController@create');
Route::post('/patient/store', 'PatientController@store');

Route::get('/patient/{id}', 'PatientController@details');
Route::patch('/patient/update/{id}', 'PatientController@update');

Route::delete('/patient/destroy/{id}', 'PatientController@destroy');

// Doctor
Route::get('/doctor', 'DoctorController@index');
Route::get('/doctor/search', 'DoctorController@search');

Route::get('/doctor/create', 'DoctorController@create');
Route::post('/doctor/store', 'DoctorController@store');

Route::get('/doctor/{id}', 'DoctorController@details');
Route::patch('/doctor/update/{id}', 'DoctorController@update');

Route::delete('/doctor/destroy/{id}', 'DoctorController@destroy');

// Specialty
Route::get('/specialty', 'SpecialtyController@index');
Route::get('/specialty/search', 'SpecialtyController@search');

Route::get('/specialty/create', 'SpecialtyController@create');
Route::post('/specialty/store', 'SpecialtyController@store');

Route::get('/specialty/{id}', 'SpecialtyController@details');
Route::patch('/specialty/update/{id}', 'SpecialtyController@update');

Route::delete('/specialty/destroy/{id}', 'SpecialtyController@destroy');

// Query
Route::get('/query', 'QueryController@index');
Route::get('/query/search', 'QueryController@search');

Route::get('/query/create', 'QueryController@create');
Route::post('/query/store', 'QueryController@store');

Route::get('/query/{id}', 'QueryController@details');
Route::patch('/query/update/{id}', 'QueryController@update');

Route::delete('/query/destroy/{id}', 'QueryController@destroy');
