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
    public function registerUser($input, $level, $charge = false)
    {
        if($user = $this->existingUser($input, $level, $charge))
        {
            return $user;
        }
        else
        {
            $user = $this->createNewCustomer($input, $level, $charge);
            return $user;
        }
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

    private function chargeOrSubscribe($user, $charge, $level, $input)
    {
        if($charge)
        {
            $user->charge($level);

        } else {
            $user->subscription($level)->create($input['stripeToken']);
        }

        return $user;
    }

    private function chargeOrSwap($user, $charge, $level)
    {
        if($charge)
        {
            $user->charge($level);
        } else {
            $user->subscription($level)->swap();
        }

        return $user;
    }

    private function existingUser($input, $level, $charge)
    {
        if($user = User::where("email", $input['stripeEmail'])->first())
        {
            if($user->subscribed())
            {
                $user = $this->chargeOrSwap($user, $charge, $level);
            }
            else
            {
                $user = $this->chargeOrSubscribe($user, $charge, $level, $input);
            }

            return $user;
        }
        return false;
    }

    private function createNewCustomer($input, $level, $charge)
    {
        $user = User::create(
            [
                'email' => $input['stripeEmail'],
                'password' => Hash::make(Str::random())
            ]
        );


        $user = $this->chargeOrSubscribe($user, $charge, $level, $input);

        return $user;

    }

}