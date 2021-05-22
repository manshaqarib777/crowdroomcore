<?php
use Illuminate\Support\Facades\Route;
//Contact
Route::get('/contact','ContactController@index')->name("contact.index");
Route::post('/contact/store','ContactController@store')->name("contact.store");


Route::get('/space-request','ContactController@space_request')->name("space_request.index");
Route::post('/space-request/store','ContactController@space_request_store')->name("space_request.store");

Route::get('/home-request','ContactController@home_request')->name("home_request.index");
Route::post('/home-request/store','ContactController@home_request_store')->name("home_request.store");
