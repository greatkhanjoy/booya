<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\User;
use App\Backend\UserNotification;
Use Image;
Use File;
use App\Notifications\VerifyRegistration;
use App\Notifications\ConfirmRegistration;

class UsersController extends Controller
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
        //
    }
    public function message()
    {
      $users = User::orderBy('id', 'asc')->get();
      return view('Backend.users.message', compact('users'));
    }

    public function storeMessage(Request $request)
    {
      $this->validate($request,
        [
            'id' => 'required|integer',
            'message' => 'required|string',
            'type' => 'required|integer',
        ]);
        $notificaion = new UserNotification;
        $notificaion->user_id = $request->id;
        $notificaion->message = $request->message;
        $notificaion->type = $request->type;
        $notificaion->status = 1;
        $query = $notificaion->save();
        if($query){
          session()->flash('success', 'Message Sent!');
          return back();
        }else{
          session()->flash('error', 'Message could not be sent!');
          return back();

        }
    }

    public function updateMessageStatus(Request $request)
    {
      $this->validate($request,
        [
            'id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
        $notificaion = UserNotification::where('id', $request->id)->first();
        $notificaion->status = 0;
        $query = $notificaion->save();
        if($query){
          echo 'Status Updated';
        }else{
          echo 'Status couldn\'t be updated';

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('id', 'asc')->get();
        return view('Backend.users.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
        [
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:20',
            // 'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'dob' => 'required',
            'address' => 'required|string|max:150',
            'postcode' => 'required|string|max:30',
            'country' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            // 'password' => 'required|string|min:6|confirmed',
            'question1' => 'required|string|max:100',
            'question2' => 'required|string|max:100',
            'question3' => 'required|string|max:100',
            'answer1' => 'required|string|max:100',
            'answer2' => 'required|string|max:100',
            'answer3' => 'required|string|max:100',
        ]);

      $user = new User;

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
        $user->user_id = rand(1000000,9999999);
        $user->ip_address = request()->ip();
        $user->remember_token = str_random(50);
        $user->account_status = 2;
        $query = $user->save();

        if($query){
          $user->notify( new VerifyRegistration($user));
          session()->flash('success', 'User Added Successfully & A confirmation mail has sent to the user email.');
          return back();
        }else{
          session()->flash('error', 'Sorry! user not added. Something wrong happend.');
          return back();
        }

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

          $user = User::where('id', $id)->first();
          $countries = Country::orderBy('id', 'asc')->get();
              if(!is_null($user) && $user->user_level == 1){
                return view('Backend.users.update', compact('user', 'countries'));
              }else{
                session()->flash('error', 'User not found!!.');
                return redirect()->intended(route('home'));
              }

    }

    /**
     * Update the specified resource in storage.
     *Update User PIN
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepin(Request $request, $id)
    {
      $this->validate($request,
          [
              'pin' => 'required|integer|digits:5',
          ]);

      $user = User::where('id', $id)->first();

        if(!is_null($user)){
            $user->pin = $request->pin;
            $user->save();
            session()->flash('success', 'User PIN Updated Successfully!!.');
            return redirect()->route('Users');
        }else{
            session()->flash('error', 'Inavlid Request.');
            return redirect()->intended(route('home'));
        }
    }

    /**
     * Update the specified resource in storage.
     *Update User Photo
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatephoto(Request $request, $id)
    {
      $this->validate($request, [
          'file' => 'required|image',
      ]);
      $user = User::where('id', $id)->first();


        if(!is_null($user)){

            if($request->hasFile('file')){
              $imageFile = $request->file('file');
              $imageName = uniqid().$imageFile->getClientoriginalName();
              $imageFile->move(public_path('Backend/img/uploads'), $imageName);
              $user->photo = $imageName;
              $user->save();
              session()->flash('success', 'User Photo Updated Successfully!!.');
              return redirect()->route('Users');
            }
              return response()->json(['Status' => true, 'Message' => 'Image(s) Uploaded']);
        }else{
              session()->flash('error', 'Inavlid Request.');
              return redirect()->intended(route('home'));
        }
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
          return redirect()->route('Users');
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
      $user = User::where('id', $id)->first();
        if(!is_null($user)){
          if ($user->photo == 'default.png') {
            // code...
          }else{
            if(File::exists('Backend/img/uploads/'.$user->photo)){
              File::delete('Backend/img/uploads/'.$user->photo);
            }
          }

        $user->delete();

        session()->flash('success', 'User Deleted Successfully!!');
        return back();

        }else{
          session()->flash('error', 'Something Wrong happend!');
          return back();
          }
      }
      /**
       * Change user status.
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function statChange(Request $request){
          $this->validate($request,
          [
                'id' => 'required|integer|max:100',
                'status' => 'required|integer|max:5',
          ]);

        $user = User::where('id', $request->id)->first();

            if(!is_null($user))
            {

              $user->account_status = $request->status;
              $user->remember_token = NULL;
              if($request->status == 1){
                  if($user->customer_id == NULL){
                    $user->customer_id = rand(10000000,99999999);
                  }

                  if($user->pin == NULL){
                    $user->pin = rand(10000, 99999);
                  }

                  if($user->account_number == NULL){
                  $user->account_number = rand(10000000,99999999);
                  $user->notify( new ConfirmRegistration($user));
                  }
            }
              $query = $user->save();

              session()->flash('success', 'Status Updated Successfully!');

              if($query){
                echo "Status Changed Successfully!";
              }else{
                echo "Something happend wrong!";
              }

            }else{
              session()->flash('error', 'Something happend wrong!');
            }

      }



    }
