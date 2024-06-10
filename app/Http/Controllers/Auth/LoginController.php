<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    public function login(Request $request)
    {
        $credentials = request()->only('id_no', 'password');
        if(Auth::attempt($credentials))
        {
            if(auth()->user()->user_type_id===1)
            {
                return redirect('/home');
            }

            elseif(auth()->user()->user_type_id===2){
                return redirect('/vendors_dashboard');
            }
            else{
                return redirect('/client_dashboard');
            }
        }
        else{
            Alert::warning('Failed','Failed To Log In. Wrong Email or Password');
            return redirect('/login');
        }
    }

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
