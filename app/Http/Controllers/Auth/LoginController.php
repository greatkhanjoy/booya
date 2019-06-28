<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

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

    public function login(Request $request){
      $this->validate($request, [
                  'username' => 'required|string',
                  'password' => 'required|string',
              ]);

        //Find user by this email
        $user = User::where('username',$request->username)->first();
        if(!is_null($user)){
          if($user->account_status == 1){
              //Attempt Login
              if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){
                  // Log Him Now
                  session()->flash('success', 'You are logged in!');
                  if($user->user_level == 2){
                    return redirect()->intended(route('Dashboard'));
                  }else {
                    return redirect()->intended(route('User'));
                  }

              }else{
                session()->flash('error', 'Username Or Password not correct!');
                return back();
              }
          }else{
            session()->flash('error', 'Your account is not active!. Please contact support');
            return back();
          }
        }else{
          session()->flash('error', 'Sorry! No account exists.');
          return redirect()->route('register');
        }

    }
}
