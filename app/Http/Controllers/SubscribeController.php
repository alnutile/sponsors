<?php


namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use App\Plans;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SubscribeController extends Controller
{

    public function registerUser($input, $level)
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

    public function getSponsorPage()
    {
        $public_key = env('STRIPE_PUBLIC');
        return view('stripe.subscribe', compact('public_key'));
    }

    public function post1Show()
    {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = $this->registerUser($input, Plans::$ONE_SHOW_A_MONTH);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    }

    public function post2Show()
    {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = $this->registerUser($input, Plans::$TWO_SHOWS_A_MONTH);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    }

    public function postFan()
    {
        $input = Input::all();

        if(empty($input['stripeToken']))
            return Redirect::back();

        $user = $this->registerUser($input, Plans::$FAN);

        Auth::login($user);

        return Redirect::to('profile')->with("message", "Thanks!");
    }


}