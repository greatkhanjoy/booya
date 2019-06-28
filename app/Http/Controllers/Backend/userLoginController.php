<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
class userLoginController extends Controller
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

public function show(Request $request){

  return view('auth.user-login');

}

    public function login(Request $request){
      $this->validate($request, [
                  'customer_id' => 'required|integer',
                  'pin' => 'required|integer',
                  'password' => 'string',
              ]);

        //Find user by this email
        $user = User::where('customer_id',$request->customer_id)->first();
        if(!is_null($user)){
          if($user->account_status == 1){
              //Attempt Login
              // if(Auth::guard('web')->attempt(['customer_id' => $request->customer_id, 'pin' => $request->pin], $request->remember)){
              if($user->customer_id == $request->customer_id && $user->pin == $request->pin){
                  // Log Him Now
                  Auth::login($user);
                  session()->flash('success', 'You are logged in!');
                  if($user->user_level == 2){
                    return redirect()->intended(route('Dashboard'));
                  }else {
                    return redirect()->intended(route('User'));
                  }

              }else{
                session()->flash('error', 'Customer ID Or PIN not correct!');
                return back();
              }
          }else{
            session()->flash('error', 'Your account is not active!. Please contact support');
            return back();
          }
        }else{
          session()->flash('error', 'Sorry! No account exists.');
          return redirect()->route('home');
        }

    }
}
