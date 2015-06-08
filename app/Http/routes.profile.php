<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {

    Route::get('/', 'ProfileController@getUser');

    Route::post('edit', 'ProfileController@postEdit');

    Route::get('invoice/{invoice}', 'ProfileController@getPrintInvoice');

    Route::get('cancel', 'ProfileController@getCancel');
});