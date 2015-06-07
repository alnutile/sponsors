<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Input;

class PasswordController extends Controller
{
    public $redirectTo = '/profile';

    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }

}
