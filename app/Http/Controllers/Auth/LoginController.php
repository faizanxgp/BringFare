<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    protected function authenticated(Request $request, $user)
//    {
//        if ( $user->status == 0 ) {
//            auth()->logout();
//
//            return back()->withErrors(['email' => 'You are not activated.']);
//        }
//
//        return redirect()->intended($this->redirectPath());
//    }

    public function credentials(Request $request)
    {
        // member must verify email and active (not suspended)
        return [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'verified' => 1,
        ];
    }
}
