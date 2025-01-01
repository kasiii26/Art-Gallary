<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    // public function login()
    // {
    //     if(Auth::check()){
    //         if(Auth::user()->role == 1){
    //             return redirect(route('dashboard'))
    //              ->with('error', 'You are already logged in!');
    //         }else{
    //             return redirect(route('instructors.by_letter'))
    //                 ->with('error', 'You are already logged in!');
    //         }
    //     }
    //     return view('auth.login');
    // }


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
