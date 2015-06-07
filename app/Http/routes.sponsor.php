<?php

use App\Plans;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

/**
 * Will move to Controller later just
 * going quick here
 */
if(!function_exists('registerUser'))
{
    function registerUser($input, $level)
    {
        if($user = User::where("email", $input['stripeEmail'])->first())
        {
            if($user->subscribed())
            {
                $user->subscription($level)->swap();
            }
            else
            {
                $user->subscription($level)->create($input['stripeToken']);
            }
        }
        else
        {
            $user = User::create(
                [
                    'email' => $input['stripeEmail'],
                    'password' => Hash::make(Str::random())
                ]
            );

            $user->subscription($level)->create($input['stripeToken']);
        }

        return $user;
    }
}


Route::group(['prefix' => 'sponsor'], function() {

    Route::get('/', function()
    {
        $public_key = env('STRIPE_PUBLIC');
        return view('stripe.subscribe', compact('public_key'));
    });



    Route::post('1show', function() {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = registerUser($input, Plans::$ONE_SHOW_A_MONTH);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    });

    Route::post('2show', function() {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = registerUser($input, Plans::$TWO_SHOWS_A_MONTH);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    });

    Route::post('fan', function() {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = registerUser($input, Plans::$FAN);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    });
});