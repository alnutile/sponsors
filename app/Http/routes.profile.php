<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {

    Route::get('/', function() {
        //Show For to set password
        $user = Auth::user();
        $invoices = $user->invoices();
        return view('profile.user', compact('user', 'invoices'));
    });

    Route::post('edit', function() {
        //Show For to set password
        $user = Auth::user();

        $input = Input::all();

        if(!empty($input['password']) && !empty($input['password_confirmation']))
        {
            $validation =  Validator::make($input, [
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed|min:6',
            ]);

            if($validation->fails())
            {
                return redirect('profile')
                    ->withErrors($validation)
                    ->withInput();
            }

            $user->password = bcrypt($input['password']);
        }

        if($user->email != $input['email'])
        {
            $validation =  Validator::make($input, [
                'email' => 'email|max:255|unique:users'
            ]);

            if($validation->fails())
            {
                return redirect('profile')
                    ->withErrors($validation)
                    ->withInput();
            }

            $user->email = $input['email'];
        }

        $user->save();

        return redirect('profile')
            ->withMessage("Profile Updated");
    });

    Route::get('invoice/{invoice}', function ($invoiceId) {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor'  => 'DevelopersHangouts',
            'product' => 'Sponsor Shows',
        ]);
    });

    Route::get('cancel', function() {
        $user = Auth::user();
        $user->subscription()->cancel();

        return redirect('profile')
            ->withMessage("Sorry to see you go :(");

    });
});