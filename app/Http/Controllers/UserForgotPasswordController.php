<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class UserForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
