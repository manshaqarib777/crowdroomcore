<?php
use Illuminate\Support\Facades\Route;
// Booking
Route::group(['prefix'=>config('booking.booking_route_prefix')],function(){
    Route::post('/addToCart','BookingController@addToCart');
    Route::post('/doCheckout','BookingController@doCheckout')->name('booking.doCheckout');
    Route::any('/confirm/{gateway}','BookingController@confirmPayment');
    Route::any('/cancel/{gateway}','BookingController@cancelPayment');
    Route::any('/{code}','BookingController@detail');
    Route::any('/{code}/checkout','BookingController@checkout');
    Route::any('/{code}/check-status','BookingController@checkStatusCheckout');

    //ical
	Route::get('/export-ical/{type}/{id}','BookingController@exportIcal')->name('booking.admin.export-ical');
    //inquiry
    Route::post('/addEnquiry','BookingController@addEnquiry');
    Route::post('/setPaidAmount','BookingController@setPaidAmount');
});


Route::group(['prefix'=>'gateway'],function(){
    Route::get('/confirm/{gateway}','NormalCheckoutController@confirmPayment')->name('gateway.confirm');
    Route::get('/cancel/{gateway}','NormalCheckoutController@cancelPayment')->name('gateway.cancel');
    Route::get('/info','NormalCheckoutController@showInfo')->name('gateway.info');
});

Route::get('test-event',function (){
    iF(Auth::check()){
        $user = Auth::user();
        event(new \Modules\Booking\Events\TestEvent($user));
    }else{
        return redirect(url('login'));
    }

});
