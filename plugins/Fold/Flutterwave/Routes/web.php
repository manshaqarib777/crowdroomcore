<?php
use Illuminate\Support\Facades\Route;
Route::get('confirmTwoCheckout','RaveController@handleCheckout')->middleware('auth');
