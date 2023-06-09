<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    use ResetsPasswords;

    protected $redirectTo = '/doctor/dashboard';

/**
 * Create a new controller instance.
 *
 * @return void
 */
    public function __construct()
    {
        // $this->middleware('guest:doctor');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('doctor.auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]);
    }

    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('doctor');
    }

    //defining our password broker function
    protected function broker()
    {
        return Password::broker('doctors');
    }
}
