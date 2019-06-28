<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Backend\UserNotification;
use Auth;
use App\Models\Country;
class UserProfile extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $countries = Country::orderBy('id', 'asc')->get();
      $userMessages = UserNotification::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('id', 'asc')->get();
        return view('Backend.users.profile', array('user' => Auth::user(), 'countries' => $countries, 'userMessages' => $userMessages) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
          $this->validate($request, [
              'name' => 'required|string|max:100',
              'title' => 'required|string|max:20',
              'email' => 'required|string|email|max:100',
              'dob' => 'required',
              'address' => 'required|string|max:150',
              'postcode' => 'required|string|max:30',
              'country' => 'required|string|max:50',
              'phone' => 'required|string|max:20',
              'question1' => 'required|string|max:100',
              'question2' => 'required|string|max:100',
              'question3' => 'required|string|max:100',
              'answer1' => 'required|string|max:100',
              'answer2' => 'required|string|max:100',
              'answer3' => 'required|string|max:100',
          ]);
          $user = User::where('id', $id)->first();


            if(!is_null($user)){


              $user->name = $request->name;
              $user->title = $request->title;
              $user->email = $request->email;
              $user->dob = $request->dob;
              $user->address = $request->address;
              $user->postcode = $request->postcode;
              $user->country = $request->country;
              $user->phone = $request->phone;
              $user->question1 = $request->question1;
              $user->question2 = $request->question2;
              $user->question3 = $request->question3;
              $user->answer1 = $request->answer1;
              $user->answer2 = $request->answer2;
              $user->answer3 = $request->answer3;
              $user->save();

              session()->flash('success', 'User Updated Successfully!!.');
              return redirect()->intended(route('User'));
            }else{
              session()->flash('error', 'User not found!!.');
              return redirect()->intended(route('home'));
            }

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
