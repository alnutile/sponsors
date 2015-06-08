<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * @var \Illuminate\Auth\Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;
    }

    public function getUser()
    {
        $user = $this->auth->user();
        $invoices = $user->invoices();
        return view('profile.user', compact('user', 'invoices'));
    }

    public function postEdit()
    {
        $user = $this->auth->user();

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
    }

    public function getPrintInvoice($invoiceId)
    {
        return $this->auth->user()->downloadInvoice($invoiceId, [
            'vendor'  => 'DevelopersHangouts',
            'product' => 'Sponsor Shows',
        ]);
    }

    public function getCancel()
    {
        $user = $this->auth->user();

        $user->subscription()->cancel();

        return redirect('profile')
            ->withMessage("Sorry to see you go :(");
    }
}