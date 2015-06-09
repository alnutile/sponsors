<?php

use App\Plans;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


Route::group(['prefix' => 'sponsor'], function() {

    Route::get('/', 'SubscribeController@getSponsorPage');

    Route::post('1show', 'SubscribeController@post1Show');

    Route::post('2show', 'SubscribeController@post2Show');

    Route::post('fan', 'SubscribeController@postFan');


});

Route::post('stripe/webhook', 'WebhookController@handleWebhook');