<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #dump(redirect()->intended());
        $this->middleware('guest')->except('logout');
    }


    public function authenticated()
    {
        if (session()->has('auction')) {
            auth()->user()->publishAuction(
                session('auction')
            );
            session()->forget('auction');
            return redirect('/');
        }
    }

    /**
    * Handle Social Login requuests
    *
    * @return response
    */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
    * Obtain the user information from Social Logged in.
    * @param $social
    * @return Response
    */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect()->action('HomeController@index');
        } else {
            return view('auth.register', ['name' => $userSocial->getName(), 'email' => $serSocial->getEmail()]);
        }
    }
}
