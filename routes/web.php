<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*   Customer Start  */
    //Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function(){
        Route::post('customer/invoice/pay','Customer\InvoiceController@pay');
    //}); 
    /*   Customer End  */

    /*   Service provider Start  */
    //Route::group(['middleware' => 'App\Http\Middleware\ProviderMiddleware'], function(){
    
        // Route::get('provider/invoice/cash_payment_confirm/{id}','Provider\InvoiceController@cashPaymentConfirm');
        // Route::get('provider/invoice/show/{invoice_id}','Provider\InvoiceController@show');
        
        // Route::get('provider/commission/pay','Provider\CommissionController@pay');
        // Route::post('provider/commission/pay_store','Provider\CommissionController@payStore');

        // //payment form
        // Route::get('provider/pay', 'Provider\PaymentController@index');
        // // route for processing payment
        // Route::post('paypal', 'Provider\PaymentController@payWithpaypal');
        // // route for check status of the payment
        // Route::get('status', 'Provider\PaymentController@getPaymentStatus');
    //}); 
    /*   Service provider End  */

    /*   Admin Start  */
    //Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
        
    //});
    /*   Admin End  */
